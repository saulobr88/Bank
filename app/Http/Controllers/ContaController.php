<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\MessageBag;
use App\Conta;
use App\Conta_historico_saldo;
use App\User;
use App\Funcionario;
use App\Conta_tipo;

class ContaController extends Controller
{
    //
    protected $guard = 'web';
    protected $guardF = 'funcionarios';

    public function listar()
    {
        $user = auth()->guard( $this->guardF )->user();
        $contas = Conta::where('agencia_id', $user->agencia->id)->orderBy('numero')->get();
        $guard = $this->guardF;
        $contador = count($contas);
        return view('funcionario.conta.listar', compact('user','guard','contas','contador'));
    }

    public function show(Conta $conta)
    {
        dd($conta->toArray());
    }

    public function create()
    {
        $user = auth()->guard( $this->guardF )->user();
        $guard = $this->guardF;
        if ( $user->funcionario_tipo_id > 2 ){
            $clientes = User::orderBy('name')->get()->lists('name','id');
            $funcionarios =
                Funcionario::where([
                    ['agencia_id',$user->agencia_id ],
                    ['funcionario_tipo_id', '>=', 3],
                ])->get()->lists('name','id');

            $conta_tipos = Conta_tipo::lists('name','id');

            return view('funcionario.conta.create', compact('user','guard','clientes','funcionarios','conta_tipos'));
        } else {
            return back();
        }
    }

    public function store(Request $request)
    {
        $user = auth()->guard( $this->guardF )->user();
        if ( $user->funcionario_tipo_id < 3 ){
            return back();
        }

        $validator = validator($request->all(), [
            'numero' => 'required|min:4|max:255',
            'conta_tipo_id' => 'required',
            'user_id' => 'required',
            'funcionario_id' => 'required',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $numeroTest = Conta::where('numero',$request->get('numero') )->first();
        if ( $numeroTest != null ){
            $errors = new MessageBag(['msg' => ['Número already in use.']]);
            return back()
                ->withErrors($errors)
                ->withInput();
        }

        $f = new Conta();
        $f->numero = $request->get('numero');
        $f->agencia_id = $user->agencia_id;
        $f->user_id = $request->get('user_id');
        $f->funcionario_id = $request->get('funcionario_id');
        $f->saldo = $request->get('saldo');
        $f->conta_tipo_id = $request->get('conta_tipo_id');
        $f->save();

        historicoAdd($f);

        flash()->success('Conta '.$f->numero .' cadastrada com sucesso!');
        return redirect('/funcionario/conta/listar');
    }

    public function edit(Conta $conta)
    {
        $user = auth()->guard( $this->guardF )->user();
        $guard = $this->guardF;
        if ( ($user->id == $conta->funcionario_id) || ($user->funcionario_tipo_id > 3) ){
            $clientes = User::orderBy('name')->get()->lists('name','id');
            $funcionarios =
                Funcionario::where([
                    ['agencia_id',$user->agencia_id ],
                    ['funcionario_tipo_id', '>=', 3],
                ])->get()->lists('name','id');

            $conta_tipos = Conta_tipo::lists('name','id');

            return view('funcionario.conta.edit', compact('user','guard','conta','clientes','funcionarios','conta_tipos'));
        } else {
            return back();
        }

    }

    public function update(Conta $conta, Request $request)
    {
        $user = auth()->guard( $this->guardF )->user();
        if ( $user->id != $conta->funcionario_id ){
            if ( $user->funcionario_tipo_id < 4 ){
                $errors = new MessageBag(['msg' => ['Você não possui privilégios para essa ação.']]);
                return back()
                    ->withErrors($errors)
                    ->withInput();
            }
        }

        $validator = validator($request->all(), [
            'funcionario_id' => 'required',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $conta->funcionario_id = $request->get('funcionario_id');
        $conta->save();

        flash()->success('Conta '.$conta->numero .' atualizada com sucesso!');
        return redirect('/funcionario/conta/listar');
    }

    public function destroy(Conta $conta)
    {
        $user = auth()->guard( $this->guardF )->user();
        if ( $user->id != $conta->funcionario_id ){
            if ( $user->funcionario_tipo_id < 4 ){
                flash()->error('Você não possui privilégios para essa ação');
                return back();
            }
        }

        $numero = $conta->numero;
        $conta->delete();
        flash()->success('A conta '.$numero.' foi deletada do sistema com sucesso!');
        return redirect('/funcionario/conta/listar');
    }

    public function historicoAdd(Conta $c){
        $h = new Conta_historico_saldo();
        $h->conta_id = $c->id;
        $h->saldo = $c->saldo;
        $h->dt_time = Carbon::now();
        $h->save();
    }

}

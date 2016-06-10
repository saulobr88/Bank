<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Transferencia;
use App\Conta;
use App\Conta_historico_saldo;
use App\Transacao;
use App\Notificacao;

class TransferenciaController extends Controller
{
    //
    protected $guard = 'web';

    public function listar()
    {
        $user = auth()->guard( $this->guard )->user();
        $conta = $user->contas->first()->id;
        $transferencias = Transferencia::where('conta_id',$conta)->get();
        $guard = $this->guard;
        return view('cliente.transferencia.listar', compact('user','guard','transferencias'));
    }

    public function listarAgendados()
    {
        $guard = $this->guard;
        $user = auth()->guard( $this->guard )->user();
        $conta = $user->contas->first()->id;
        $today = date('Y-m-d');
        $transferencias = Transferencia::where([
            ['conta_id',$conta],
            ['dt_t','>',$today],
        ])->get();

        return view('cliente.transferencia.listar', compact('user','guard','transferencias'));
    }

    public function create()
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        $conta = $user->contas->first();
        return view('cliente.transferencia.create', compact('user','guard','conta'));
    }

    public function store(Request $request)
    {
        $user = auth()->guard( $this->guard )->user();

        $validator = validator($request->all(), [
            'banco' => 'required',
            'agencia' => 'required',
            'numero' => 'required',
            'cnp_destino' => 'required',
            'nome_destino' => 'required',
            'valor' => 'required',
            'dt_t' => 'required',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $f = new Transferencia();
        $f->conta_id = $request->get('conta_id');
        $f->banco = $request->get('banco');
        $f->agencia = $request->get('agencia');
        $f->numero = $request->get('numero');
        $f->cnp_destino = $request->get('cnp_destino');
        $f->nome_destino = $request->get('nome_destino');
        $f->valor = $request->get('valor');
        $f->dt_t = $request->get('dt_t');
        $f->tipo = $request->get('tipo');

        $today = date('Y-m-d');
        if ( $f->dt_t == $today ){
            $c = Conta::find( $f->conta_id );
            if( $c->saldo < $f->valor ){
                $errors = new MessageBag(['msg' => ['Conta sem saldo suficiente.']]);
                return back()
                    ->withErrors($errors)
                    ->withInput();
            } else {
                $novoSaldo = $c->saldo;
                $c->saldo = $novoSaldo - $f->valor;
                $c->save();
                $f->status = "FEITO";

                $this->historicoAdd($c);

                $t = new Transacao();
                $t->conta_id = $f->conta_id;
                $t->transacao_tipos_id = 3; //Transfêrencia.
                $t->valor = $f->valor;
                $t->dt_solicitacao = $today;
                $t->dt_realizacao = $today;
                $t->save();

                if ( $c->notificar == 1){
                    $msg = "Transferência realizada pela conta ".$c->numero
                        .". No valor de R$ ".$f->valor
                        .". Saldo Atual: R$ ".$c->saldo;
                    $n = new Notificacao;
                    $n->conta_id = $c->id;
                    $n->msg = $msg;
                    $n->save();
                }

            }
        } else {
            $f->status="FILA";
            // Aqui vem o código para adicionar ao processo do dia referênte.
            //
        }

        $f->save();
        flash()->success('Transferência '.$f->valor .'('. $f->dt_t .') cadastrado com sucesso!');
        return redirect('/cliente/transferencia/listar');

    }

    public function historicoAdd(Conta $c){
        $h = new Conta_historico_saldo();
        $h->conta_id = $c->id;
        $h->saldo = $c->saldo;
        $h->dt_time = Carbon::now();
        $h->save();
    }
}

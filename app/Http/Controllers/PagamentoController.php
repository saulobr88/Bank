<?php

namespace App\Http\Controllers;

use App\Cheque;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Pagamento;
use App\Conta;
use App\Conta_historico_saldo;
use App\Transacao;


class PagamentoController extends Controller
{
    //
    protected $guard = 'web';

    public function listar()
    {
        $user = auth()->guard( $this->guard )->user();
        $conta = $user->contas->first()->id;
        $pagamentos = Pagamento::where('conta_id',$conta)->get();
        $guard = $this->guard;
        return view('cliente.pagamento.listar', compact('user','guard','pagamentos'));
    }

    public function listarAgendados()
    {
        $guard = $this->guard;
        $user = auth()->guard( $this->guard )->user();
        $conta = $user->contas->first()->id;
        $today = date('Y-m-d');
        $pagamentos = Pagamento::where([
            ['conta_id',$conta],
            ['dt_pagamento','>',$today],
            ])->get();

        return view('cliente.pagamento.listar', compact('user','guard','pagamentos'));
    }

    public function create()
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        $conta = $user->contas->first();
        return view('cliente.pagamento.create', compact('user','guard','conta'));

    }

    public function store(Request $request)
    {
        $user = auth()->guard( $this->guard )->user();

        $validator = validator($request->all(), [
            'codigo' => 'required|min:3|max:255',
            'dt_vencimento' => 'required',
            'dt_pagamento' => 'required',
            'valor' => 'required|numeric',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $f = new Pagamento();
        $f->valor = $request->get('valor');
        $f->dt_vencimento = $request->get('dt_vencimento');
        $f->dt_pagamento = $request->get('dt_pagamento');
        $f->vl_multa = $request->get('vl_multa');
        $f->codigo = $request->get('codigo');
        $f->descricao = $request->get('descricao');
        $f->conta_id = $request->get('conta_id');

        $today = date('Y-m-d');
        if ( $f->dt_pagamento == $today ){
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
                $f->status = "PAGO";

                $this->historicoAdd($c);

                $t = new Transacao();
                $t->conta_id = $f->conta_id;
                $t->transacao_tipos_id = 2; // Retirada
                $t->valor = $f->valor;
                $t->dt_solicitacao = $today;
                $t->dt_realizacao = $today;
                $t->save();

            }
        } else {
            $f->status="FILA";
            // Aqui vem o código para adicionar ao processo do dia referênte.
            //
        }

        $f->save();
        flash()->success('Pagamento '.$f->codigo .'('. $f->dt_pagamento .') cadastrado com sucesso!');
        return redirect('/cliente/pagamento/listar');

    }

    public function historicoAdd(Conta $c){
        $h = new Conta_historico_saldo();
        $h->conta_id = $c->id;
        $h->saldo = $c->saldo;
        $h->dt_time = Carbon::now();
        $h->save();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pagamento;

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
            'valor' => 'required',
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

        dd($f->toArray());
        //$f->save();

        flash()->success('Funcionario '.$f->name .'('. $f->cpf .') cadastrado com sucesso!');
        return redirect('/cliente/pagamento');

    }
}

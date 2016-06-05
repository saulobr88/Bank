<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Http\Requests;
use App\Conta;
use App\Transacao;
use App\Transacao_tipo;
use App\Conta_historico_saldo;


class ExtratoController extends Controller
{
    //
    protected $guard = 'web';
    protected $guardF = 'funcionarios';

    public function extrato()
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        $conta = $user->contas->first();
        $transacaos = $conta->transacoes;
        return view('cliente.extrato.listar', compact('user','guard','conta','transacaos'));
    }
}

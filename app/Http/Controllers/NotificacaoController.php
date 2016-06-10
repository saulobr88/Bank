<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Notificacao;
use App\Conta;

class NotificacaoController extends Controller
{
    //
    protected $guard = 'web';
    protected $guardF = 'web';

    public function listar()
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        $conta = $user->contas->first()->id;
        $notificacoes = Notificacao::where('conta_id',$conta)->get();

        return view('cliente.notificacao', compact('user','guard','notificacoes'));
    }
}

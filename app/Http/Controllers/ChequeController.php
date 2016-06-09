<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Http\Requests;
use App\Conta;
use App\Cheque;

class ChequeController extends Controller
{
    protected $guard = 'web';
    protected $guardF = 'funcionarios';

    //
    public function listar()
    {
        $user = auth()->guard( $this->guard )->user();
        $conta = $user->contas->first()->id;
        $cheques = Cheque::where('conta_id',$conta)->get();
        $guard = $this->guard;
        return view('cliente.cheque.listar', compact('user','guard','cheques'));
    }

    public function show(Cheque $cheque)
    {
        //dd( $cheque->toArray() );
        $user = auth()->guard( $this->guard )->user();
        $conta = $user->contas->first()->id;
        $guard = $this->guard;
        if ( $cheque->conta_id != $conta ){
            $errors = new MessageBag(['msg' => ['Sem permissão.']]);
            return back()
                ->withErrors($errors)
                ->withInput();
        }

        return view('cliente.cheque.show', compact('user','guard','cheque'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
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
        $dt_min = date("Y-m-d",strtotime("-3 month") );
        $dt_max = date('Y-m-d');
        $dt_ini = date("Y-m-d",strtotime("-1 month") );
        $dt_final = date('Y-m-d');

        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        $conta = $user->contas->first();
        $transacaos = Transacao::where([
            ['conta_id', $conta->id],
            ['dt_realizacao','>=',$dt_ini." 00:00:00"],
            ['dt_realizacao','<=',$dt_final." 59:59:59"],
        ])->get();

        return view('cliente.extrato.listar',
            compact(
                'user','guard','conta',
                'transacaos',
                'dt_min','dt_ini',
                'dt_max', 'dt_final')
        );
    }

    public function extrato2(Request $request)
    {
        $dt_min = date("Y-m-d",strtotime("-3 month") );
        $dt_max = date('Y-m-d');
        $dt_ini = date("Y-m-d",strtotime("-1 month") );
        $dt_final = date('Y-m-d');

        if( $request->get('dt_ini') && $request->get('dt_final') ){
            //dd($request->all());
            $validator = validator($request->all(), [
                'dt_ini' => 'required',
                'dt_final' => 'required',
            ]);

            if ( $validator->fails() ){
                $errors = new MessageBag(['msg' => ['Validation Fails.']]);
                return back()
                    ->withErrors($errors)
                    ->withInput();
            }

            $dt_ini = $request->get('dt_ini');
            $dt_final = $request->get('dt_final');

        }

        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        $conta = $user->contas->first();
        $transacaos = Transacao::where([
            ['conta_id', $conta->id],
            ['dt_realizacao','>=',$dt_ini." 00:00:00"],
            ['dt_realizacao','<=',$dt_final." 59:59:59"],
        ])->get();

        return view('cliente.extrato.listar',
            compact(
                'user','guard','conta',
                'transacaos',
                'dt_min','dt_ini',
                'dt_max', 'dt_final')
        );
    }
}

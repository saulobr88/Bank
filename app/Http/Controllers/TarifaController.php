<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
use App\Tarifa;
use App\Conta;


class TarifaController extends Controller
{
    //
    protected $guard = 'web';

    public function listar()
    {
        $user = auth()->guard( $this->guard )->user();
        $tarifas = Tarifa::all();
        $guard = $this->guard;
        return view('cliente.tarifa', compact('user','guard','tarifas'));
    }
}

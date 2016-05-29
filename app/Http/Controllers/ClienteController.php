<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ClienteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except(['login']);
    }

    public function index()
    {
        return view('cliente.index');
    }

    public function login()
    {
        return view('auth.login-cliente');
    }

    public function postLogin(Request $request)
    {
        $validator = validator($request->all(), [
            'identificacao' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $identificacao = $request->get('identificacao');
        $password = $request->get('password');

        // Entra com o email e senha OU CPF e senha
        if ( auth()->guard('web')->attempt(['email'=>$identificacao, 'password'=>$password])) {
            return redirect('/cliente');
        } elseif (auth()->guard('web')->attempt(['cpf'=>$identificacao, 'password'=>$password])){
            return redirect('/cliente');
        } else {
            return back()
                ->withErrors(['erros'=>'Login inválido'])
                ->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/cliente/login');

    }
}

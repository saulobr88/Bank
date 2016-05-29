<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class FuncionarioController extends Controller
{
    public function __construct()
    {
        //$this->middleware('funcionarios:funcionarios')->except(['login']);
    }

    public function index()
    {
        return view('funcionario.index');
    }

    public function login()
    {
        return view('auth.login-funcionario');
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
        if ( auth()->guard('funcionarios')->attempt(['email'=>$identificacao, 'password'=>$password])) {
            return redirect('/funcionario');
        } elseif (auth()->guard('funcionarios')->attempt(['cpf'=>$identificacao, 'password'=>$password])){
            return redirect('/funcionario');
        } else {
            return back()
                ->withErrors(['erros'=>'Login inválido'])
                ->withInput();
        }

    }

    public function logout()
    {
        auth()->guard('funcionarios')->logout();
        return redirect('/funcionario/login');

    }

}

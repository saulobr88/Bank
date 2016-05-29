<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class FuncionarioController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:funcionario')->except(['login']);
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
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $credenciais = [
            'email' => $request->get('email'),
            'password'=> $request->get('password'),
        ];

        if ( auth()->guard('funcionarios')->attempt($credenciais)  ){
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\MessageBag;


class FuncionarioController extends Controller
{

    protected $guard = 'funcionarios';

    public function __construct()
    {
        //$this->middleware('funcionarios:funcionarios')->except(['login']);
    }

    public function index()
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        return view('funcionario.index', compact('user','guard') );
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
            // if Auth::attempt fails (wrong credentials) create a new message bag instance.
            // URL: http://laravel.io/forum/05-02-2014-login-error-message?page=1
            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);

            return back()
                ->withErrors($errors)
                ->withInput();
        }

    }

    public function logout()
    {
        auth()->guard('funcionarios')->logout();
        return redirect('/funcionario/login');

    }

}

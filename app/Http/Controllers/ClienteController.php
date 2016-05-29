<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\MessageBag;

class ClienteController extends Controller
{

    protected $guard = 'web';

    public function __construct()
    {
        //$this->middleware('auth')->except(['login']);
    }

    public function index()
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        return view('cliente.index', compact('user','guard') );
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
            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
            return back()
                ->withErrors($errors)
                ->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/cliente/login');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\User as User;

class ClienteController extends Controller
{

    protected $guard = 'web';
    protected $guardF = 'funcionarios';

    public function __construct()
    {
        //$this->middleware('auth')->except(['login']);
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

    public function index()
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        return view('cliente.index', compact('user','guard') );
    }

    public function listar()
    {
        $user = auth()->guard( $this->guardF )->user();
        $clientes = User::orderBy('name')->get();
        $guard = $this->guardF;
        $contador = count($clientes);
        return view('funcionario.cliente.listar', compact('user','guard','clientes','contador'));

    }

    public function show(User $cliente)
    {
        //dd($cliente->toArray());
        $user   = auth()->guard( $this->guardF )->user();
        $guard  = $this->guardF;
        return view('funcionario.cliente.show', compact('user','guard','cliente') );
    }

    public function create()
    {
        $user = auth()->guard( $this->guardF )->user();
        $guard = $this->guardF;
        if ( $user->funcionario_tipo_id > 2 ){
            return view('funcionario.cliente.create', compact('user','guard'));
        } else {
            return back();
        }
    }

    public function store(Request $request)
    {

        $user = auth()->guard( $this->guardF )->user();
        if ( $user->funcionario_tipo_id < 3 ){
            return back();
        }

        $validator = validator($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
            'cpf' => 'required|min:11|max:255',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $email = User::where('email',$request->get('email') )->first();
        $cpf = User::where('cpf',$request->get('cpf') )->first();
        if ( $email != null ){
            $errors = new MessageBag(['msg' => ['Email already in use.']]);
            return back()
                ->withErrors($errors)
                ->withInput();
        }
        if( $cpf != null ){
            $errors = new MessageBag(['msg' => ['CPF already in use.']]);
            return back()
                ->withErrors($errors)
                ->withInput();
        }

        $f = new User();
        $f->name = $request->get('name');
        $f->email = $request->get('email');
        $f->password = Hash::make( $request->get('password') );
        $f->cpf = $request->get('cpf');
        $f->cep = $request->get('cep');
        $f->numero = $request->get('numero');
        $f->save();

        flash()->success('Cliente '.$f->name .'('. $f->cpf .') cadastrado com sucesso!');
        return redirect('/funcionario/cliente/listar');
    }

    public function edit(User $cliente)
    {
        $user = auth()->guard( $this->guardF )->user();
        $guard = $this->guardF;
        if ( $user->funcionario_tipo_id > 3 ){
            return view('funcionario.cliente.edit', compact('user','guard','cliente'));
        } else {
            return back();
        }

    }
    public function update(User $cliente, Request $request)
    {
        $user = auth()->guard( $this->guardF )->user();
        if ( $user->funcionario_tipo_id < 3 ){
            return back();
        }
        $validator = validator($request->all(), [
            'name' => 'required|min:3|max:255',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $cliente->name = $request->get('name');
        if ( $request->get('password') != null ){
            $cliente->password = Hash::make( $request->get('password') );
        }
        $cliente->cep = $request->get('cep');
        $cliente->numero = $request->get('numero');
        $cliente->save();

        flash()->success('Cliente '.$cliente->name .'('. $cliente->cpf .') atualizado com sucesso!');
        return redirect('/funcionario/cliente/listar');
    }

    public function destroy(User $cliente)
    {
        $user = auth()->guard( $this->guardF )->user();
        if ( $user->funcionario_tipo_id < 3 ){
            flash()->error('Você não possui privilégios para essa ação');
            return back();
        }

        $name = $cliente->name;
        $cpf = $cliente->cpf;
        $cliente->delete();
        flash()->success('O cliente '.$name.'('.$cpf.') foi deletado do sistema com sucesso!');
        return redirect('/funcionario/cliente/listar');
    }

}

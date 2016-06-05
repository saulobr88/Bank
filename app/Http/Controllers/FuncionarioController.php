<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\Funcionario;

class FuncionarioController extends Controller
{

    protected $guard = 'funcionarios';

    public function __construct()
    {
        //$this->middleware('funcionarios:funcionarios')->except(['login']);
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

    public function index()
    {
        $user   = auth()->guard( $this->guard )->user();
        $guard  = $this->guard;
        return view('funcionario.index', compact('user','guard') );
    }

    public function listar()
    {
        $user = auth()->guard( $this->guard )->user();
        $funcionarios = Funcionario::where('agencia_id', $user->agencia_id)->orderBy('name')->get();
        //dd($funcionarios);
        $guard = $this->guard;
        $contador = count($funcionarios);
        return view('funcionario.listar', compact('user','guard','funcionarios','contador'));

    }

    public function show(Funcionario $funcionario)
    {
        dd($funcionario->toArray());
    }

    public function create()
    {
        $user = auth()->guard( $this->guard )->user();
        //dd($funcionarios);
        $guard = $this->guard;
        $agencias = \App\Agencia::lists('name', 'id');
        $departamentos = \App\Departamento::lists('name', 'id');
        $cargos = \App\Funcionario_tipo::lists('name', 'id');
        if ( $user->funcionario_tipo_id > 3 ){
            return view('funcionario.create', compact('user','guard','agencias','departamentos','cargos'));
        } else {
            return back();
        }
    }

    public function store(Request $request)
    {

        $user = auth()->guard( $this->guard )->user();
        if ( $user->funcionario_tipo_id < 4 ){
            return back();
        }

        $validator = validator($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
            'cpf' => 'required|min:11|max:255',
            'agencia_id' => 'required',
            'funcionario_tipo_id' => 'required',
            'salario' => 'required',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $email = Funcionario::where('email',$request->get('email') )->first();
        $cpf = Funcionario::where('cpf',$request->get('cpf') )->first();
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

        $f = new Funcionario();
        $f->name = $request->get('name');
        $f->email = $request->get('email');
        $f->password = Hash::make( $request->get('password') );
        $f->cpf = $request->get('cpf');
        $f->cep = $request->get('cep');
        $f->numero = $request->get('numero');
        $f->agencia_id = $request->get('agencia_id');
        $f->departamento_id = $request->get('departamento_id');
        $f->funcionario_tipo_id = $request->get('funcionario_tipo_id');
        $f->salario = $request->get('salario');
        $f->save();

        flash()->success('Funcionario '.$f->name .'('. $f->cpf .') cadastrado com sucesso!');
        return redirect('/funcionario/listar');

    }

    public function edit(Funcionario $funcionario)
    {
        $user = auth()->guard( $this->guard )->user();
        $guard = $this->guard;
        $agencias = \App\Agencia::lists('name', 'id');
        $departamentos = \App\Departamento::lists('name', 'id');
        $cargos = \App\Funcionario_tipo::lists('name', 'id');
        if ( $user->funcionario_tipo_id > 4 ){
            return view('funcionario.edit', compact('user','guard','agencias','departamentos','cargos','funcionario'));
        } else {
            return back();
        }

    }
    public function update(Funcionario $funcionario, Request $request)
    {

        $user = auth()->guard( $this->guard )->user();
        if ( $user->funcionario_tipo_id < 4 ){
            return back();
        }
        $validator = validator($request->all(), [
            'name' => 'required|min:3|max:255',
            'agencia_id' => 'required',
            'funcionario_tipo_id' => 'required',
            'salario' => 'required',
        ]);

        if ($validator->fails() ){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $funcionario->name = $request->get('name');
        if ( $request->get('password') != null ){
            $funcionario->password = Hash::make( $request->get('password') );
        }
        $funcionario->cep = $request->get('cep');
        $funcionario->numero = $request->get('numero');
        $funcionario->agencia_id = $request->get('agencia_id');
        $funcionario->departamento_id = $request->get('departamento_id');
        $funcionario->funcionario_tipo_id = $request->get('funcionario_tipo_id');
        $funcionario->salario = $request->get('salario');
        $funcionario->save();

        flash()->success('Funcionario '.$funcionario->name .'('. $funcionario->cpf .') atualizado com sucesso!');
        return redirect('/funcionario/listar');

    }

    public function destroy(Funcionario $funcionario)
    {
        $user = auth()->guard( $this->guard )->user();
        if ( $user->funcionario_tipo_id < 4 ){
            flash()->error('Você não possui privilégios para essa ação');
            return back();
        }

        $name = $funcionario->name;
        $cpf = $funcionario->cpf;
        $funcionario->delete();
        flash()->success('O funcionário '.$name.'('.$cpf.') foi deletado do sistema com sucesso!');
        return redirect('/funcionario/listar');

    }

}

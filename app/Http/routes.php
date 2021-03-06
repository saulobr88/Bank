<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if ( auth()->guard('funcionarios')->user() ){
        return redirect('/funcionario');
    }
    if ( auth()->guard('web')->user() ){
        return redirect('/cliente');
    }
    return redirect('/cliente/login');
});

// Rotas dos Funcionarios
Route::group(['middleware'=>'funcionario'], function(){

    Route::get('/funcionario/login','FuncionarioController@login');
    Route::post('/funcionario/login','FuncionarioController@postLogin');

    Route::group(['middleware'=>'auth:funcionarios'], function(){
        Route::get('/funcionario','FuncionarioController@index');
        Route::get('/funcionario/logout','FuncionarioController@logout');

        /// Funcionarios - CRUD
        //Route::resource('funcionario','FuncionarioController');
        Route::get('/funcionario/listar','FuncionarioController@listar');
        Route::get('/funcionario/cadastrar','FuncionarioController@create');
        Route::post('/funcionario/store','FuncionarioController@store');

        Route::get('/funcionario/{funcionario}/edit','FuncionarioController@edit');
        Route::post('/funcionario/{funcionario}/update',[
            'as' => 'funcionario.update', 'uses' => 'FuncionarioController@update'
        ]);
        Route::get('/funcionario/{funcionario}/destroy','FuncionarioController@destroy');
        Route::get('/funcionario/{funcionario}','FuncionarioController@show');

        /// Funcionarios - Clientes CRUD
        Route::get('/funcionario/cliente/listar','ClienteController@listar');
        Route::get('/funcionario/cliente/cadastrar','ClienteController@create');
        Route::post('/funcionario/cliente/store','ClienteController@store');
        Route::get('/funcionario/cliente/{cliente}/edit','ClienteController@edit');
        Route::post('/funcionario/cliente/{cliente}/update',[
            'as' => 'funcionario.cliente.update', 'uses' => 'ClienteController@update'
        ]);
        Route::get('/funcionario/cliente/{cliente}/destroy','ClienteController@destroy');
        Route::get('/funcionario/cliente/{cliente}','ClienteController@show');

        // Funcionarios - Contas CRUD
        Route::get('/funcionario/conta/listar','ContaController@listar');
        Route::get('/funcionario/conta/cadastrar','ContaController@create');
        Route::post('/funcionario/conta/store','ContaController@store');
        Route::get('/funcionario/conta/{conta}/edit','ContaController@edit');
        Route::post('/funcionario/conta/{conta}/update',[
            'as' => 'funcionario.conta.update', 'uses' => 'ContaController@update'
        ]);
        Route::get('/funcionario/conta/{conta}/destroy','ContaController@destroy');
        Route::get('/funcionario/conta/{conta}','ContaController@show');

    });
});


Route::get('/cliente/login','ClienteController@login');
Route::post('/cliente/login','ClienteController@postLogin');

// Rotas dos Clientes
Route::group(['middleware'=>'auth:web'], function(){
    Route::get('/cliente','ClienteController@index');
    Route::get('/cliente/logout','ClienteController@logout');

    // Clientes - Extratos
    Route::get('/cliente/extrato/listar','ExtratoController@extrato');
    Route::get('/cliente/extrato/consultar','ExtratoController@extrato');
    Route::post('/cliente/extrato/consultar','ExtratoController@extrato2');

    // Clientes - Transferências
    Route::get('/cliente/transferencia/listar','TransferenciaController@listar');
    Route::get('/cliente/transferencia/listarAgendados','TransferenciaController@listarAgendados');
    Route::get('/cliente/transferencia/cadastrar','TransferenciaController@create');
    Route::post('/cliente/transferencia/store','TransferenciaController@store');

    // Clientes - Pagamentos
    Route::get('/cliente/pagamento/listar','PagamentoController@listar');
    Route::get('/cliente/pagamento/listarAgendados','PagamentoController@listarAgendados');
    Route::get('/cliente/pagamento/cadastrar','PagamentoController@create');
    Route::post('/cliente/pagamento/store','PagamentoController@store');

    // Clientes - Tarifas
    Route::get('/cliente/cheque/listar','ChequeController@listar');
    Route::get('/cliente/cheque/{cheque}','ChequeController@show');

    // Clientes - Tarifas
    Route::get('/cliente/notificacao/listar','NotificacaoController@listar');

    // Clientes - Tarifas
    Route::get('/cliente/tarifa/listar','TarifaController@listar');

    // Clientes - Perfil
    Route::get('/cliente/{cliente}','ClienteController@showCliente');
});

// Empresas
Route::get('/empresa','EmpresaController@index');

//Route::auth();
//Route::get('/home', 'HomeController@index');


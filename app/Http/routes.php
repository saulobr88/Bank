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
    if ( Auth::guest() ){
        return redirect('/cliente/login');
    } else {
        if ( auth()->guard('funcionarios')->user() ){
            return redirect('/funcionario');
        }
        if ( auth()->guard('web')->user() ){
            return redirect('/cliente');
        }
    }
    return view('welcome');
});

// Rotas dos Funcionarios
Route::group(['middleware'=>'funcionario'], function(){

    Route::group(['middleware'=>'auth:funcionarios'], function(){
        Route::get('/funcionario','FuncionarioController@index');
        Route::get('/funcionario/logout','FuncionarioController@logout');
    });

    Route::get('/funcionario/login','FuncionarioController@login');
    Route::post('/funcionario/login','FuncionarioController@postLogin');
});

//Route::auth();
//Route::get('/home', 'HomeController@index');

// Rotas dos Clientes
Route::group(['middleware'=>'auth:web'], function(){
    Route::get('/cliente','ClienteController@index');
    Route::get('/cliente/logout','ClienteController@logout');
});

Route::get('/cliente/login','ClienteController@login');
Route::post('/cliente/login','ClienteController@postLogin');

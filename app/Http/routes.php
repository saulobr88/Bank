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
    return view('welcome');
});

Route::group(['middleware'=>'funcionario'], function(){

    Route::group(['middleware'=>'auth:funcionarios'], function(){
        Route::get('/funcionario','FuncionarioController@index');
    });

    Route::get('/funcionario/login','FuncionarioController@login');
    Route::post('/funcionario/login','FuncionarioController@postLogin');
    Route::get('/funcionario/logout','FuncionarioController@logout');
});

Route::auth();

Route::get('/home', 'HomeController@index');
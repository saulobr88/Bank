<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'cep', 'numero'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function clientes()
    {
        return User::all();
    }

    public function agencias()
    {
        return Agencia::all();
    }
}

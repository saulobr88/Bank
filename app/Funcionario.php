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
        'name', 'email', 'password', 'cpf', 'cep', 'numero',
        'agencia_id', 'departamento_id', 'funcionario_tipo_id', 'salario',
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

    public function contas()
    {
        return $this->hasMany('App\Conta');
    }

    public function agencia()
    {
        return $this->belongsTo('App\Agencia');
    }
    public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }
    public function funcionario_tipo()
    {
        return $this->belongsTo('App\Funcionario_tipo');
    }

}

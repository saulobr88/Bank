<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function contas()
    {
        return $this->hasMany('App\Conta');
    }

    public function cartaos()
    {
        return $this->hasMany('App\Cartao');
    }

    public function emprestimos()
    {
        return $this->hasMany('App\Emprestimos');
    }

    public function irs()
    {
        return $this->hasMany('App\IR');
    }

}

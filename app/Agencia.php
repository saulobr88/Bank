<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    //

    public function contas()
    {
        return $this->hasMany('App\Conta');
    }

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario');
    }
}

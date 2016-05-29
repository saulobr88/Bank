<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario_tipo extends Model
{
    //

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario');
    }
}

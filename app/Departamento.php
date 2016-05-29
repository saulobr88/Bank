<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario');
    }
}

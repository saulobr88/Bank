<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta_tipo extends Model
{
    //

    public function contas()
    {
        return $this->hasMany('App\Conta');
    }
}

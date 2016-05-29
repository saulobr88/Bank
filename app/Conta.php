<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function agencia()
    {
        return $this->belongsTo('App\Agencia');
    }

    public function conta_tipo()
    {
        return $this->belongsTo('App\Conta_tipo');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Funcionario');
    }
}

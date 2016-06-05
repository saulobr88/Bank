<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta_historico_saldo extends Model
{
    //
    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
}

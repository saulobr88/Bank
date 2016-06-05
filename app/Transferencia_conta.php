<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia_conta extends Model
{
    //
    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
}

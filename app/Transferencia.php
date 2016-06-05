<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    //
    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
}

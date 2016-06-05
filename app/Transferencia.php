<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    //
    public function transferencia_conta()
    {
        return $this->belongsTo('App\Transferencia_conta');
    }
}

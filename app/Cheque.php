<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    //
    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
}

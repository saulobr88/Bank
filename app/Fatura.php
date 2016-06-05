<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    //
    public function cartao()
    {
        return $this->belongsTo('App\Cartao');
    }

}

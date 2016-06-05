<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function faturas()
    {
        return $this->hasMany('App\Fatura');
    }

    public function lancamentos()
    {
        return $this->hasMany('App\Lancamentos');
    }
}

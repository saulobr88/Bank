<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IR extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }


}

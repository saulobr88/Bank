<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    //
    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }

    public function transacao_tipos()
    {
        return $this->belongsTo('App\Transacao_tipo');
    }
}

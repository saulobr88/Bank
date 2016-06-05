<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacao_tipo extends Model
{
    //
    public function transacoes()
    {
        return $this->hasMany('App\Transacao');
    }
}

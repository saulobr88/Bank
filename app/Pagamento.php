<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'valor', 'dt_vencimento', 'dt_pagamento',
        'vl_multa', 'codigo', 'descricao',
        'conta_id'
    ];
    //
    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
}

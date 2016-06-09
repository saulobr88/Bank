<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function agencia()
    {
        return $this->belongsTo('App\Agencia');
    }

    public function conta_tipo()
    {
        return $this->belongsTo('App\Conta_tipo');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Funcionario');
    }

    public function conta_historico_saldo()
    {
        return $this->hasMany('App\Conta_historico_saldo');
    }

    public function emprestimos()
    {
        return $this->hasMany('App\Emprestimos');
    }

    public function irs()
    {
        return $this->hasMany('App\IR');
    }

    public function transaferencias()
    {
        return $this->hasMany('App\Transferencia');
    }

    public function pagamentos()
    {
        return $this->hasMany('App\Pagamentos');
    }

    public function transacoes()
    {
        return $this->hasMany('App\Transacao');
    }

    public function cheques()
    {
        return $this->hasMany('App\Cheque');
    }

}

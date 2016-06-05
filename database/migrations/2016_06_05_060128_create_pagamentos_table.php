<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor', 10, 2);
            $table->date('dt_vencimento');
            $table->date('dt_pagamento');
            $table->decimal('vl_multa', 10, 2);
            $table->string('codigo')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('conta_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagamentos');
    }
}

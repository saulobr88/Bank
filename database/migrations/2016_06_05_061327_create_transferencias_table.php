<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('conta_id')->unsigned();
            $table->string('banco')->default('1');
            $table->string('agencia')->default('1');
            $table->string('numero')->default('1');
            $table->string('cnp_destino');
            $table->string('nome_destino');
            $table->decimal('valor', 10, 2);
            $table->date('dt_t');
            $table->string('tipo')->default('TED');
            $table->string('status');
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
        Schema::drop('transferencias');
    }
}

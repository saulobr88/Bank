<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaHistoricoSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_historico_saldos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('conta_id')->unsigned();
            $table->decimal('saldo', 10, 2);
            $table->dateTime('dt_time');
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
        Schema::drop('conta_historico_saldos');
    }
}

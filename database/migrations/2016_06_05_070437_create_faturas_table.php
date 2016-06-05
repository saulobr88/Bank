<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cartao_id')->unsigned();
            $table->date('dt_ini');
            $table->date('dt_fim');
            $table->decimal('vl_total', 10, 2);
            $table->decimal('vl_minimo', 10, 2);
            $table->string('status')->default('Aberto');
            $table->date('dt_pago')->nullable();
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
        Schema::drop('faturas');
    }
}

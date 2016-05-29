<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->integer('agencia_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('funcionario_id')->unsigned()->nullable();
            $table->decimal('saldo', 10, 2);
            $table->integer('conta_tipo_id')->unsigned()->default('1');
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
        Schema::drop('contas');
    }
}

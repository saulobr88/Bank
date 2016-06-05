<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->string('cod_seguranca');
            $table->date('dt_validade');
            $table->string('bandeira');
            $table->decimal('limite', 10, 2);
            $table->string('tipo')->default('DEBITO');
            $table->integer('user_id')->unsigned();
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
        Schema::drop('cartaos');
    }
}

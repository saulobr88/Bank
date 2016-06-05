<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('vl_solicitado', 10, 2);
            $table->decimal('vl_quitado', 10, 2)->nullable();
            $table->decimal('vl_total', 10, 2)->nullable();
            $table->integer('n_parcelas')->default(12);
            $table->decimal('vl_multa', 10, 2)->default(100.00);
            $table->integer('user_id')->unsigned();
            $table->date('dt_solicitacao')->nullable();
            $table->integer('funcionario_id')->unsigned();
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
        Schema::drop('emprestimos');
    }
}

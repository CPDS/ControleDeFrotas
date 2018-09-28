<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassageirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passageiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_passageiro');
            $table->string('matricula');
            $table->string('email');
            $table->string('telefone');
            $table->string('rg');
            $table->string('categoria');
            $table->string('instituicao');
            $table->string('observacoes');
            $table->string('status');
            $table->integer('fk_solicitacao')->unsigned();
            $table->foreign('fk_solicitacao')->references('id')->on('viagems');
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
        Schema::dropIfExists('passageiros');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiberacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liberacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->timestamp('datahora_saida');
            $table->timestamp('datahora_chegada');
            $table->string('destino');
            $table->string('retorno');
            $table->string('status');
            $table->integer('fk_veiculo')->unsigned();
            $table->foreign('fk_veiculo')->references('id')->on('veiculos');
            $table->integer('fk_motorista')->unsigned();
            $table->foreign('fk_motorista')->references('id')->on('users');
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
        Schema::dropIfExists('liberacaos');
    }
}

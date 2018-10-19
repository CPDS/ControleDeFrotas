<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViagemVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viagem_veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->integer('fk_veiculo')->unsigned();
            $table->foreign('fk_veiculo')->references('id')->on('veiculos');
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
        Schema::dropIfExists('viagem_veiculos');
    }
}

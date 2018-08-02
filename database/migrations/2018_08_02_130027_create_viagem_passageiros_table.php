<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViagemPassageirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viagem_passageiros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_viagem')->unsigned();
            $table->foreign('id_viagem')->references('id')->on('viagems');
            $table->integer('id_passageiro')->unsigned();
            $table->foreign('id_passageiro')->references('id')->on('passageiros');
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
        Schema::dropIfExists('viagem_passageiros');
    }
}

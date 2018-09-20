<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancoHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco_horas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('hora_inicio');
            $table->timestamp('hora_termino');
            $table->timestamp('hora_intervalo');
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
        Schema::dropIfExists('banco_horas');
    }
}

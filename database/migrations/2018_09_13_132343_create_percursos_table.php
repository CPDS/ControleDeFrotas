<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePercursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percursos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('hora_saida');
            $table->string('local_saida');
            $table->string('km_saida');
            $table->string('roteiro');
            $table->timestamp('hora_chegada');
            $table->string('local_chegada');
            $table->string('km_chegada');
            $table->integer('fk_diario')->unsigned();
            $table->foreign('fk_diario')->references('id')->on('diarios');
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
        Schema::dropIfExists('percursos');
    }
}

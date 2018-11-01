<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('data_inicio');
            $table->timestamp('data_termino');
            $table->string('valor');
            $table->string('status');
            $table->integer('fk_contrato')->unsigned();
            $table->foreign('fk_contrato')->references('id')->on('contratos');
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
        Schema::dropIfExists('termos');
    }
}

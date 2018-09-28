<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('codigo_ibge');
            $table->integer('fk_estado');
            $table->integer('populacao_2010');
            $table->decimal('densidade_demo');
            $table->string('gentilico');
            $table->decimal('area');
            $table->foreign('fk_estado')->references('id')->on('estados');
            $table->index('fk_estado');
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
        Schema::dropIfExists('cidades');
    }
}

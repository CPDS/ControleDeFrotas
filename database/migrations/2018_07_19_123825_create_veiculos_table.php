<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_veiculo');
            $table->string('placa');
            $table->string('tipo_combustivel');
            $table->string('status');
            $table->integer('qtd_total_lugares');
            $table->string('ano_fabricacao');
            $table->integer('minimo_passageiros');
            $table->integer('maximo_passageiros');
            $table->decimal('rendimento', 8,2);
            $table->string('marca');
            $table->boolean('tem_arcondicionado');
            $table->string('tipo_bagageiro');
            $table->integer('fk_campus')->unsigned();
            $table->foreign('fk_campus')->references('id')->on('campuses');
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
        Schema::dropIfExists('veiculos');
    }
}

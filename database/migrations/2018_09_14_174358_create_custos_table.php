<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qtd_diaria');
            $table->decimal('valor_diaria', 8,2);
            $table->decimal('custo_total_diaria', 8,2);
            $table->decimal('valor_manutencao', 8,2);
            $table->decimal('custo_total_viagem', 8,2);
            $table->integer('fk_diario_bordo')->unsigned();
            $table->foreign('fk_diario_bordo')->references('id')->on('diarios');
            $table->integer('fk_combustivel')->unsigned();
            $table->foreign('fk_combustivel')->references('id')->on('combustivels');
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
        Schema::dropIfExists('custos');
    }
}

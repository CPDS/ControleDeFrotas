<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiarioVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diario_veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_diario')->unsigned();
            $table->foreign('fk_diario')->references('id')->on('diarios');
            $table->integer('fk_veiculo')->unsigned();
            $table->foreign('fk_veiculo')->references('id')->on('veiculos');
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
        Schema::dropIfExists('diario_veiculos');
    }
}

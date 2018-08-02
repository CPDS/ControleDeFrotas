<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viagems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_rv');
            $table->integer('roteiro_id');
            $table->string('setor_nome');
            $table->integer('motorista_id');
            $table->integer('veiculo_id');
            $table->timestamp('data_saida');
            $table->timestamp('data_chegada');
            $table->string('status');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');
            $table->string('cidade_saida');
            $table->string('cidade_chegada');
            $table->timestamps();
            // adicionar os campos que teram no banco de dados
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viagems');
    }
}

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
            $table->string('numero_rv');
            $table->string('setor_emissor_rv');
            $table->timestamp('datahora_saida');
            $table->timestamp('datahora_chegada');
            $table->string('status');
            $table->string('estimativa_km');
            $table->string('nome_responsavel');
            $table->string('telefone_responsavel');
            $table->string('local_saida');
            $table->string('setor_autoriza_viagem');
            $table->integer('numero_passageiros');
            $table->string('tipo_solicitacao');
            $table->string('natureza_servico');
            $table->decimal('custo_viagem', 8,2);
            $table->string('descricao_bagagem');
            $table->string('codigo_acp_rv');
            $table->string('situacao');
            $table->integer('fk_veiculo')->unsigned();
            $table->foreign('fk_veiculo')->references('id')->on('veiculos');
            $table->integer('fk_cidade_saida')->unsigned();
            $table->foreign('fk_cidade_saida')->references('id')->on('cidades');
            $table->integer('fk_cidade_chegada')->unsigned();
            $table->foreign('fk_cidade_chegada')->references('id')->on('cidades');
            $table->integer('fk_tipo_servico')->unsigned();
            $table->foreign('fk_tipo_servico')->references('id')->on('tipo_servicos');
            $table->integer('fk_id_solicitante')->unsigned();
            $table->foreign('fk_id_solicitante')->references('id')->on('users');
            $table->integer('veiculo_id');

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

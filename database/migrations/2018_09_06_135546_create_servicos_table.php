<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor_derivados', 8,2);
            $table->decimal('valor_pecas', 8,2);
            $table->decimal('valor_servico', 8,2);
            $table->decimal('valor_smv', 8,2);
            $table->string('numero_ordem_servico');
            $table->timestamp('data_servico');
            $table->string('km_entrada_oficina');
            $table->string('tipo_servico_manutencao');
            $table->string('numero_smv');
            $table->string('numero_lupus');
            $table->string('numero_sei');
            $table->string('numero_empenho');
            $table->timestamp('data_envio_pedido_empenho');
            $table->string('numero_nf');
            $table->timestamp('data_pg_nob');
            $table->string('numero_nob');
            $table->decimal('valor_empenho',8,2);
            $table->decimal('valor_pago',8,2);
            $table->text('descricao_geral_servico');
            $table->string('status');
            $table->integer('fk_veiculo')->unsigned();
            $table->foreign('fk_veiculo')->references('id')->on('veiculos');
            $table->integer('fk_contrato')->unsigned();
            $table->foreign('fk_contrato')->references('id')->on('contratos');
            $table->integer('fk_motorista')->unsigned();
            $table->foreign('fk_motorista')->references('id')->on('users');
            $table->timestamps();

            //$table->timestamp('data_inicio_contrato');
            //$table->timestamp('data_vencimento_contrato');
            //$table->string('valor_contratado');
            //$table->timestamps();
            //acabar
            /*'fk_veiculo' => 'required',
              'fk_contrato' => 'required',
              
              'fk_motorista' => 'required',
         
              'numero_nf' => 'required',
              'data_pg_nob' => 'required',
              'numero_nob' => 'required',
              'valor_empenho' => 'required',
              'valor_pago' => 'required',
              'descricao_geral_servico' => 'required',*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
}

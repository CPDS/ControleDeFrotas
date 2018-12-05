<?php

use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contratos')->insert([
            'empresa_contratada_nome' => 'Porto Seguros',
            'empresa_contratada_cnpj' => '563561728',
            'numero_contrato' => '123123',
            'data_inicio_contrato' => date('Y-m-d',strtotime("now")),
            'data_vencimento_contrato' => date('Y-m-d',strtotime("now")),
            'valor_contratado' => '3.50',
            'tipo' => 'Licitacao',
            'status' => 'Ativo',
        ]);

    }
}

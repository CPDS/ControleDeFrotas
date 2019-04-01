<?php

use Illuminate\Database\Seeder;

class ViagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viagems')->insert([
            'nome' => 'Viagem para Conquista',
            'numero_rv' => '3423423',
            'setor_emissor_rv' => 'Setor A',
            'datahora_saida' => date('Y-m-d H:i:s',strtotime("now")),
            'datahora_chegada' => date('Y-m-d H:i:s',strtotime("now")),
            'status' => 'Ativo',
            'estimativa_km' => '312',
            'nome_responsavel' => 'Alex Noura',
            'telefone_responsavel' => '75 12391283',
            'local_saida' => 'uesb',
            'setor_autoriza_viagem' => 'Setor Tranportes',
            'numero_passageiros' => '6',
            'tipo_solicitacao' => 'teste',
            'natureza_servico' => 'Viagem de Campo',
            'custo_viagem' => '3.60',
            'descricao_bagagem' => 'algumas malas',
            'codigo_acp_rv' => '321',
            'situacao' => 'Pendente',
            'fk_motorista' => 4,
            'fk_veiculo' => 1,
            'fk_cidade_saida' => 1321,
            'fk_cidade_chegada' => 1401,
            'fk_tipo_servico' => 1,
            'fk_id_solicitante' => 1,
        ]);

    }
}

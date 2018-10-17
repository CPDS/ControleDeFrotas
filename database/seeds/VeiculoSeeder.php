<?php

use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veiculos')->insert([
            'nome_veiculo' => 'Ônibus Mercedes Benz',
            'placa' => 'TYX-2385',
            'tipo_combustivel' => 'Diesel',
            'status' => 'Ativo',
            'qtd_total_lugares' => '40',
            'ano_fabricacao' => '2016',
            'minimo_passageiros' => 10,
            'maximo_passageiros' => 40,
            'rendimento' => 3.60,
            'marca' => 'Mercedes Benz',
            'tem_arcondicionado' => true,
            'tipo_bagageiro' => 'Grande',
            'fk_campus' => 1,
        ]);
    }
}

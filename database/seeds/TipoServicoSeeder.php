<?php

use Illuminate\Database\Seeder;

class TipoServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_servicos')->insert([
            'nome_servico' => 'Pesquisa',
            'status' => 'Ativo'
        ]);
    }
}

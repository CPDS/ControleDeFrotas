<?php

use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('campuses')->insert([
          'nome_campus' => 'Vitória da Conquista',
          'status' => 'Ativo'
      ]);

      DB::table('campuses')->insert([
          'nome_campus' => 'Jequié',
          'status' => 'Ativo'
      ]);

      DB::table('campuses')->insert([
          'nome_campus' => 'Itapetinga',
          'status' => 'Ativo'
      ]);
    }
}

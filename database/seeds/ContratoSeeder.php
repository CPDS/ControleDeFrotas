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
        DB::table('combustivels')->insert([
            'nome' => 'Diesel',
            'valor_litro' => 3.50
        ]);
    }
}

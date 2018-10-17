<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('123456'),
        'telefone' => '(73) 3526-7504',
        'endereco' => 'Av. José Moreira Sobrinho numero 12',
        'fk_cidade' => 337,
        'status' => 'Ativo'
        ]);

        DB::table('users')->insert([
            'name' => 'Motorista1',
            'email' => 'moto@moto.com',
            'password' => Hash::make('123456'),
            'telefone' => '(73) 3526-7504',
            'endereco' => 'Av. José Moreira Sobrinho numero 12',
            'fk_cidade' => 337,
            'status' => 'Ativo'
        ]);
    }
}

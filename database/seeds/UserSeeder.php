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
            'name' => 'secretaria',
            'email' => 'secretaria@secretaria.com',
            'password' => Hash::make('123456'),
            'telefone' => '(73) 3526-7504',
            'endereco' => 'Av. José Moreira Sobrinho numero 12',
            'fk_cidade' => 337,
            'status' => 'Ativo'
        ]);

        DB::table('users')->insert([
            'name' => 'coordenador',
            'email' => 'coordenador@coordenador.com',
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

        DB::table('users')->insert([
            'name' => 'tecnico',
            'email' => 'tecnico@tecnico.com',
            'password' => Hash::make('123456'),
            'telefone' => '(73) 3526-7504',
            'endereco' => 'Av. José Moreira Sobrinho numero 12',
            'fk_cidade' => 337,
            'status' => 'Ativo'
        ]);

        DB::table('users')->insert([
            'name' => 'professor',
            'email' => 'professor@professor.com',
            'password' => Hash::make('123456'),
            'telefone' => '(73) 3526-7504',
            'endereco' => 'Av. José Moreira Sobrinho numero 12',
            'fk_cidade' => 337,
            'status' => 'Ativo'
        ]);

        DB::table('users')->insert([
            'name' => 'estudante',
            'email' => 'estudante@estudante.com',
            'password' => Hash::make('123456'),
            'telefone' => '(73) 3526-7504',
            'endereco' => 'Av. José Moreira Sobrinho numero 12',
            'fk_cidade' => 337,
            'status' => 'Ativo'
        ]);
    }
}

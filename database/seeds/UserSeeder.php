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
          'status' => 'Ativo',
          'telefone' => '(99) 99999-9999',
          'endereco' => 'endereco',
          'fk_cidade' => 3387,
          'status' => 1,
          'password' => Hash::make('123456')
      ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
          'name' => 'Administrador',
          'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
          'name' => 'Secretaria',
          'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
          'name' => 'Motorista',
          'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
          'name' => 'Professor',
          'guard_name' => 'web',
        ]);
    }
}

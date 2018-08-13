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
          'guard_name' => 'Administrador',
        ]);

        DB::table('roles')->insert([
          'name' => 'Secretario',
          'guard_name' => 'Secretario',
        ]);

        DB::table('roles')->insert([
          'name' => 'Morotista',
          'guard_name' => 'Morotista',
        ]);

        DB::table('roles')->insert([
          'name' => 'Professor',
          'guard_name' => 'Professor',
        ]);
    }
}

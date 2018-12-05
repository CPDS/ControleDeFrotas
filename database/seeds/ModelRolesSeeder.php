<?php

use Illuminate\Database\Seeder;

class ModelRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('model_has_roles')->insert([
          'role_id' => 1,
          'model_type' => 'App\User',
          'model_id' => 1,
        ]);

        DB::table('model_has_roles')->insert([
            'role_id' => 3,
            'model_type' => 'App\User',
            'model_id' => 2,
          ]);

        
    }
}

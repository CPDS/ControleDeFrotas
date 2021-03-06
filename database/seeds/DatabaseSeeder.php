<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(EstadosSeeder::class);
      $this->call(CidadesSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(RoleSeeder::class);
      $this->call(ModelRolesSeeder::class);
      $this->call(CampusSeeder::Class);
      $this->call(VeiculoSeeder::class);
      $this->call(TipoServicoSeeder::class);
      $this->call(ViagemSeeder::class);
      $this->call(ContratoSeeder::class);
      //$this->call(CombustivelSeeder::Class);

    }
}

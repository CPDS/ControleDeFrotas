<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      app()['cache']->forget('spatie.permission.cache');

        DB::table('roles')->insert([
            'name' => 'Administrador',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Secretaria',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Coordenador',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Motorista',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Tecnico',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Professor',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Estudante',
            'guard_name' => 'web',
        ]);
        
        //PERMISSOES
        #Usuário
        Permission::create(['name' => 'Cadastrar Usuario']);
        Permission::create(['name' => 'Editar Usuario']);
        Permission::create(['name' => 'Deletar Usuario']);
        Permission::create(['name' => 'Ver Usuario']);

        #Viagem
        Permission::create(['name' => 'Cadastrar Viagem']);
        Permission::create(['name' => 'Editar Viagem']);
        Permission::create(['name' => 'Deletar Viagem']);
        Permission::create(['name' => 'Ver Viagem']);

        #Veiculo
        Permission::create(['name' => 'Cadastrar Veiculo']);
        Permission::create(['name' => 'Editar Veiculo']);
        Permission::create(['name' => 'Deletar Veiculo']);
        Permission::create(['name' => 'Ver Veiculo']);

        #Servico
        Permission::create(['name' => 'Cadastrar Servico']);
        Permission::create(['name' => 'Editar Servico']);
        Permission::create(['name' => 'Deletar Servico']);
        Permission::create(['name' => 'Ver Servico']);

        #Contrato
        Permission::create(['name' => 'Cadastrar Contrato']);
        Permission::create(['name' => 'Editar Contrato']);
        Permission::create(['name' => 'Deletar Contrato']);
        Permission::create(['name' => 'Ver Contrato']);

        #Termo
        Permission::create(['name' => 'Cadastrar Termo']);
        Permission::create(['name' => 'Editar Termo']);
        Permission::create(['name' => 'Deletar Termo']);
        Permission::create(['name' => 'Ver Termo']);

        #Custo
        Permission::create(['name' => 'Cadastrar Custo']);
        Permission::create(['name' => 'Editar Custo']);
        Permission::create(['name' => 'Deletar Custo']);
        Permission::create(['name' => 'Ver Custo']);

        #Combustivel
        Permission::create(['name' => 'Cadastrar Combustivel']);
        Permission::create(['name' => 'Editar Combustivel']);
        Permission::create(['name' => 'Deletar Combustivel']);
        Permission::create(['name' => 'Ver Combustivel']);

        #Diario
        Permission::create(['name' => 'Cadastrar Diario']);
        Permission::create(['name' => 'Editar Diario']);
        Permission::create(['name' => 'Deletar Diario']);
        Permission::create(['name' => 'Ver Diario']);

        #Percurso
        Permission::create(['name' => 'Cadastrar Percurso']);
        Permission::create(['name' => 'Editar Percurso']);
        Permission::create(['name' => 'Deletar Percurso']);
        Permission::create(['name' => 'Ver Percurso']);

        #Passageiro
        Permission::create(['name' => 'Cadastrar Passageiro']);
        Permission::create(['name' => 'Editar Passageiro']);
        Permission::create(['name' => 'Deletar Passageiro']);
        Permission::create(['name' => 'Ver Passageiro']);

        #Setor
        Permission::create(['name' => 'Cadastrar Setor']);
        Permission::create(['name' => 'Editar Setor']);
        Permission::create(['name' => 'Deletar Setor']);
        Permission::create(['name' => 'Ver Setor']);

        #Campus
        Permission::create(['name' => 'Cadastrar Campus']);
        Permission::create(['name' => 'Editar Campus']);
        Permission::create(['name' => 'Deletar Campus']);
        Permission::create(['name' => 'Ver Campus']);

        #ASSOCIANDO ROLES A PERMISSOES
        #ADMINISTRADOR:
        #Usuario
        DB::table('model_has_permissions')->insert([
          'model_type' => 'App\User',
          'permission_id' => 1,
          'model_id' => 1,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 2,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 3,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 4,
            'model_id' => 1,
        ]);

        #Viagem
        DB::table('model_has_permissions')->insert([
          'model_type' => 'App\User',
            'permission_id' => 5,
          'model_id' => 1,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 6,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 7,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 8,
            'model_id' => 1,
        ]);

        #Veiculo
        DB::table('model_has_permissions')->insert([
          'model_type' => 'App\User',
            'permission_id' => 9,
          'model_id' => 1,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 10,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 11,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 12,
            'model_id' => 1,
        ]);

        #Servico
        DB::table('model_has_permissions')->insert([
          'model_type' => 'App\User',
            'permission_id' => 13,
          'model_id' => 1,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 14,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 15,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 16,
            'model_id' => 1,
        ]);

        #Contrato
        DB::table('model_has_permissions')->insert([
          'model_type' => 'App\User',
            'permission_id' => 17,
          'model_id' => 1,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 18,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 19,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 20,
            'model_id' => 1,
        ]);

        #Termo
        DB::table('model_has_permissions')->insert([
          'model_type' => 'App\User',
            'permission_id' => 21,
          'model_id' => 1,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 22,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 23,
            'model_id' => 1,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 24,
            'model_id' => 1,
        ]);

        #Custo
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 25,
            'model_id' => 1,
          ]);
          
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 26,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 27,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 28,
              'model_id' => 1,
          ]);

        #Combustivel
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 29,
            'model_id' => 1,
          ]);
          
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 30,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 31,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 32,
              'model_id' => 1,
          ]);

        #Diario
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 33,
            'model_id' => 1,
          ]);
          
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 34,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 35,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 36,
              'model_id' => 1,
          ]);

        #Percurso
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 37,
            'model_id' => 1,
          ]);
          
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 38,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 39,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 40,
              'model_id' => 1,
          ]);

        #Passageiro
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 41,
            'model_id' => 1,
          ]);
          
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 42,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 43,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 44,
              'model_id' => 1,
          ]);

        #Setor
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 45,
            'model_id' => 1,
          ]);
          
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 46,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 47,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 48,
              'model_id' => 1,
          ]);
          
        #Campus
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 49,
            'model_id' => 1,
          ]);
          
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 50,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 51,
              'model_id' => 1,
          ]);
          DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',  
            'permission_id' => 52,
              'model_id' => 1,
          ]);



        #SECRETARIA:
        #Usuario
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 1,
        'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 2,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 3,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 4,
            'model_id' => 2,
        ]);

        #Viagem
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 5,
        'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 6,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 7,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 8,
            'model_id' => 2,
        ]);

        #Veiculo
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 9,
        'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 10,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 11,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 12,
            'model_id' => 2,
        ]);

        #Servico
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 13,
        'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 14,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 15,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 16,
            'model_id' => 2,
        ]);

        #Contrato
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 17,
        'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 18,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 19,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 20,
            'model_id' => 2,
        ]);

        #Termo
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 21,
        'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 22,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 23,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 24,
            'model_id' => 2,
        ]);

        #Custo
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 25,
            'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 26,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 27,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 28,
            'model_id' => 2,
        ]);

        #Combustivel
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 29,
            'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 30,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 31,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 32,
            'model_id' => 2,
        ]);

        #Diario
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 33,
            'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 34,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 35,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 36,
            'model_id' => 2,
        ]);

        #Percurso
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 37,
            'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 38,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 39,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 40,
            'model_id' => 2,
        ]);

        #Passageiro
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 41,
            'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 42,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 43,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 44,
            'model_id' => 2,
        ]);

        #Setor
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 45,
            'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 46,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 47,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 48,
            'model_id' => 2,
        ]);
        
        #Campus
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 49,
            'model_id' => 2,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 50,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 51,
            'model_id' => 2,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 52,
            'model_id' => 2,
        ]);


        #COORDENADOR:
        #Usuario
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 1,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 2,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 3,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 4,
            'model_id' => 3,
        ]);
        
        #Viagem
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 5,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 6,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 7,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 8,
            'model_id' => 3,
        ]);
        
        #Veiculo
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 9,
        'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 10,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 11,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 12,
            'model_id' => 3,
        ]);
        
        #Servico
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 13,
        'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 14,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 15,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 16,
            'model_id' => 3,
        ]);
        
        #Contrato
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 17,
        'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 18,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 19,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 20,
            'model_id' => 3,
        ]);
        
        #Termo
        DB::table('model_has_permissions')->insert([
        'model_type' => 'App\User',
            'permission_id' => 21,
        'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 22,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 23,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 24,
            'model_id' => 3,
        ]);
        
        #Custo
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 25,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 26,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 27,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 28,
            'model_id' => 3,
        ]);
        
        #Combustivel
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 29,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 30,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 31,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 32,
            'model_id' => 3,
        ]);
        
        #Diario
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 33,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 34,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 35,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 36,
            'model_id' => 3,
        ]);
        
        #Percurso
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 37,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 38,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 39,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 40,
            'model_id' => 3,
        ]);
        
        #Passageiro
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 41,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 42,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 43,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 44,
            'model_id' => 3,
        ]);
        
        #Setor
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 45,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 46,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 47,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 48,
            'model_id' => 3,
        ]);
        
        #Campus
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 49,
            'model_id' => 3,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 50,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 51,
            'model_id' => 3,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 52,
            'model_id' => 3,
        ]);


        #MOTORISTA
        #Diario
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 33,
            'model_id' => 4,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 34,
            'model_id' => 4,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 35,
            'model_id' => 4,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 36,
            'model_id' => 4,
        ]);

        #Percurso
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 37,
            'model_id' => 4,
        ]);
        
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 38,
            'model_id' => 4,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 39,
            'model_id' => 4,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 40,
            'model_id' => 4,
        ]);

        #Viagem - ver as cadastradas para ele
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 8,
            'model_id' => 4,
        ]);


        #TECNICO
        #Viagem - ver - criar - editar
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 5,
            'model_id' => 5,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 6,
            'model_id' => 5,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 8,
            'model_id' => 5,
        ]);

        #Passageiro - criar e ver
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 41,
            'model_id' => 5,
          ]);
          
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 44,
            'model_id' => 5,
        ]);

        #PROFESSOR
        #Viagem - ver - criar - editar
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 5,
            'model_id' => 6  ,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 6,
            'model_id' => 6,
        ]);
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 8,
            'model_id' => 6,
        ]);

        #Passageiro - criar e ver
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 41,
            'model_id' => 6,
          ]);
          
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 44,
            'model_id' => 6,
        ]);

        #ESTUDANTE
        #Viagem - ver 
        DB::table('model_has_permissions')->insert([
            'model_type' => 'App\User',
            'permission_id' => 8,
            'model_id' => 7  ,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create( [
            'nome'  =>  'Acre',
            'sigla' =>  'AC'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Alagoas',
            'sigla' =>  'AL'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Amazonas',
            'sigla' =>  'AM'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Amapá',
            'sigla' =>  'AP'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Bahia',
            'sigla' =>  'BA'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Ceará',
            'sigla' =>  'CE'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Distrito Federal',
            'sigla' =>  'DF'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Espirito Santo',
            'sigla' =>  'ES'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Goiás',
            'sigla' =>  'GO'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Maranhão',
            'sigla' =>  'MA'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Minas Gerais',
            'sigla' =>  'MG'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Mato Grosso do Sul',
            'sigla' =>  'MS'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Mato Grosso',
            'sigla' =>  'MT'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Pará',
            'sigla' =>  'PA'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Paraíba',
            'sigla' =>  'PB'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Pernambuco',
            'sigla' =>  'PE'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Piauí',
            'sigla' =>  'PI'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Paraná',
            'sigla' =>  'PR'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Rio de Janeiro',
            'sigla' =>  'RJ'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Rio Grande do Norte',
            'sigla' =>  'RN'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Rondônia',
            'sigla' =>  'RO'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Roraima',
            'sigla' =>  'RR'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Rio Grande do Sul',
            'sigla' =>  'RS'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Santa Catarina',
            'sigla' =>  'SC'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Sergipe',
            'sigla' =>  'SE'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'São Paulo',
            'sigla' =>  'SP'
        ] ); 
                        
            Estado::create( [
            'nome'  =>  'Tocantins',
            'sigla' =>  'TO'
        ] ); 
        
    }
}
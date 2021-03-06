<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now store something great!
|
*/

Route::get('/', 'HomeController@index');
Route::auth();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/', function () {
    return view('welcome');
}); */

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::group(['prefix'=>'veiculos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Tecnico']], function(){
	Route::get('',['as'=>'veiculos.index', 'uses'=>'VeiculoController@index']);
    Route::get('/list',['as' => 'veiculos.list', 'uses' => 'VeiculoController@list']);
    Route::post('/store', ['as' => 'veiculos.store', 'uses' => 'VeiculoController@store']); 
    Route::post('/update', ['as' => 'veiculos.update', 'uses' => 'VeiculoController@update']); 
    Route::post('/delete', ['as' => 'veiculos.delete', 'uses' => 'VeiculoController@destroy']); 

    });
    Route::group(['prefix'=>'passageiros','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador']], function(){
    Route::get('',['as'=>'passageiros.index', 'uses'=>'PassageiroController@index']);
    Route::get('/list',['as' => 'passageiros.list', 'uses' => 'PassageiroController@list']);
    Route::post('/store', ['as' => 'passageiros.store', 'uses' => 'PassageiroController@store']); 
    Route::post('/update', ['as' => 'passageiros.update', 'uses' => 'PassageiroController@update']); 
    Route::post('/delete', ['as' => 'passageiros.delete', 'uses' => 'PassageiroController@destroy']); 

    });

    Route::group(['prefix'=>'viagens','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Motorista|Coordenador']], function(){
    Route::get('',['as'=>'viagens.index', 'uses'=>'ViagemController@index']);
    Route::get('/list',['as' => 'viagens.list', 'uses' => 'ViagemController@list']);
    Route::post('/store', ['as' => 'viagens.store', 'uses' => 'ViagemController@store']); 
    Route::post('/update', ['as' => 'viagens.update', 'uses' => 'ViagemController@update']); 
    Route::post('/delete', ['as' => 'viagens.delete', 'uses' => 'ViagemController@destroy']); 
    Route::get('/cidade/{estado}',['as' => 'viagem.cidade','uses' => 'ViagemController@selectCidade']);
    Route::get('/reservas/{dados}',['as' => 'viagem.reservas','uses' => 'ViagemController@reservas']);
    Route::get('/relatorio',['as' => 'viagens.relatorio', 'uses' => 'RelatorioController@viagens']);

    });

    Route::get('events', 'EventsController@index')->name('events.index');
    Route::post('events', 'EventsController@addEvent')->name('events.add');
    /*Route::group(['prefix'=>'','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'events.index', 'uses'=>'EventsController@index']);
    Route::get('/list',['as' => 'events.list', 'uses' => 'EventsController@list']);
    Route::post('/store', ['as' => 'events.store', 'uses' => 'EventsController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'events.update', 'uses' => 'EventsController@update']); 
    Route::post('/delete', ['as' => 'events.delete', 'uses' => 'EventsController@destroy']); 
    */
  //  });

    Route::group(['prefix'=>'motoristas','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador']], function(){
    Route::get('',['as'=>'motoristas.index', 'uses'=>'UsuarioController@index']);//->middleware('role:Secretaria')
    Route::get('/list',['as' => 'motoristas.list', 'uses' => 'UsuarioController@list']);
    Route::post('/store', ['as' => 'motoristas.store', 'uses' => 'UsuarioController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'motoristas.update', 'uses' => 'UsuarioController@update']); 
    Route::post('/delete', ['as' => 'motoristas.delete', 'uses' => 'UsuarioController@destroy']); 

    });

    Route::group(['prefix'=>'contratos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador']], function(){
    Route::get('',['as'=>'contratos.index', 'uses'=>'ContratoController@index']);
    Route::get('/list',['as' => 'contratos.list', 'uses' => 'ContratoController@list']);
    Route::post('/store', ['as' => 'contratos.store', 'uses' => 'ContratoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'contratos.update', 'uses' => 'ContratoController@update']); 
    Route::post('/delete', ['as' => 'contratos.delete', 'uses' => 'ContratoController@destroy']); 

    });

    Route::group(['prefix'=>'percursos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Motorista']], function(){
    Route::get('',['as'=>'percursos.index', 'uses'=>'PercursoController@index']);
    Route::get('/list',['as' => 'percursos.list', 'uses' => 'PercursoController@list']);
    Route::post('/store', ['as' => 'percursos.store', 'uses' => 'PercursoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'percursos.update', 'uses' => 'PercursoController@update']); 
    Route::post('/delete', ['as' => 'percursos.delete', 'uses' => 'PercursoController@destroy']); 
    Route::get('/cidade/{estado}',['as' => 'percursos.cidade','uses' => 'PercursoController@selectCidade']);

    });

    Route::group(['prefix'=>'usuarios','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador']], function(){
    Route::get('',['as'=>'usuarios.index', 'uses'=>'UsuarioController@index']);
    Route::get('/list',['as' => 'usuarios.list', 'uses' => 'UsuarioController@list']);
    Route::post('/store', ['as' => 'usuarios.store', 'uses' => 'UsuarioController@store']); 
    Route::post('/update', ['as' => 'usuarios.update', 'uses' => 'UsuarioController@update']); 
    Route::post('/delete', ['as' => 'usuarios.delete', 'uses' => 'UsuarioController@destroy']); 
    Route::get('/cidade/{estado}',['as' => 'usuarios.cidade','uses' => 'UsuarioController@selectCidade']);
    Route::get('/permissions', ['as' => 'gerenciar-users.permissions', 'uses' => 'UsuarioController@permissions']);
    Route::get('/get-permissions/{papel}', ['as' => 'gerenciar-users.permissions', 'uses' => 'UsuarioController@getPermissions']);
    Route::post('/permission', ['as' => 'usuarios.post.permission', 'uses' => 'UsuarioController@createPermissions']);
    });

    Route::group(['prefix'=>'diarios','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Motorista|Tecnico']], function(){
    Route::get('',['as'=>'diarios.index', 'uses'=>'DiarioController@index']);
    Route::get('/list',['as' => 'diarios.list', 'uses' => 'DiarioController@list']);
    Route::post('/store', ['as' => 'diarios.store', 'uses' => 'DiarioController@store']); 
    Route::post('/update', ['as' => 'diarios.update', 'uses' => 'DiarioController@update']); 
    Route::post('/delete', ['as' => 'diarios.delete', 'uses' => 'DiarioController@destroy']); 

    });

    Route::group(['prefix'=>'servicos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador']], function(){
    Route::get('',['as'=>'servicos.index', 'uses'=>'ServicoController@index']);
    Route::get('/list',['as' => 'servicos.list', 'uses' => 'ServicoController@list']);
    Route::post('/store', ['as' => 'servicos.store', 'uses' => 'ServicoController@store']); 
    Route::post('/update', ['as' => 'servicos.update', 'uses' => 'ServicoController@update']); 
    Route::post('/delete', ['as' => 'servicos.delete', 'uses' => 'ServicoController@destroy']); 

    });

    Route::group(['prefix'=>'banco_horas','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador']], function(){
    Route::get('',['as'=>'horas.index', 'uses'=>'BancoHorasController@index']);
    Route::get('/list',['as' => 'banco_horas.list', 'uses' => 'BancoHorasController@list']);
    Route::post('/store', ['as' => 'banco_horas.store', 'uses' => 'BancoHorasController@store']); 
    Route::post('/update', ['as' => 'banco_horas.update', 'uses' => 'BancoHorasController@update']); 
    Route::post('/delete', ['as' => 'banco_horas.delete', 'uses' => 'BancoHorasController@destroy']); 

    });

    Route::group(['prefix'=>'setor','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador']], function(){
    Route::get('',['as'=>'setor.index', 'uses'=>'SetorController@index']);
    Route::get('/list',['as' => 'setor.list', 'uses' => 'SetorController@list']);
    Route::post('/store', ['as' => 'setor.store', 'uses' => 'SetorController@store']); 
    Route::post('/update', ['as' => 'setor.update', 'uses' => 'SetorController@update']); 
    Route::post('/delete', ['as' => 'setor.delete', 'uses' => 'SetorController@destroy']); 

    });

    Route::group(['prefix'=>'tiposervico','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Tecnico']], function(){
    Route::get('',['as'=>'tiposervico.index', 'uses'=>'TipoServicoController@index']);
    Route::get('/list',['as' => 'tiposervico.list', 'uses' => 'TipoServicoController@list']);
    Route::post('/store', ['as' => 'tiposervico.store', 'uses' => 'TipoServicoController@store']); 
    Route::post('/update', ['as' => 'tiposervico.update', 'uses' => 'TipoServicoController@update']); 
    Route::post('/delete', ['as' => 'tiposervico.delete', 'uses' => 'TipoServicoController@destroy']); 

    });

    Route::group(['prefix'=>'campus','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Tecnico']], function(){
    Route::get('',['as'=>'campus.index', 'uses'=>'CampusController@index']);
    Route::get('/list',['as' => 'campus.list', 'uses' => 'CampusController@list']);
    Route::post('/store', ['as' => 'campus.store', 'uses' => 'CampusController@store']); 
    Route::post('/update', ['as' => 'campus.update', 'uses' => 'CampusController@update']); 
    Route::post('/delete', ['as' => 'campus.delete', 'uses' => 'CampusController@destroy']); 

    });

    Route::group(['prefix'=>'termos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Tecnico']], function(){
    Route::get('',['as'=>'termos.index', 'uses'=>'TermoController@index']);
    Route::get('/list',['as' => 'termos.list', 'uses' => 'TermoController@list']);
    Route::post('/store', ['as' => 'termos.store', 'uses' => 'TermoController@store']); 
    Route::post('/update', ['as' => 'termos.update', 'uses' => 'TermoController@update']); 
    Route::post('/delete', ['as' => 'termos.delete', 'uses' => 'TermoController@destroy']); 

    });

    Route::group(['prefix'=>'custos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Tecnico']], function(){
    Route::get('',['as'=>'custos.index', 'uses'=>'CustoController@index']);
    Route::get('/list',['as' => 'custos.list', 'uses' => 'CustoController@list']);
    Route::post('/store', ['as' => 'custos.store', 'uses' => 'CustoController@store']); 
    Route::post('/update', ['as' => 'custos.update', 'uses' => 'CustoController@update']); 
    Route::post('/delete', ['as' => 'custos.delete', 'uses' => 'CustoController@destroy']); 

    });

    Route::group(['prefix'=>'combustivel','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Tecnico']], function(){
    Route::get('',['as'=>'combustivel.index', 'uses'=>'CombustivelController@index']);
    Route::get('/list',['as' => 'combustivel.list', 'uses' => 'CombustivelController@list']);
    Route::post('/store', ['as' => 'combustivel.store', 'uses' => 'CombustivelController@store']); 
    Route::post('/update', ['as' => 'combustivel.update', 'uses' => 'CombustivelController@update']); 
    Route::post('/delete', ['as' => 'combustivel.delete', 'uses' => 'CombustivelController@destroy']); 

    });

    Route::group(['prefix'=>'liberacao','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador|Coordenador|Tecnico']], function(){
    Route::get('',['as'=>'liberacao.index', 'uses'=>'LiberacaoController@index']);
    Route::get('/list',['as' => 'liberacao.list', 'uses' => 'LiberacaoController@list']);
    Route::post('/store', ['as' => 'liberacao.store', 'uses' => 'LiberacaoController@store']); 
    Route::post('/update', ['as' => 'liberacao.update', 'uses' => 'LiberacaoController@update']); 
    Route::post('/delete', ['as' => 'liberacao.delete', 'uses' => 'LiberacaoController@destroy']); 
    
        });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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
    Route::group(['prefix'=>'veiculos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
	  Route::get('',['as'=>'veiculos.index', 'uses'=>'VeiculoController@index']);
    Route::get('/list',['as' => 'veiculos.list', 'uses' => 'VeiculoController@list']);
    Route::post('/store', ['as' => 'veiculos.store', 'uses' => 'VeiculoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'veiculos.update', 'uses' => 'VeiculoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'veiculos.delete', 'uses' => 'VeiculoController@destroy']); // para deletar

    });
    Route::group(['prefix'=>'passageiros','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'passageiros.index', 'uses'=>'PassageiroController@index']);
    Route::get('/list',['as' => 'passageiros.list', 'uses' => 'PassageiroController@list']);
    Route::post('/store', ['as' => 'passageiros.store', 'uses' => 'PassageiroController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'passageiros.update', 'uses' => 'PassageiroController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'passageiros.delete', 'uses' => 'PassageiroController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'viagems','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'viagems.index', 'uses'=>'ViagemController@index']);
    Route::get('/list',['as' => 'viagems.list', 'uses' => 'ViagemController@list']);
    Route::post('/store', ['as' => 'viagems.store', 'uses' => 'ViagemController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'viagems.update', 'uses' => 'ViagemController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'viagems.delete', 'uses' => 'ViagemController@destroy']); // para deletar
    Route::get('/cidade/{estado}',['as' => 'viagem.cidade','uses' => 'ViagemController@selectCidade']);
    });

    Route::get('events', 'EventsController@index')->name('events.index');
    Route::post('events', 'EventsController@addEvent')->name('events.add');
    /*Route::group(['prefix'=>'','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'events.index', 'uses'=>'EventsController@index']);
    Route::get('/list',['as' => 'events.list', 'uses' => 'EventsController@list']);
    Route::post('/store', ['as' => 'events.store', 'uses' => 'EventsController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'events.update', 'uses' => 'EventsController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'events.delete', 'uses' => 'EventsController@destroy']); // para deletar
    */
  //  });

    Route::group(['prefix'=>'motoristas','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'motoristas.index', 'uses'=>'UsuarioController@index']);
    Route::get('/list',['as' => 'motoristas.list', 'uses' => 'UsuarioController@list']);
    Route::post('/store', ['as' => 'motoristas.store', 'uses' => 'UsuarioController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'motoristas.update', 'uses' => 'UsuarioController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'motoristas.delete', 'uses' => 'UsuarioController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'contratos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'contratos.index', 'uses'=>'ContratoController@index']);
    Route::get('/list',['as' => 'contratos.list', 'uses' => 'ContratoController@list']);
    Route::post('/store', ['as' => 'contratos.store', 'uses' => 'ContratoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'contratos.update', 'uses' => 'ContratoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'contratos.delete', 'uses' => 'ContratoController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'percursos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'percursos.index', 'uses'=>'PercursoController@index']);
    Route::get('/list',['as' => 'percursos.list', 'uses' => 'PercursoController@list']);
    Route::post('/store', ['as' => 'percursos.store', 'uses' => 'PercursoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'percursos.update', 'uses' => 'PercursoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'percursos.delete', 'uses' => 'PercursoController@destroy']); // para deletar
    Route::get('/cidade/{estado}',['as' => 'percursos.cidade','uses' => 'PercursoController@selectCidade']);

    });

    Route::group(['prefix'=>'usuarios','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'usuarios.index', 'uses'=>'UsuarioController@index']);
    Route::get('/list',['as' => 'usuarios.list', 'uses' => 'UsuarioController@list']);
    Route::post('/create', ['as' => 'usuarios.store', 'uses' => 'UsuarioController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'usuarios.update', 'uses' => 'UsuarioController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'usuarios.delete', 'uses' => 'UsuarioController@destroy']); // para deletar
    Route::get('/cidade/{estado}',['as' => 'usuarios.cidade','uses' => 'UsuarioController@selectCidade']);

    });

    Route::group(['prefix'=>'diarios','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'diarios.index', 'uses'=>'DiarioController@index']);
    Route::get('/list',['as' => 'diarios.list', 'uses' => 'DiarioController@list']);
    Route::post('/create', ['as' => 'diarios.store', 'uses' => 'DiarioController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'diarios.update', 'uses' => 'DiarioController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'diarios.delete', 'uses' => 'DiarioController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'servicos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'servicos.index', 'uses'=>'ServicoController@index']);
    Route::get('/list',['as' => 'servicos.list', 'uses' => 'ServicoController@list']);
    Route::post('/create', ['as' => 'servicos.store', 'uses' => 'ServicoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'servicos.update', 'uses' => 'ServicoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'servicos.delete', 'uses' => 'ServicoController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'banco_horas','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'horas.index', 'uses'=>'BancoHorasController@index']);
    Route::get('/list',['as' => 'banco_horas.list', 'uses' => 'BancoHorasController@list']);
    Route::post('/create', ['as' => 'banco_horas.store', 'uses' => 'BancoHorasController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'banco_horas.update', 'uses' => 'BancoHorasController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'banco_horas.delete', 'uses' => 'BancoHorasController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'setor','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'setor.index', 'uses'=>'SetorController@index']);
    Route::get('/list',['as' => 'setor.list', 'uses' => 'SetorController@list']);
    Route::post('/create', ['as' => 'setor.store', 'uses' => 'SetorController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'setor.update', 'uses' => 'SetorController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'setor.delete', 'uses' => 'SetorController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'tiposervico','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'tiposervico.index', 'uses'=>'TipoServicoController@index']);
    Route::get('/list',['as' => 'tiposervico.list', 'uses' => 'TipoServicoController@list']);
    Route::post('/create', ['as' => 'tiposervico.store', 'uses' => 'TipoServicoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'tiposervico.update', 'uses' => 'TipoServicoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'tiposervico.delete', 'uses' => 'TipoServicoController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'campus','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'campus.index', 'uses'=>'CampusController@index']);
    Route::get('/list',['as' => 'campus.list', 'uses' => 'CampusController@list']);
    Route::post('/create', ['as' => 'campus.store', 'uses' => 'CampusController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'campus.update', 'uses' => 'CampusController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'campus.delete', 'uses' => 'CampusController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'termos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'termos.index', 'uses'=>'TermoController@index']);
    Route::get('/list',['as' => 'termos.list', 'uses' => 'TermoController@list']);
    Route::post('/create', ['as' => 'termos.store', 'uses' => 'TermoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'termos.update', 'uses' => 'TermoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'termos.delete', 'uses' => 'TermoController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'custos','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'custos.index', 'uses'=>'CustoController@index']);
    Route::get('/list',['as' => 'custos.list', 'uses' => 'CustoController@list']);
    Route::post('/create', ['as' => 'custos.store', 'uses' => 'CustoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'custos.update', 'uses' => 'CustoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'custos.delete', 'uses' => 'CustoController@destroy']); // para deletar

    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

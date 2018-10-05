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

    Route::group(['prefix'=>'contrato','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'contrato.index', 'uses'=>'ContratoController@index']);
    Route::get('/list',['as' => 'contrato.list', 'uses' => 'ContratoController@list']);
    Route::post('/store', ['as' => 'contrato.store', 'uses' => 'ContratoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'contrato.update', 'uses' => 'ContratoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'contrato.delete', 'uses' => 'ContratoController@destroy']); // para deletar

    });

    Route::group(['prefix'=>'percurso','where'=>['id'=>'[0-9]+'], 'middleware' => ['role:Administrador']], function(){
    Route::get('',['as'=>'percurso.index', 'uses'=>'PercursoController@index']);
    Route::get('/list',['as' => 'percurso.list', 'uses' => 'PercursoController@list']);
    Route::post('/store', ['as' => 'percurso.store', 'uses' => 'PercursoController@store']); // relacionada ao create do botão para salvar cadastro de veículo
    Route::post('/update', ['as' => 'percurso.update', 'uses' => 'PercursoController@update']); // uso para atualizações
    Route::post('/delete', ['as' => 'percurso.delete', 'uses' => 'PercursoController@destroy']); // para deletar

    });


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

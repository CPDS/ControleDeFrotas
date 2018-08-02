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

Route::get('/', function () {
    return view('welcome');
});

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
    
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

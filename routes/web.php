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
    Route::group(['prefix'=>'veiculos','where'=>['id'=>'[0-9]+']], function(){

	Route::get('',['as'=>'veiculos.index', 'uses'=>'VeiculoController@index']);
    Route::get('/list',['as' => 'veiculos.list', 'uses' => 'VeiculoController@list']);
    Route::post('/store', ['as' => 'veiculos.store', 'uses' => 'VeiculoController@store']);
    Route::post('/update', ['as' => 'veiculos.update', 'uses' => 'VeiculoController@update']);
    Route::post('/delete', ['as' => 'veiculos.destroy', 'uses' => 'VeiculoController@delete']);
    
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'atores', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('',              ['as' => 'atores', 'uses' => '\App\Http\Controllers\AtoresController@index']);
    Route::get('create',        ['as' => 'atores.create', 'uses' =>  '\App\Http\Controllers\AtoresController@create']);
    Route::post('store',        ['as' => 'atores.store', 'uses' =>  '\App\Http\Controllers\AtoresController@store']);
    Route::get('{id}/destroy',  ['as' => 'atores.destroy', 'uses' =>  '\App\Http\Controllers\AtoresController@destroy']);
    Route::get('{id}/edit',     ['as' => 'atores.edit', 'uses' =>  '\App\Http\Controllers\AtoresController@edit']);
    Route::put('{id}/update',   ['as' => 'atores.update', 'uses' =>  '\App\Http\Controllers\AtoresController@update']);
});

Route::group(['prefix' => 'nacionalidades', 'where' => ['id' => '[0-9]+']], function () {
    Route::get('',              ['as' => 'nacionalidades', 'uses' => '\App\Http\Controllers\NacionalidadesController@index']);
    Route::get('create',        ['as' => 'nacionalidades.create', 'uses' =>  '\App\Http\Controllers\NacionalidadesController@create']);
    Route::post('store',        ['as' => 'nacionalidades.store', 'uses' =>  '\App\Http\Controllers\NacionalidadesController@store']);
    Route::get('{id}/destroy',  ['as' => 'nacionalidades.destroy', 'uses' =>  '\App\Http\Controllers\NacionalidadesController@destroy']);
    Route::get('{id}/edit',     ['as' => 'nacionalidades.edit', 'uses' =>  '\App\Http\Controllers\NacionalidadesController@edit']);
    Route::put('{id}/update',   ['as' => 'nacionalidades.update', 'uses' =>  '\App\Http\Controllers\NacionalidadesController@update']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

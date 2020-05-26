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

Route::group(['prefix' => 'produto', 'as', 'produto.', 'namespace' => 'produto'], function () {
    Route::get('/', ['as' => 'index', 'uses' =>  'ProdutoController@home']);
    Route::post('/', ['as' => 'index', 'uses' => 'ProdutoController@add']);
    Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'ProdutoController@del']);

    Route::get('/alterar/{id}', ['as' => 'alterar', 'uses' => 'ProdutoController@editarItem']);
    Route::post('/alterar/{id}', ['as' => 'alterar', 'uses' => 'ProdutoController@update']);
});

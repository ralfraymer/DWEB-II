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
    return view('home');
});

Route::group(['prefix' => 'produto', 'as', 'produto.', 'namespace' => 'Produto'], function () {
    Route::get('/', ['as' => 'lista', 'uses' =>  'ProdutoController@lista']);

    Route::post('/', ['as' => 'add', 'uses' => 'ProdutoController@add']);
    Route::get('/delete/{id}', ['as' => 'deletar', 'uses' => 'ProdutoController@deletar']);

    Route::get('/alterar/{id}', ['as' => 'editar', 'uses' => 'ProdutoController@editar']);
    Route::post('/alterar/{id}', ['as' => 'alterar', 'uses' => 'ProdutoController@update']);
});

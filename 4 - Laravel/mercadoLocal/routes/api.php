<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Produto;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $req) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    Route::post('/produto', ['as' => 'lista', 'uses' =>  'Api\ProdutoController@cadastrar']);
    Route::put('/produto/{id}', ['as' => 'lista', 'uses' =>  'Api\ProdutoController@update']);
    Route::get('produtos', ['as' => 'lista', 'uses' =>  'Api\ProdutoController@listar']);
    Route::get('produto/{id}', ['as' => 'lista', 'uses' =>  'Api\ProdutoController@consultaProduto']);
    Route::delete('/produto/{id}', ['as' => 'lista', 'uses' =>  'Api\ProdutoController@delete']);

});

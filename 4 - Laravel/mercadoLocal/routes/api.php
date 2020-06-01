<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('produto', function (Request $request) {

        Route::delete('/produto/{id}', function($id){
            $p = Produto::Find($id);

            if($p->delete()){
                return response('ok', 200)->header('Content-Type', 'text/json')
            }
        })

    });
});


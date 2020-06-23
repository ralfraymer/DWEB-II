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

    Route::post('/produto', function (Request $request) {
        $nome = request()->nome;
        $descricao = request()->descricao;
        $valor = request()->valor;
        $categoria = request()->categoria;
        $quantidade = request()->quantidade;
        if ($nome) {
            $produto = new Produto;
            $produto->nome = $nome;
            $produto->descricao = $descricao;
            $produto->valor = $valor;
            $produto->categoria = $categoria;
            $produto->quantidade = $quantidade;
            $produto->save();

            return response('ok', 200)->header('Content-Type', 'text/json');
        }else{
            return response('Erro, usuario não foi cadastrado'.$nome.' - '.$descricao.' - '.$valor.' - '.$categoria.' - '.$quantidade, 502)->header('Content-Type', 'text/json');
        }
    });

    Route::put('/produto/{id}', function (Request $request, $id) {
        $nome = request()->nome;
        $descricao = request()->descricao;
        $valor = request()->valor;
        $categoria = request()->categoria;
        $quantidade = request()->quantidade;
        if ($nome){
            $produto = Produto::find($id);
            $produto->nome = $nome;
            $produto->descricao = $descricao;
            $produto->valor = $valor;
            $produto->categoria = $categoria;
            $produto->quantidade = $quantidade;
            $produto->save();
            return response('ok', 200)->header('Content-Type', 'text/json');
        }else{
            return response('Erro, usuario não foi cadastrado'.$nome.' - '.$descricao.' - '.$valor.' - '.$categoria.' - '.$quantidade, 502)->header('Content-Type', 'text/json');
        }
    });

    Route::get('produtos', function() {
        $produto = Produto::orderBy('id', 'desc')->get();
        return $produto;
    });

    Route::get('produto/{id}', function ($id) {
        $produto = Produto::where('id', '=', $id)->get();
        return $produto;
    });

    Route::delete('/produto/{id}', function ($id) {
        $p = Produto::Find($id);
        if ($p->delete()) {
            return response('ok', 200)->header('Content-Type', 'text/json');
        }else{
            return response('Erro, usuario não encontrado', 502)->header('Content-Type', 'text/json');
        }
    });
});

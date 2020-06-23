<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{
    //CREATE
    public function cadastrar(){
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

            return response()->json(["message"=>"ok"], 200);
        }else{
            return response('Erro, usuario não foi cadastrado'.$nome.' - '.$descricao.' - '.$valor.' - '.$categoria.' - '.$quantidade, 502)->header('Content-Type', 'text/json');
        }
    }

    public function update($id){
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
            return response()->json(["message"=>"ok"], 200);
        }else{
            return response('Erro, usuario não foi cadastrado'.$nome.' - '.$descricao.' - '.$valor.' - '.$categoria.' - '.$quantidade, 502)->header('Content-Type', 'text/json');
        }
    }
    
    public function listar(){
        $produto = Produto::orderBy('id', 'desc')->get();
        return $produto;
    }
    
    public function consultaProduto($id){
        $produto = Produto::where('id', '=', $id)->get();
        return $produto;
    }
    
    public function delete($id){
        $p = Produto::Find($id);
        if ($p->delete()) {
            return response('ok', 200)->header('Content-Type', 'text/json');
        }else{
            return response('Erro, usuario não encontrado', 502)->header('Content-Type', 'text/json');
        }
    }

}

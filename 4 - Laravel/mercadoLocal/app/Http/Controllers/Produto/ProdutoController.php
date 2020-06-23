<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{

    //CREATE
    public function cadastrar(){
        return view('Produto.cadastrar');
    }

    public function create(Request $req)
    {
        $nome = $req->input('nome');
        $descricao = $req->input('descricao');
        $valor = $req->input('valor');
        $categoria = $req->input('categoria');
        $quantidade = $req->input('quantidade');

        if ($nome) {
            $produto = new Produto;
            $produto->nome = $nome;
            $produto->descricao = $descricao;
            $produto->valor = $valor;
            $produto->categoria = $categoria;
            $produto->quantidade = $quantidade;
            $produto->save();
        }
        return redirect('/produto');
    }

    //READ
    public function lista()
    {
        $produto = Produto::all();
        $array = array('produto' => $produto);

        return view('Produto.lista', $array);
    }

    //UPDATE
    public function editar($id)
    {
        $produto = Produto::find($id);
        if ($produto === null) {
            return redirect('/produto');
        } else {
            $array = array(
                'produto' => $produto
            );
            return view('Produto.alterar', $array);
        }
    }
    public function update (Request $req, $id)
    {
        $nome = $req->input('nome');
        $descricao = $req->input('descricao');
        $valor = $req->input('valor');
        $categoria = $req->input('categoria');
        $quantidade = $req->input('quantidade');
        if ($nome){
            $produto = Produto::find($id);
            $produto->nome = $nome;
            $produto->descricao = $descricao;
            $produto->valor = $valor;
            $produto->categoria = $categoria;
            $produto->quantidade = $quantidade;
            $produto->save();
        }

        return redirect('/produto');
    }

    //DELETE
    public function deletar($id)
    {
        Produto::find($id)->delete();
        return redirect('/produto');
    }


    public function jquery(){
        return view('Produto.produtoJquery');
    }
}

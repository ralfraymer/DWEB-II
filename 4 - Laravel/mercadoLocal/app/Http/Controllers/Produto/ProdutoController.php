<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{

    //CREATE
    public function add(Request $req)
    {
        $campoInput = $req->input('campoInput');
        if ($campoInput) {
            $produto = new Produto;
            $produto->campo = $campoInput;


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
            return view('Produto.homeAlterar', $array);
        }
    }
    public function update (Request $req, $id)
    {
        $item = $req->input('item');
        if ($item){
            $produto = Produto::find($id);
            $produto->descricao = $item;



            $produto->save();
        }

        return redirect('/produto');
    }

    //DELETE
    public function deletar($id)
    {
        Produto::find($id)->delete();
        return redirect('/Produto');
    }
}

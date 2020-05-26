@extends('Template.master')
@section('title')
Cadastrar Produto
@endsection

@section('content')
        <div class="title m-b-md">
            <h2>Adicionar produto</h2>
        </div>
        <hr>
        <form action="" method="POST">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
                </div>
                <div class="form-group col-6">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="categoria">
                </div>
                <div class="form-group col-12">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3" required></textarea>
                </div>
                <div class="form-group col-6">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="quantidade" required>
                </div>
                <div class="form-group col-6">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" name="valor" id="valor" placeholder="valor" required>
                </div>
            </div>
            <input class="btn btn-success" type="submit" value="Cadastrar" />
        </form>
@endsection

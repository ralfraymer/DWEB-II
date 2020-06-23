@extends('Template.master')
@section('title')
Lista de produtos
@endsection

@section('content')
<div class="title m-b-md text-center">
    <h2>Lista de produtos</h2>
</div>
<hr>
<!-- Button trigger modal -->
<button id="btnModal" type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#modalAdicionar">
    Adicionar
</button>
<button id="atualizaTabela" type="button" class="btn btn-info my-2">
    Atualizar
</button>

<!-- Modal -->
<div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="modalAdicionar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titleModal" class="modal-title">Adicionar Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button id="btnSalvarProduto" type="button" class="btn btn-primary">Salvar</button>
                <button id="btnAlterarProduto" data-id="0" type="button" class="btn btn-primary" style='display:none' >Alterar</button>
            </div>
        </div>
    </div>
</div>

<table id="tableProdutos" class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Descrição</th>
            <th scope="col">Categoria</th>
            <th class="text-center" scope="col">Qtd</th>
            <th class="text-center" scope="col">Preço</th>
            <th scope="col" class="text-center">Ação</th>
        </tr>
    </thead>
    <tbody id="tableProdutosBody">
    </tbody>
</table>
<script src="/assets/js/jquery.js"></script>
@endsection

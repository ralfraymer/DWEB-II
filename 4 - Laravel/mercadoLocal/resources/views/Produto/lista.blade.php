@extends('Template.master')
@section('title')
Lista de produtos
@endsection

@section('content')
    <div class="title m-b-md text-center">
        <h2>Lista de produtos</h2>
    </div>
    <hr>
    <a class="btn btn-success m-2" href="produto/cadastrar" role="button">Adicionar</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Descrição</th>
            <th scope="col">Categoria</th>
            <th class="text-center" scope="col">Qtd</th>
            <th class="text-center" scope="col">Preço</th>
            <th class="text-center" scope="col" class="text-center">Ação</th>
          </tr>
        </thead>
        <tbody>
            @if(count($produto)>0)
            @foreach($produto as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->descricao}}</td>
                    <td>{{$item->categoria}}</td>
                    <td class="text-center">{{$item->quantidade}}</td>
                    <td class="text-center">{{$item->valor}}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-primary" href="produto/alterar/{{$item->id}}">Alterar</a>
                        <a class="btn btn-sm btn-danger" href="produto/deletar/{{$item->id}}">Excluir</a>
                    </td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">Não há itens</td>
            </tr>
            @endif
        </tbody>
      </table>
@endsection

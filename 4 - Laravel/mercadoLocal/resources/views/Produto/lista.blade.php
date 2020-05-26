@extends('Template.master')
@section('content')
<div class="bg-light p-4">
    <div class="title m-b-md">
        Produtos
    </div>

    @if(count($produto)>0)
    <ul>
        @foreach($produto as $item)
        <li>{{$item->id}}</li>
        @endforeach
    </ul>
    @else
    <h4>Não há itens</h4>
    @endif
    <hr>
</div>
@endsection

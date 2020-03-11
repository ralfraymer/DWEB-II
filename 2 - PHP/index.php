<?php
    include("autoload.php");
    //cria um objeto, com as classes criadas dentro de Contato();
    $contato = new Contato();


    //CREATE
    $contato->adicionar('ralfrraymer@gmail.com','Ralf01');

    // $contato->adicionar('Ralf@ralf','teste');

    //READ
        // //EMAIL ESPECIFICO
        // $nome = $contato->getNome('ralfraymer@gmail.com');
        // echo "<br>Nome:".$nome;
        // //TODOS EMAILS
        // echo "_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-";
        // $lista = $contato->getAll();
        // print_r ($lista);

    // //UPDATE
    // $contato->editar('Ralf 02','ralfraymer@gmail.com');
    // $nome = $contato->getNome('ralfraymer@gmail.com');
    // echo "<br>Nome:".$nome;

    // //DELETE
    $situacao = $contato->excluir('ralfrraymer@gmail.com');
    if($situacao){
        echo 'Foi Removido';
    }else{    
        echo 'Não foi removido';
    }

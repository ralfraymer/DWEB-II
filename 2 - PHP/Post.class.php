<?php

abstract class Post{
    private $titulo;
    private $data;
    private $corpo;
    private $autor;
    private $comentario;
    private $qtComentarios;

    abstract protected function publicar(){
        
    }


    public function __construct($t){
        if(is_string($t)){
            $this->setTitulo($t); 
        }
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($t){
        $this->titulo = $t;
    }

    public function addComentario($msg){
        $this->comentarios[] = $msg;
        $this->contarComentarios();
    }
    public function getQuantosComentarios(){
        return $this->qtComentarios;
    }
    private function contarComentarios(){
        $this->qtComentarios = count($this->comentarios);
    }
}

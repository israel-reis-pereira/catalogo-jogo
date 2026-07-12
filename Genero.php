<?php

class Genero {

    private $id;
    private $nome;

    public function __construct($id){
        $id = (int)$id;
        $bd = new BD();
        $bd->conectar();

       $res = $bd->consulta( "SELECT * FROM tblgenero WHERE id = :id", [ 'id' => $id ] );
        if (empty($res)) { throw new Exception("Genero não encontrado."); }

        $this->setId($res[0]["id"]);
        $this->setNome($res[0]["nome"]);

    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

}
?>
<?php

class Genero {

    private $id;
    private $nome;

    public function __construct($id){

        $bd = new BD();
        $bd->conectar();

        $res = $bd->consulta("select * from tblgenero where id=$id");

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
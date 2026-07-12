<?php

class Plataforma{
    private $id;
    private $nome;
    private $apelido;

    // Construtor melhorado para receber os valores na criação do objeto
    public function __construct($id = null, $nome = null, $apelido = null){
        if ($id !== null) {
            $this->setId($id);
        }
        if ($nome !== null) {
            $this->setNome($nome);
        }
        if ($apelido !== null) {
            $this->setApelido($apelido);
        }
    }

    // Setters e Getters
    public function setId($id){
        // Validação simples para garantir que id seja um número válido
        if (is_numeric($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException("ID deve ser um número.");
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        // Validação simples para garantir que o nome não seja vazio
        if (!empty($nome)) {
            $this->nome = $nome;
        } else {
            throw new InvalidArgumentException("Nome não pode ser vazio.");
        }
    }

    public function getNome(){
        return $this->nome;
    }

    public function setApelido($apelido){
        // Validação simples para garantir que o apelido não seja vazio
        if (!empty($apelido)) {
            $this->apelido = $apelido;
        } else {
            throw new InvalidArgumentException("Apelido não pode ser vazio.");
        }
    }

    public function getApelido(){
        return $this->apelido;
    }
}

?>

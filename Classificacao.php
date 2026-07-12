<?php

// Define a classe Classificacao que representa uma classificação no banco de dados
class Classificacao {
    // Atributos privados da classe, que armazenam as informações sobre a classificação
    private $id;            // ID da classificação
    private $classificacao; // Nome ou tipo da classificação
    private $descricao;     // Descrição da classificação
    private $cor;           // Cor associada à classificação
    private $icone;         // Ícone associado à classificação

    // Construtor da classe que recebe um ID e carrega os dados da classificação correspondente do banco de dados
    public function __construct($id) {
        // Criação de um objeto da classe BD para conectar ao banco de dados
        $bd = new BD();
        $bd->conectar();  // Estabelece a conexão com o banco de dados
        
        // Consulta ao banco de dados para buscar os dados da classificação com o ID fornecido
        $res = $bd->consulta("select * from tblclassificacao where id=$id");
        
        // Preenche os atributos da classe com os dados obtidos da consulta
        $this->setId($res[0]["id"]);
        $this->setClassificacao($res[0]["classificacao"]);
        $this->setDescricao($res[0]["descricao"]);
        $this->setCor($res[0]["cor"]);
        $this->setIcone($res[0]["icone"]);
        // O campo 'icone' não é preenchido na consulta, então ele permanece em seu valor padrão (null)
    }

    // Métodos setters e getters para acessar e modificar os valores dos atributos privados da classe

    // Método setter para o ID
    public function setId($id) {
        $this->id = $id;
    }

    // Método getter para o ID
    public function getId() {
        return $this->id;
    }

    // Método setter para a classificação
    public function setClassificacao($classificacao) {
        $this->classificacao = $classificacao;
    }

    // Método getter para a classificação
    public function getClassificacao() {
        return $this->classificacao;
    }

    // Método setter para a descrição
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // Método getter para a descrição
    public function getDescricao() {
        return $this->descricao;
    }

    // Método setter para a cor
    public function setCor($cor) {
        $this->cor = $cor;
    }

    // Método getter para a cor
    public function getCor() {
        return $this->cor;
    }

    // Método setter para o ícone
    public function setIcone($icone) {
        $this->icone = $icone;
    }

    // Método getter para o ícone
    public function getIcone() {
        return $this->icone;
    }
}

?>

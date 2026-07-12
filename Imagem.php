<?php

// Classe Imagem para manipulação de dados relacionados a uma imagem
class Imagem {
    // Atributos privados da classe
    private $id;            // ID da imagem
    private $nome;          // Nome da imagem
    private $tipo;          // Tipo da imagem (ex: .jpg, .png)
    private $localizacao;   // Localização do arquivo de imagem (caminho)
    private $idCategoria;   // ID da categoria à qual a imagem pertence
    private $idJogo;        // ID do jogo ao qual a imagem pertence

    // Construtor da classe que pode receber dois parâmetros (idJogo e idCategoria)
    public function __construct() {
        // Obtém o número de argumentos passados para o construtor
        $count = func_num_args();
        
        // Se dois parâmetros forem passados (idJogo e idCategoria)
        if ($count == 2) {
            // Cria um objeto da classe BD e realiza a conexão com o banco de dados
            $bd = new BD();
            $bd->conectar();      
            
            // Obtém os parâmetros passados para o construtor
            $parametros = func_get_args();
            
            // Executa uma consulta SQL para buscar a imagem no banco de dados
            $res = $bd->consulta(
                "select * from tblimagem where idJogo=" . $parametros[0] 
                . " and idCategoria=" . $parametros[1]
            );
            
            // Se a consulta retornar algum resultado, preenche os atributos com os dados obtidos
            $this->setId($res[0]["id"]);
            $this->setNome($res[0]["nome"]);
            $this->setTipo($res[0]["tipo"]);
            $this->setLocalizacao($res[0]["localizacao"]);
            $this->setIdCategoria($res[0]["idCategoria"]);
            $this->setIdJogo($res[0]["idJogo"]);
        }
    }

    // Métodos setters e getters para acessar e modificar os valores dos atributos privados da classe

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    public function getTipo() {
        return $this->tipo;
    }

    public function setLocalizacao($localizacao) {
        $this->localizacao = $localizacao;
    }
    public function getLocalizacao() {
        return $this->localizacao;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdJogo($idJogo) {
        $this->idJogo = $idJogo;
    }
    public function getIdJogo() {
        return $this->idJogo;
    }

    // Método para obter o caminho completo da imagem
    public function getSrcImagem() {
        return $this->localizacao . $this->nome . $this->tipo;
    }
}

?>

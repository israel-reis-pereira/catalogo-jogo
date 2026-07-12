<?php
// Incluindo as classes necessárias
include_once 'Classificacao.php';
include_once 'bancoDeDados.php';
include_once 'Imagem.php';
include_once 'Plataforma.php';
include_once 'Genero.php';

class Jogo {
    // Atributos privados da classe
    private $id;
    private $nome;
    private $sinopse;
    private $apelido;
    private $lancamento;
    private $distribuidora;
    private $desenvolvedora;
    private $classificacao;
    private $genero;
    private $plataforma;
    private $imagemCapa;
    private $galeria;

    // Construtor da classe que inicializa os atributos com os dados do banco de dados
    public function __construct($id){
        $bd = new BD();
        $bd->conectar();
        
        // Consulta SQL para buscar dados do jogo no banco de dados
        $res = $bd->consulta("select * from tbljogo where id=$id");
        
        // Preenche os atributos com os dados retornados
        $this->setId($res[0]["id"]);
        $this->setNome($res[0]["nome"]);
        $this->setSinopse($res[0]["sinopse"]);
        $this->setApelido($res[0]["apelido"]);
        $this->setLancamento($res[0]["lancamento"]);
        $this->setDistribuidora($res[0]["distribuidora"]);
        $this->setDesenvolvedora($res[0]["desenvolvedora"]);
        $this->setGenero( new Genero($res[0]["idGenero"]) );
        
        // Chama o método buscarPlataformas para obter as plataformas do jogo
        $this->setPlataforma($this->buscarPlataformas($id));
        
        // Cria um objeto da classe Classificacao e armazena a classificação do jogo
        $this->setClassificacao(new Classificacao($res[0]["idClassificacao"]));
        
        // Cria um objeto da classe Imagem para a imagem de capa
        $this->setImagemCapa(new Imagem($res[0]["id"], 1));
        
        // Monta a galeria de imagens relacionadas ao jogo
        $this->setGaleria($this->montarGaleria());
    }

    // Métodos setters e getters para acessar os atributos da classe
    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }
    
    public function setNome($nome) { $this->nome = $nome; }
    public function getNome() { return $this->nome; }
    
    public function setSinopse($sinopse) { $this->sinopse = $sinopse; }
    public function getSinopse() { return $this->sinopse; }
    
    public function setApelido($apelido) { $this->apelido = $apelido; }
    public function getApelido() { return $this->apelido; }
    
    public function setLancamento($lancamento) { $this->lancamento = $lancamento; }
    public function getLancamento() { return $this->lancamento; }
    
    public function setDistribuidora($distribuidora) { $this->distribuidora = $distribuidora; }
    public function getDistribuidora() { return $this->distribuidora; }
    
    public function setDesenvolvedora($desenvolvedora) { $this->desenvolvedora = $desenvolvedora; }
    public function getDesenvolvedora() { return strtoupper($this->desenvolvedora); }
    
    public function setClassificacao($classificacao) { $this->classificacao = $classificacao; }
    public function getClassificacao() { return $this->classificacao; }
    
    public function setGenero($genero) { $this->genero = $genero; }
    public function getGenero() { return $this->genero; }
    
    public function setPlataforma($plataforma) { $this->plataforma = $plataforma; }
    
    public function getPlataforma() {
        $texto = "";
        
        // Verifica se foi chamada a versão sem argumentos (para retornar o nome das plataformas)
        if(func_num_args() == 0){
            foreach($this->plataforma as $plat){
                $texto .= $plat->getNome() . ", ";
            }
            $texto = trim($texto);
            $texto[strlen($texto) - 1] = "."; // Remove a vírgula final
        }
        else{
            // Caso seja chamada a versão com argumento, retorna o apelido da plataforma
            foreach($this->plataforma as $plat){
                $texto .= $plat->getApelido() . ", ";
            }
            $texto = trim($texto);
            $texto[strlen($texto) - 1] = "."; // Remove a vírgula final
        }
        return $texto;
    }
    
    public function setImagemCapa($imagemCapa) { $this->imagemCapa = $imagemCapa; }
    public function getImagemCapa() { return $this->imagemCapa; }
    
    public function setGaleria($galeria) { $this->galeria = $galeria; }
    public function getGaleria() { return $this->galeria; }

    // Método privado para montar a galeria de imagens
    private function montarGaleria() {
        $bd = new BD();
        $bd->conectar();
        
        // Consulta para buscar imagens da galeria (idCategoria = 2)
        $res = $bd->consulta("select * from tblimagem where idJogo=$this->id and idCategoria = 2");
        $galeria = array();
        
        // Preenche a galeria com objetos da classe Imagem
        foreach($res as $imagem) {
            $img = new Imagem();
            $img->setId($imagem["id"]);
            $img->setNome($imagem["nome"]);
            $img->setTipo($imagem["tipo"]);
            $img->setLocalizacao($imagem["localizacao"]);
            $img->setIdCategoria($imagem["idCategoria"]);
            $img->setIdJogo($imagem["idJogo"]);
            $galeria[] = $img;
            $img = null;
        }
        return $galeria;
    }

    // Método para buscar plataformas associadas a um jogo
    public function buscarPlataformas($id) {
        $bd = new BD();
        $bd->conectar();
        
        // Consulta SQL para buscar plataformas do jogo
        $res = $bd->consulta("select tblplataforma.* from tblplataforma ".
            "inner join tbljogoplataforma ".
            "ON tblplataforma.id = tbljogoplataforma.idPlataforma ".
            "where tbljogoplataforma.idJogo=$id;");
        
        $plataformas = array();
        
        // Cria objetos da classe Plataforma e adiciona à lista
        foreach($res as $plataforma) {
            $plat = new Plataforma();
            $plat->setId($plataforma["id"]);
            $plat->setNome($plataforma["nome"]);
            $plat->setApelido($plataforma["apelido"]);
            $plataformas[] = $plat;
            $plat = null;
        }
        return $plataformas;
    }

    // Método estático para buscar todos os jogos
    public static function buscarJogos() {
        $bd = new BD();
        $bd->conectar();
        
        // Consulta para buscar todos os jogos
        $res = $bd->consulta("select * from tbljogo;");
        $jogos = array();
        
        // Cria objetos da classe Jogo e os adiciona à lista
        foreach($res as $jogo) {
            $jogo = new Jogo($jogo['id']);
            $jogos[] = $jogo;
            $jogo = null;
        }
        return $jogos;
    }
}
?>

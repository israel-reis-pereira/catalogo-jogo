<?php

class BD {
    private $host;        
    private $usuario;     
    private $senha;       
    private $bd;          
    private $conexao;     

    public function __construct() {
        // Carrega as variáveis do arquivo .env localizado um nível acima da pasta atual
        $this->carregarEnv(__DIR__ . '/config/credenciais.ini');

        // Inicializa as propriedades com os valores do ambiente ou mantém o padrão local
        $this->host = $_ENV['DB_HOST'] ?? "localhost";
        $this->usuario = $_ENV['DB_USER'] ?? "root";
        $this->senha = $_ENV['DB_PASS'] ?? "";
        $this->bd = $_ENV['DB_NAME'] ?? "bdprojeto3mt";
    }

    // Função interna para ler o arquivo .env linha por linha de forma segura
    private function carregarEnv($caminho) {
        if (!file_exists($caminho)) {
            return false;
        }

        $linhas = file($caminho, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($linhas as $linha) {
            // Ignora linhas que são comentários
            if (strpos(trim($linha), '#') === 0) {
                continue;
            }

            // Divide a string na primeira ocorrência do sinal de igual
            if (strpos($linha, '=') !== false) {
                list($chave, $valor) = explode('=', $linha, 2);
                $_ENV[trim($chave)] = trim($valor);
            }
        }
    }

    public function conectar() {
        try {
            // Conexão adaptada para utilizar as variáveis dinâmicas do ambiente
            $this->conexao = new PDO(
                "mysql:dbname=$this->bd;host=$this->host;charset=utf8", 
                $this->usuario,  
                $this->senha     
            );
            // Configura o PDO para disparar exceções reais em caso de erros de SQL
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERRO DE CONEXÃO";
        }
    }

    public function consulta($sql, $parametros = []) {
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute($parametros);
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>

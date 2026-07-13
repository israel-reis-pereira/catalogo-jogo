<?php 
    include_once 'Jogo.php'; // Inclui o arquivo que contém a definição da classe Jogo

    // Chama o método estático 'buscarJogos()' da classe Jogo, que retorna todos os jogos do banco de dados
    $jogos = Jogo::buscarJogos(); 
?>

<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo-etec-barretos.png" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Jogo</title>
</head>
<body>
<div class="w3-row"> <!-- Inicia uma linha para organizar os elementos na tela -->
  <?php foreach($jogos as $jogo): ?>
    <!-- Primeiro bloco de exibição de jogo -->
    <div class="w3-quarter w3-padding"> <!-- Cada div com 'w3-quarter' ocupa um quarto da tela, com padding para espaçamento -->
        <div class="w3-display-container"> <!-- Usado para posicionamento de elementos dentro da imagem -->
            <!-- Exibe a imagem do jogo, com a URL sendo dinamicamente gerada pelo PHP -->
            <img src="<?php echo htmlspecialchars($jogo->getImagemCapa()->getSrcImagem(), ENT_QUOTES, 'UTF-8'); ?>"
            alt="<?php echo htmlspecialchars($jogo->getNome(), ENT_QUOTES, 'UTF-8'); ?>" style="width:100%">
            
            <!-- Exibe a plataforma do jogo, sendo dinamicamente inserido -->
            <span class="w3-tag w3-display-topleft w3-green"><?php echo htmlspecialchars($jogo->getPlataforma(TRUE), ENT_QUOTES, 'UTF-8'); ?></span>

            <!-- Botão centralizado sobre a imagem para ação do usuário -->
            <div class="w3-display-middle w3-display-hover">
                <a href="pagJogoBasica.php?id=<?php echo urlencode($jogo->getId()); ?>" class="w3-button w3-black"> Ver </a><!-- Botão "Ver" para interação -->
            </div>
        </div>
        <!-- Exibe o nome do jogo abaixo da imagem, com estilo centralizado e com fundo azul -->
        <p class="w3-center w3-padding w3-blue"><?php echo htmlspecialchars($jogo->getNome(), ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
  <?php endforeach; ?>
</div>
</body>
</html>
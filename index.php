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
  
  <!-- Primeiro bloco de exibição de jogo -->
  <div class="w3-quarter w3-padding"> <!-- Cada div com 'w3-quarter' ocupa um quarto da tela, com padding para espaçamento -->
      <div class="w3-display-container"> <!-- Usado para posicionamento de elementos dentro da imagem -->
          <!-- Exibe a imagem do jogo, com a URL sendo dinamicamente gerada pelo PHP -->
          <img src="<?php echo $jogos[0]->getImagemCapa()->getSrcImagem();?>" style="width:100%">
          
          <!-- Exibe a plataforma do jogo, sendo dinamicamente inserido -->
          <span class="w3-tag w3-display-topleft w3-green"><?php echo $jogos[0]->getPlataforma(TRUE);?></span>

          <!-- Botão centralizado sobre a imagem para ação do usuário -->
          <div class="w3-display-middle w3-display-hover">
              <a href="pagJogoBasica.php?id=<?php echo $jogos[0]->getId();?>" class="w3-button w3-black"> Ver </a><!-- Botão "Ver" para interação -->
          </div>
      </div>
      <!-- Exibe o nome do jogo abaixo da imagem, com estilo centralizado e com fundo azul -->
      <p class="w3-center w3-padding w3-blue"><?php echo $jogos[0]->getNome();?></p>
  </div>

  <!-- Segundo bloco de exibição de jogo, semelhante ao primeiro -->
  <div class="w3-quarter w3-padding">
      <div class="w3-display-container">
          <!-- A imagem 'ff7.jpg' é um exemplo fixo, no seu caso, deveria vir dinamicamente também -->
          <img src="<?php echo $jogos[1]->getImagemCapa()->getSrcImagem();?>" style="width:100%">
          
          <!-- Exibe as plataformas disponíveis para este jogo -->
          <span class="w3-tag w3-display-topleft w3-green"><?php echo $jogos[1]->getPlataforma(TRUE);?></span>
          
          <div class="w3-display-middle w3-display-hover">
              <!-- Botão para interagir com o jogo -->
               <a href="pagJogoBasica.php?id=<?php echo $jogos[1]->getId();?>" class="w3-button w3-black"> Ver </a>
          </div>
      </div>
      <!-- Nome fixo do jogo, neste caso, FINAL FANTASY VII - REMAKE -->
      <p class="w3-center w3-padding w3-blue"><?php echo $jogos[1]->getNome();?></p>
  </div>
</div>

<div class="w3-quarter w3-padding"> <!-- Cada div com 'w3-quarter' ocupa um quarto da tela e o 'w3-padding' adiciona espaçamento interno -->
    <div class="w3-display-container"> <!-- Contêiner usado para posicionamento da imagem e de outros elementos sobre ela -->
        <!-- Exibe a imagem do jogo. A largura é ajustada para 100% da área disponível -->
        <img src="img/ff7.jpg" style="width:100%">

        <!-- Exibe a plataforma onde o jogo está disponível. A classe 'w3-tag' adiciona um fundo e posiciona o texto na parte superior esquerda da imagem -->
        <span class="w3-tag w3-display-topleft w3-green">PS4, PS5</span>

        <!-- Div centralizada sobre a imagem, que aparece quando o usuário passa o mouse (hover) -->
        <div class="w3-display-middle w3-display-hover">
            <!-- Botão "Ver", que pode ser usado para redirecionar para uma página com mais informações -->
            <button class="w3-btn w3-black">Ver</button>
        </div>
    </div>

    <!-- Exibe o nome do jogo abaixo da imagem. 'w3-center' centraliza o texto, 'w3-padding' adiciona espaço em volta do texto e 'w3-blue' dá um fundo azul ao texto -->
    <p class="w3-center w3-padding w3-blue">FINAL FANTASY VII - REMAKE</p>
</div>

<!-- Segundo bloco de jogo. A estrutura é idêntica ao primeiro, mostrando a mesma imagem e informações -->
<div class="w3-quarter w3-padding">
    <div class="w3-display-container">
        <img src="img/ff7.jpg" style="width:100%">
        <span class="w3-tag w3-display-topleft w3-green">PS4, PS5</span>
        <div class="w3-display-middle w3-display-hover">
            <button class="w3-btn w3-black">Ver</button>
        </div>
    </div>
    <p class="w3-center w3-padding w3-blue">FINAL FANTASY VII - REMAKE</p>
</div>

</body>
</html>
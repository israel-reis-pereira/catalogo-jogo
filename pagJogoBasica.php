<?php include_once 'Jogo.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1; 
$jogo = new Jogo($id); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<title>Jogos<?php echo $jogo->getApelido(); ?></title> <!-- Título da página com o apelido do jogo -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/logo-etec-barretos.png" type="image/x-icon">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> <!-- Importa o CSS do W3Schools para o estilo da página -->

<body class="w3-content" style="max-width:1300px">
<!-- Primeira seção: Logo & Sobre o Jogo -->
<div class="w3-row">
  <div class="w3-half w3-light-grey w3-container w3-center" style="height:700px">
    <div class="w3-padding">
      <h1><?php echo $jogo->getNome(); ?></h1> <!-- Exibe o nome do jogo -->
    </div>
    <div class="w3-padding w3-card">
        <img src="<?php echo $jogo->getImagemCapa()->getSrcImagem();?>" alt="" style="width:80%;"> <!-- Exibe a imagem de capa do jogo -->
    </div>
  </div>
  
  <!-- Seção de sinopse -->
  <div class="w3-half w3-blue-grey w3-container" style="height:700px">
    <div class="w3-padding-64 w3-center">
      <h1>SINOPSE</h1> <!-- Título da seção -->
      <div class="w3-rest w3-left-align w3-padding-large">
            <p> <?php echo $jogo->getSinopse(); ?> </p> <!-- Exibe a sinopse do jogo -->
      </div>
    </div>
  </div>
</div>

<!-- Segunda seção: Fotos & Ficha Técnica -->
<div class="w3-row">
  <!-- Seção de Fotos do Jogo -->
  <div class="w3-half w3-blue-grey w3-center" style="min-height:800px">
    <div class="w3-padding-64">
      <h2>FOTOS</h2> <!-- Título da seção -->
    </div>
    <?php
        $cont = 0; // Variável para controlar a exibição de imagens em duas colunas
        foreach($jogo->getGaleria() as $imagem) { // Loop para exibir todas as imagens da galeria
          if($cont == 0) // Começa uma nova linha
            echo '<div class="w3-row">';
          
          echo '<div class="w3-half">'; // Cada imagem ocupa metade da linha
          echo '<img src="'.$imagem->getSrcImagem().'" style="width:100%">'; // Exibe a imagem
          echo '</div>';
          
          $cont++; // Incrementa o contador
          if($cont == 2) { // Quando a linha estiver cheia, fecha a linha e reinicia o contador
            $cont = 0;
            echo '</div>';
          }
        }
    ?>
  </div>

  <!-- Seção de Ficha Técnica -->
  <div class="w3-half w3-light-grey w3-container" style="min-height:800px">
    <div class="w3-padding-64 w3-center">
      <h2>Ficha Técnica</h2> <!-- Título da seção -->
       <div class="w3-container w3-responsive">
        <table class="w3-table-all w3-card w3-text-black"> <!-- Tabela com as informações do jogo -->
         <tr>
            <td>Lançamento</td>
            <td><?php echo $jogo->getLancamento(); ?></td> <!-- Data de lançamento -->
         </tr>
         <tr>
            <td>Distribuidora</td>
            <td><?php echo $jogo->getDistribuidora(); ?></td> <!-- Nome da distribuidora -->
         </tr>
         <tr>
            <td>Desenvolvedora</td>
            <td><?php echo $jogo->getDesenvolvedora(); ?></td> <!-- Nome da desenvolvedora -->
         </tr>
         <tr>
            <td>Classificação</td>
            <td><?php echo $jogo->getClassificacao()->getClassificacao().' - '.
            $jogo->getClassificacao()->getDescricao(); ?></td> <!-- Classificação etária do jogo -->
         </tr>
         <tr>
            <td>Genero</td>
            <td><?php echo $jogo->getGenero()->getNome(); ?></td> <!-- Gênero do jogo -->
         </tr>
         <tr>
            <td>Plataformas</td>
            <td><?php echo $jogo->getPlataforma(); ?></td> <!-- Plataformas em que o jogo está disponível -->
         </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Rodapé -->
<footer class="w3-container w3-blue-grey w3-padding-16 w3-center">
  <p>Powered by <a href="https://etecbarretos.cps.sp.gov.br/desenvolvimento-de-sistemas/" target="_blank">ETEC</a></p> <!-- Texto do rodapé -->
</footer>
</body>
</html>

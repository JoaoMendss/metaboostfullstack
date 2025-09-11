<?php
include "conexaoBD.php";
include "header.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
  <title>MetaBoost</title>
  <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
  <div class="home-container">
    <section>
      <div class="content">
        <h2>METABOOST</h2><h3> OS MELHORES SUPLEMENTOS PARA GAMERS</h3>
        <p>Aumente seu foco, energia e resistência com os melhores suplementos do mercado.
          Seja para treinar ou maratonar aquele game, o MetaBoost te dá a força que você precisa para alcançar o próximo nível. </p>
        <a href="#menu" class="btn-conheca">Conheça os Anuncios</a>
      </div>
    </section>
  </div>

  <section class="about" id="about">
    <h2 class="title">Sobre <span>Nós</span></h2>
    <div class="row">
      <div>
        <img src="./img/foto1.png" alt="Sobre Nós">
      </div>
      <div class="content">
        <h3>Quem Somos Nós</h3>
        <p>O MetaBoost é um marketplace de suplementos pensado para quem passa longas horas em frente ao computador,
          seja jogando ou trabalhando, cuidando do seu corpo mesmo nos momentos de maior concentração.</p>
        <p>Este projeto surgiu a partir das aulas de Programação Web e Banco de Dados dos professores Paulo Ricardo e Jailton Junior, e foi desenvolvido pelos alunos Eldrey Santos, João Mendes e Livia Brum da turma de Técnico em Informática para Internet III,
          no IFPR – Campus Telêmaco Borba, unindo aprendizado e prática para criar uma solução inovadora.</p>
        <a href="https://github.com/JoaoMendss/metaboostfullstack" target="_blank" class="btn">Saiba Mais</a>
      </div>
    </div>
  </section>

  <section class="menu" id="menu">
    <h2 class="title">Últimos <span>Anuncios</span></h2>

    <div class="box-container">

<?php
  // Seleciona apenas os 6 últimos anúncios
  $listarAnuncios = "SELECT * FROM Anuncios ORDER BY idAnuncio DESC LIMIT 6";
  $res = mysqli_query($conn, $listarAnuncios);

  if(mysqli_num_rows($res) > 0){
    while($registro = mysqli_fetch_assoc($res)){
      $idAnuncio        = $registro['idAnuncio'];
      $fotoAnuncio      = $registro['fotoAnuncio'];
      $nomeAnuncio      = $registro['nomeAnuncio'];
      $descricaoAnuncio = $registro['descricaoAnuncio'];
      $valorAnuncio     = $registro['valorAnuncio'];
      $statusAnuncio    = $registro['statusAnuncio'];

      echo "
        <div class='box'>
          <a href='visualizarAnuncio.php?idAnuncio=$idAnuncio'>
            <img src='$fotoAnuncio' alt='$nomeAnuncio' width='180'>
          </a>
          <h3>$nomeAnuncio</h3>
          <div class='price'>R$ $valorAnuncio</div>";

          if($statusAnuncio != 'esgotado'){
            echo "<a href='visualizarAnuncio.php?idAnuncio=$idAnuncio' class='btn'>Visualizar Anuncio</a>";
          } else {
            echo "<a href='visualizarAnuncio.php?idAnuncio=$idAnuncio' class='btn' style='background: #888;'>Esgotado</a>";
          }

      echo "</div>";
    }
  } else {
    echo "<p style='color:white;'>Nenhum Anuncio encontrado.</p>";
  }
?>

    </div>
    <div style="text-align:center; margin-top:20px;">
      <a href="gridAnuncios.php" class="btn-responsivo">Ver Todos os Anuncios</a>
    </div>
  </section>

  <section class="review" id="review">
    <!-- Avaliações -->
  </section>

  <section class="address" id="address">
    <!-- Endereço -->
  </section>

 <?php
include "footer.php";
?>
</body>
</html>

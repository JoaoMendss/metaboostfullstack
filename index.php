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
        <h3>METABOOST, OS MELHORES SUPLEMENTOS PARA GAMERS</h3>
        <p>Aqui no MetaBoost nós vendemos os melhores suplementos pessoas que </p>
        <a href="#menu" class="btn">Pegue o seu agora</a>
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
        <h3>O Que Faz Nossos Suplementos</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto a at officiis tempore.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni blanditiis assumenda reiciendis optio!</p>
        <a href="#" class="btn">Saiba Mais</a>
      </div>
    </div>
  </section>

  <section class="menu" id="menu">
    <h2 class="title">Nossos <span>Produtos</span></h2>

    <div class="box-container">
      
      <?php
  $query = "SELECT * FROM Produtos";
  $res = mysqli_query($conn, $query);

  if(mysqli_num_rows($res) > 0){
    while($registro = mysqli_fetch_assoc($res)){
      $idProduto        = $registro['idProduto'];
      $fotoProduto      = $registro['fotoProduto'];
      $nomeProduto      = $registro['nomeProduto'];
      $descricaoProduto = $registro['descricaoProduto'];
      $valorProduto     = $registro['valorProduto'];
      $statusProduto    = $registro['statusProduto'];

      echo "
        <div class='box'>
          <a href='visualizarProduto.php?idProduto=$idProduto'>
            <img src='$fotoProduto' alt='$nomeProduto' width='180'>
          </a>
          <h3>$nomeProduto</h3>
          <div class='price'>R$ $valorProduto</div>";

          if($statusProduto != 'esgotado'){
            echo "<a href='visualizarProduto.php?idProduto=$idProduto' class='btn'>Visualizar Produto</a>";
          } else {
            echo "<div class='btn' style='background:#888; cursor: not-allowed;'>Esgotado</div>";
          }

      echo "</div>";
    }
  } else {
    echo "<p style='color:white;'>Nenhum produto encontrado.</p>";
  }
?>

    </div>
  </section>

  <!-- Avaliações e outras seções continuam iguais... -->
  <section class="review" id="review">
    <!-- Pode copiar daqui do seu HTML -->
  </section>

  <section class="address" id="address">
    <!-- Pode copiar daqui do seu HTML -->
  </section>

  <section class="footer">
    <div class="share">
      <a href="https://www.instagram.com/joaoluiiz._/" target="_blank"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/instagram-new.png" alt="Instagram"/></a>
      <a href="https://wa.me/5542998682358" target="_blank"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/whatsapp.png" alt="WhatsApp"/></a>
      <a href="https://www.linkedin.com/in/joao-mendes-63816b330/" target="_blank"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/linkedin.png" alt="LinkedIn"/></a>
    </div>
  </section>
</body>
</html>

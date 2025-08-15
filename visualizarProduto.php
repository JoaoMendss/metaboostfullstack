<?php
include "conexaoBD.php";
include "header.php";
?>

<section class="menu" style="padding-top: 120px; min-height: 80vh; display: flex; justify-content: center; align-items: center;">
  <div class="box-container" style="justify-content: center; gap: 2rem;">

    <?php
    if (isset($_GET['idProduto'])) {
      $idProduto = intval($_GET['idProduto']);

      $exibirProduto = "SELECT * FROM Produtos WHERE idProduto = $idProduto";
      $res = mysqli_query($conn, $exibirProduto);

      if (mysqli_num_rows($res) > 0) {
        $registro = mysqli_fetch_assoc($res);

        $fotoProduto      = $registro['fotoProduto'];
        $nomeProduto      = $registro['nomeProduto'];
        $descricaoProduto = $registro['descricaoProduto'];
        $valorProduto     = number_format($registro['valorProduto'], 2, ',', '.');
        $statusProduto    = $registro['statusProduto'];
    ?>

        <div class="box" style="max-width: 300px; text-align: center; transition: 0.2s; cursor: pointer;"
          onmouseover="this.querySelector('h3').style.color='#000'; this.querySelector('p').style.color='#000';"
          onmouseout="this.querySelector('h3').style.color='white'; this.querySelector('p').style.color='white';">

          <div style="position: relative;">
            <?php if ($statusProduto === 'esgotado'): ?>
              <div style="position: absolute; top: 10px; left: 10px; 
                        background: rgba(220,53,69,0.85); color: white; padding: 0.5rem 1rem;
                        font-weight: bold; border-radius: 6px; z-index: 10;">
                ESGOTADO
              </div>
            <?php endif; ?>

            <img src="<?= htmlspecialchars($fotoProduto) ?>" alt="<?= htmlspecialchars($nomeProduto) ?>" style="width: 100%; height: auto; border-radius: 8px; <?= $statusProduto === 'esgotado' ? 'filter: grayscale(100%);' : '' ?>">
          </div>

          <h3 style="color:white;"><?= htmlspecialchars($nomeProduto) ?></h3>
          <p style="color:white;"><?= htmlspecialchars($descricaoProduto) ?></p>
          <div class="price">R$ <?= $valorProduto ?></div>

          <?php if ($statusProduto !== 'esgotado'): ?>
            <a href="#" class="btn">Comprar</a>
          <?php else: ?>
            <div class="btn" style="background:#888; cursor:not-allowed;">Esgotado</div>
          <?php endif; ?>

        </div>


    <?php
      } else {
        echo "<p style='color:white;'>Produto não localizado!</p>";
      }

      mysqli_close($conn);
    } else {
      echo "<p style='color:white;'>ID de produto inválido!</p>";
    }
    ?>

  </div>
</section>

<?php include "footer.php"; ?>
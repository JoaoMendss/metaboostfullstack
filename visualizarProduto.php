<?php
include "conexaoBD.php";
include "header.php";
?>

<section class="produto-detalhe" style="padding-top: 120px; min-height: 80vh;">
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
      <div class="produto-container">
        
        <!-- FOTO -->
        <div class="produto-img">
          <?php if ($statusProduto === 'esgotado'): ?>
            <div class="badge-esgotado">ESGOTADO</div>
          <?php endif; ?>
          <img src="<?= htmlspecialchars($fotoProduto) ?>" alt="<?= htmlspecialchars($nomeProduto) ?>">
        </div>

        <!-- INFO -->
        <div class="produto-info">
          <h1><?= htmlspecialchars($nomeProduto) ?></h1>
          <p class="descricao"><?= htmlspecialchars($descricaoProduto) ?></p>
          <div class="preco">R$ <?= $valorProduto ?></div>

          <?php if ($statusProduto !== 'esgotado'): ?>
            <a href="#" class="btn">Comprar agora</a>
          <?php else: ?>
            <div class="btn esgotado-btn">Produto esgotado</div>
          <?php endif; ?>
        </div>
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
</section>

<?php include "footer.php"; ?>

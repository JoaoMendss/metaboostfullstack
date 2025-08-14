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

  <title>Detalhes do Produto</title>
</head>
<body style="padding-top: 100px; background-color: #121212; color: white;">

  <div class="box-container" style="justify-content: center; padding: 2rem 1rem;">
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

            <div class="box" style="max-width: 400px; margin: auto;">
              
              <div style="position: relative;">
                <?php if ($statusProduto === 'esgotado'): ?>
                  <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                              background: rgba(220, 53, 69, 0.85); color: white; padding: 0.5rem 1rem; font-weight: bold;
                              border-radius: 6px; z-index: 10;">
                    ESGOTADO
                  </div>
                <?php endif; ?>

                <img
                  src="<?= htmlspecialchars($fotoProduto) ?>"
                  alt="<?= htmlspecialchars($nomeProduto) ?>"
                  style="width: 100%; border-radius: 8px; <?= $statusProduto === 'esgotado' ? 'filter: grayscale(100%);' : '' ?>"
                >
              </div>

              <h3><?= htmlspecialchars($nomeProduto) ?></h3>
              <p><?= htmlspecialchars($descricaoProduto) ?></p>
              <div class="price">R$ <?= $valorProduto ?></div>

              <?php if ($statusProduto !== 'esgotado'): ?>
                <a href="#" class="btn">Comprar</a>
              <?php else: ?>
                <div class="btn" style="background: #888; cursor: not-allowed;">Esgotado</div>
              <?php endif; ?>

            </div>

            <?php
        } else {
            echo "<div style='color: white;'>Produto não localizado!</div>";
        }

        mysqli_close($conn);
    } else {
        echo "<div style='color: white;'>ID de produto inválido!</div>";
    }
    ?>
  </div>

</body>
</html>
<?php include "footer.php"; ?>

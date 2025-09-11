<?php
include "conexaoBD.php";
include "header.php";
?>

<section class="anuncio-detalhe" style="padding-top: 120px; min-height: 80vh;">
  <?php
  if (isset($_GET['idAnuncio'])) {
      $idAnuncio = intval($_GET['idAnuncio']);

      // Query corrigida para trazer telefone do usuário
      $exibirAnuncio = "
          SELECT a.*, u.nomeUsuario, u.telefoneUsuario
          FROM Anuncios a
          JOIN Usuarios u ON a.Usuarios_idUsuario = u.idUsuario
          WHERE a.idAnuncio = $idAnuncio
      ";

      $res = mysqli_query($conn, $exibirAnuncio) or die("Erro na consulta: " . mysqli_error($conn));

      if (mysqli_num_rows($res) > 0) {
          $registro = mysqli_fetch_assoc($res);

          $fotoAnuncio      = $registro['fotoAnuncio'];
          $nomeAnuncio      = $registro['nomeAnuncio'];
          $descricaoAnuncio = $registro['descricaoAnuncio'];
          $valorAnuncio     = number_format($registro['valorAnuncio'], 2, ',', '.');
          $statusAnuncio    = $registro['statusAnuncio'];
          $nomeUsuario      = $registro['nomeUsuario'];
          $telefoneUsuario  = $registro['telefoneUsuario'];

          // Tratamento do número para WhatsApp
          $numeroWhatsApp = preg_replace('/\D/', '', $telefoneUsuario);
          if (substr($numeroWhatsApp, 0, 2) != '55') {
              $numeroWhatsApp = '55' . $numeroWhatsApp;
          }
  ?>
          <div class="Anuncio-container">
            
            <!-- FOTO -->
            <div class="anuncio-img">
              <?php if ($statusAnuncio === 'esgotado'): ?>
                <div class="badge-esgotado">ESGOTADO</div>
              <?php endif; ?>
              <img src="<?= htmlspecialchars($fotoAnuncio) ?>" alt="<?= htmlspecialchars($nomeAnuncio) ?>">
            </div>

            <!-- INFORMAÇÕES -->
            <div class="anuncio-info">
              <h1 style="font-size: 50px;"><?= htmlspecialchars($nomeAnuncio) ?></h1>
              <h1 style="font-size:16px;">
                <span style="color:#ffffff;">Anunciado por: </span>
                <span style="color:#88d3d9;"><?= htmlspecialchars($nomeUsuario) ?></span>
              </h1>

              <p class="descricao"><?= htmlspecialchars($descricaoAnuncio) ?></p>
              <div class="preco">R$ <?= $valorAnuncio ?></div>

              <?php if ($statusAnuncio !== 'esgotado'): ?>
                <a href="https://wa.me/<?= $numeroWhatsApp ?>" target="_blank" class="btn-responsivo">Falar com Vendedor</a>
              <?php else: ?>
                <div class="btn esgotado-btn">Anúncio esgotado</div>
              <?php endif; ?>
            </div>
          </div>
  <?php
      } else {
          echo "<p style='color:white;'>Anúncio não localizado!</p>";
      }

      mysqli_close($conn);
  } else {
      echo "<p style='color:white;'>ID de Anúncio inválido!</p>";
  }
  ?>
</section>

<?php include "footer.php"; ?>

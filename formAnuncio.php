<?php
include "header.php";
?>
<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    // Se não estiver logado, redireciona para login
    header("Location: formLogin.php");
    exit;
}

// Verifica se o usuário logado é administrador
if ($_SESSION['tipoUsuario'] !== 'administrador') {
    // Se não for administrador, redireciona para a home ou exibe mensagem
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Anuncio</title>
</head>
<body style="background-color: #000000; color: white; padding-top: 0px;">

  <div class="box-container" style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px 20px;">
    <div class="box" style="max-width: 400px; width: 100%; background-color: #222; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.8);">
      <h2 style="text-align: center; margin-bottom: 25px; font-weight: 700;">Cadastro de Anuncio</h2>
      <form action="actionAnuncio.php" method="POST" enctype="multipart/form-data">
        <label for="nomeAnuncio" style="display: block; margin-bottom: 8px; font-weight: 700;">Nome do Anuncio:</label>
        <input type="text" id="nomeAnuncio" name="nomeAnuncio" required placeholder="Nome do Anuncio"
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;"/>

        <label for="descricaoAnuncio" style="display: block; margin-bottom: 8px; font-weight: 700;">Descrição do Anuncio:</label>
        <textarea id="descricaoAnuncio" name="descricaoAnuncio" required placeholder="Descrição do Anuncio" style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px; resize: vertical; min-height: 80px;"></textarea>

        <div class="form-floating mb-3 mt-3">
          <label for="categoriaAnuncio" style="display: block; margin-bottom: 8px; font-weight: 700;">Categoria:</label>
          <select class="form-select" id="categoriaAnuncio" name="categoriaAnuncio" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
              <?php
                        include "conexaoBD.php";
                        $listarCategorias = "SELECT * FROM Categorias";
                        $res = mysqli_query($conn, $listarCategorias) or die ("Erro ao tentar carregar Categorias!");
                        while($registro = mysqli_fetch_assoc($res)){
                            $idCategoria   = $registro['idCategoria'];
                            $nomeCategoria = $registro['nomeCategoria'];
                            echo "<option value='$idCategoria'>$nomeCategoria</option>";
                        }
                    ?>
          </select>
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <label for="valorAnuncio" style="display: block; margin-bottom: 8px; font-weight: 700;">Valor do Anuncio (R$):</label>
        <input type="number" step="0.01" id="valorAnuncio" name="valorAnuncio" required placeholder="Ex: 49.90"
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;"/>

        <label for="fotoAnuncio" style="display: block; margin-bottom: 8px; font-weight: 700;">Foto do Anuncio:</label>
        <input type="file" id="fotoAnuncio" name="fotoAnuncio" accept="image/*" required
          style="width: 100%; margin-bottom: 30px;"/>

        <button type="submit" class="btn"style="width: 100%; padding: 15px 0; font-weight: 700; font-size: 18px; border: none; cursor: pointer;">Cadastrar Anuncio</button>
      </form>

      <div style="text-align: center; margin-top: 20px;">
        <a href="index.php#menu" style="color: #88d3d9; font-weight: 700; text-decoration: none;">Ver lista de Anuncios</a>
      </div>
    </div>
  </div>

</body>
</html>

<?php
include "footer.php";
?>

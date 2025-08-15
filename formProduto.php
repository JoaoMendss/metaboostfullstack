<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Produto</title>
</head>
<body style="background-color: #121212; color: white; padding-top: 0px;">

  <div class="box-container" style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px 20px;">
    <div class="box" style="max-width: 400px; width: 100%; background-color: #222; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.8);">
      <h2 style="text-align: center; margin-bottom: 25px; font-weight: 700;">Cadastro de Produto</h2>
      <form action="actionProduto.php" method="POST" enctype="multipart/form-data">
        <label for="nomeProduto" style="display: block; margin-bottom: 8px; font-weight: 700;">Nome do Produto:</label>
        <input 
          type="text" 
          id="nomeProduto" 
          name="nomeProduto" 
          required 
          placeholder="Nome do produto"
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;"
        />

        <label for="descricaoProduto" style="display: block; margin-bottom: 8px; font-weight: 700;">Descrição do Produto:</label>
        <textarea
          id="descricaoProduto"
          name="descricaoProduto"
          required
          placeholder="Descrição do produto"
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px; resize: vertical; min-height: 80px;"
        ></textarea>

        <label for="valorProduto" style="display: block; margin-bottom: 8px; font-weight: 700;">Valor do Produto (R$):</label>
        <input 
          type="number" 
          step="0.01"
          id="valorProduto" 
          name="valorProduto" 
          required 
          placeholder="Ex: 49.90"
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;"
        />

        <label for="fotoProduto" style="display: block; margin-bottom: 8px; font-weight: 700;">Foto do Produto:</label>
        <input 
          type="file" 
          id="fotoProduto" 
          name="fotoProduto" 
          accept="image/*" 
          required
          style="width: 100%; margin-bottom: 30px;"
        />

        <button 
          type="submit" 
          class="btn"
          style="width: 100%; padding: 15px 0; font-weight: 700; font-size: 18px; border: none; cursor: pointer;"
        >
          Cadastrar Produto
        </button>
      </form>

      <div style="text-align: center; margin-top: 20px;">
        <a href="index.php#menu" style="color: #88d3d9; font-weight: 700; text-decoration: none;">Ver lista de produtos</a>
      </div>
    </div>
  </div>

</body>
</html>

<?php
include "footer.php";
?>

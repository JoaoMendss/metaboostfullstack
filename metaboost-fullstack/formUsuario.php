<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro de Usuário</title>
</head>
<body style="background-color: #121212; color: white; padding-top: 0px;">

  <div class="box-container" style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px 20px;">
    <div class="box" style="max-width: 400px; width: 100%; background-color: #222; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.8);">
      <h2 style="text-align: center; margin-bottom: 25px; font-weight: 700;">Cadastro de Usuário</h2>
      <form action="actionUsuario.php" method="POST">
        <label for="nome" style="display: block; margin-bottom: 8px; font-weight: 700;">Nome Completo:</label>
        <input 
          type="text" 
          id="nome" 
          name="nome" 
          required 
          placeholder="Seu nome completo"
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;"
        />

        <label for="email" style="display: block; margin-bottom: 8px; font-weight: 700;">E-mail:</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          required 
          placeholder="seuemail@exemplo.com"
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;"
        />

        <label for="senha" style="display: block; margin-bottom: 8px; font-weight: 700;">Senha:</label>
        <input 
          type="password" 
          id="senha" 
          name="senha" 
          required 
          placeholder="********"
          style="width: 100%; padding: 12px 15px; margin-bottom: 30px; border: none; border-radius: 5px; font-size: 16px;"
        />

        <button 
          type="submit" 
          class="btn"
          style="width: 100%; padding: 15px 0; font-weight: 700; font-size: 18px; border: none; cursor: pointer;"
        >
          Cadastrar
        </button>
      </form>

      <div style="text-align: center; margin-top: 20px;">
        <a href="formLogin.php" style="color: #88d3d9; font-weight: 700; text-decoration: none;">Já tem cadastro? Faça login aqui</a>
      </div>
    </div>
  </div>

</body>
</html>

<?php
include "footer.php";
?>

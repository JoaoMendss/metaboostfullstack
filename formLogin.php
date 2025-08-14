<?php
include "header.php";
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: painel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Dev MetaBoost</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet" />
</head>
<body style="background-color: #121212; color: white; font-family: 'Roboto', sans-serif;">

  <div class="box-container" style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px 20px;">
    <div class="box" style="max-width: 400px; width: 100%; background-color: #222; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.8);">
      <h2 style="text-align: center; margin-bottom: 25px; font-weight: 700;">Login</h2>
      <form action="actionLogin.php" method="POST">
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
          style="width: 100%; padding: 12px 15px; margin-bottom: 10px; border: none; border-radius: 5px; font-size: 16px;"
        />

        <!-- Link para cadastro -->
        <div style="text-align: right; margin-bottom: 30px;">
          <a href="formUsuario.php" style="color: #88d3d9; font-weight: 700; text-decoration: none;">Cadastre-se aqui</a>
        </div>

        <button 
          type="submit" 
          class="btn"
          style="width: 100%; padding: 15px 0; font-weight: 700; font-size: 18px; border: none; cursor: pointer;"
        >
          Entrar
        </button>
      </form>
    </div>
  </div>

</body>
</html>
<?php include "footer.php";?>

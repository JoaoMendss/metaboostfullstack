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
  <title>Login - MetaBoost</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet" />
</head>
<body style="background-color: #000000; color: white; font-family: 'Roboto', sans-serif;">

  <div class="box-container" style="margin-top: 200px; margin-bottom: 142px; display: flex; justify-content: center; align-items: center; padding: 40px 20px;">
    <div class="box" style="max-width: 400px; width: 100%; background-color: #222; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.8);">
      <h2 style="text-align: center; margin-bottom: 25px; font-weight: 700; font-size: 20px;">Login</h2>
      <form action="actionLogin.php" method="POST">
        <label for="emailUsuario" style="display: block; margin-bottom: 8px; font-weight: 700; font-size: 16px;">E-mail:</label>
        <input type="email" id="emailUsuario" name="emailUsuario" required placeholder="Email"autocapitalize="none"autocorrect="off"autocomplete="username"
        style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;"/>

        <label for="senhaUsuario" style="display: block; margin-bottom: 8px; font-weight: 700; font-size: 16px;">Senha:</label>
        <input type="password" id="senhaUsuario" name="senhaUsuario" required placeholder="Senha" autocapitalize="none" autocorrect="off" autocomplete="current-password"
          style="width: 100%; padding: 12px 15px; margin-bottom: 10px; border: none; border-radius: 5px; font-size: 16px;"/>

        <!-- Link para cadastro -->
        <div style="text-align: right; margin-bottom: 30px;">
          <a href="formUsuario.php" style="color: #88d3d9; font-weight: 700; text-decoration: none; font-size: 12px;">Cadastre-se aqui</a>
        </div>

        <button type="submit" class="btn"style="width: 100%; padding: 15px 0; font-weight: 700; font-size: 18px; border: none; cursor: pointer;">Entrar</button>
      </form>
    </div>
  </div>

</body>
</html>
<?php include "footer.php";?>

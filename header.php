<?php
// Inicia a sessão (garante que as variáveis $_SESSION funcionem)
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<head>
  <title>MetaBoost</title>
  <link rel="stylesheet" href="style.css">

  <!-- CDNs para Máscaras JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" 
          integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer"></script>

  <!-- Script JQuery para a máscara do telefone -->
  <script>
    $(document).ready(function(){
      $("#telefoneUsuario").mask("(00) 00000-0000");
    });
  </script>
</head>

<header class="header">
  <section>
    <a href="index.php"><img src="./img/logo.png" alt="logo" width="80"></a>

    <?php
      error_reporting(0); // Desabilita reportagens de erros de execução
      session_start(); // Inicia sessão

      if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
          $idUsuario    = $_SESSION['idUsuario'];
          $tipoUsuario  = $_SESSION['tipoUsuario'];
          $nomeUsuario  = $_SESSION['nomeUsuario'];
          $emailUsuario = $_SESSION['emailUsuario'];

          $nomeCompleto = explode(' ', $nomeUsuario);
          $primeiroNome = $nomeCompleto[0];
      }
    ?>

    <nav class="navbar">
      <a href="index.php#">Home</a>
      <a href="index.php#about">Sobre</a>
      <a href="index.php#menu">Anúncios</a>
    </nav>

    <div class="icons">
      <?php if (isset($_SESSION['idUsuario'])): ?>
        <!-- Só administradores podem cadastrar Anuncio -->
        <a href="formAnuncio.php">
          <img title="Anunciar" width="30" height="30" src="https://img.icons8.com/ios/30/ffffff/plus--v1.png" alt="cadastrar Anúncio"/>
        </a>

        <?php if ($_SESSION['tipoUsuario'] === 'administrador' || 'cliente'): ?>
          <!-- Botão de logout -->
          <a href="logout.php">
            <img title="Sair" width="30" height="30" src="https://img.icons8.com/android/30/ffffff/logout-rounded.png" alt="logout"/>
          </a>
          <!-- Mensagem de boas-vindas -->
          <span style="font-size:12pt; color:white; margin-right:10px;">Olá, <?php echo $primeiroNome; ?>!</span>
        <?php endif; ?>

      <?php else: ?>
        <!-- Usuário não logado: mostra Login -->
        <a href="formLogin.php">
          <img title="Entrar" width="30" height="30" src="https://img.icons8.com/material-rounded/30/ffffff/user-male-circle.png" alt="login"/>
        </a>
      <?php endif; ?>
    </div>

  </section>
</header>

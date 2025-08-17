<head>
  <link rel="stylesheet" href="style.css">
  <!-- CDNs para Máscaras JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Script JQuery para a máscara do telefone -->
  <script>
    $(document).ready(function(){
      $("#telefoneUsuario").mask("(00) 00000-0000");
      //$("#cepUsuario").mask("00000-000");
      //$("#cpfUsuario").mask("000.000.000-00");
    });
  </script>
</head>
<header class="header">
  <section>
    <a href="index.php"><img src="./img/logo.png" alt="logo" width="80"></a>

    <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="#about">Sobre</a>
      <a href="#menu">Produtos</a>
    </nav>

    <div class="icons">
      <!-- <a href="logout.php"><img width="30" height="30" src="https://img.icons8.com/android/30/ffffff/logout-rounded.png" alt="logout"/></a> -->
      <a href="formLogin.php"><img width="30" height="30" src="https://img.icons8.com/material-rounded/30/ffffff/user-male-circle.png" alt="login"/></a>
      <a href="formProduto.php"><img width="30" height="30" src="https://img.icons8.com/ios/30/ffffff/plus--v1.png" alt="cadastrar produto"/></a>
    </div>

  </section>
</header>
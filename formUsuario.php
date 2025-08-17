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
<body style="background-color: #000000; color: white; padding-top: 0px;">

  <div class="box-container" style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px 20px;">
    <div class="box" style="max-width: 400px; width: 100%; background-color: #222; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.8);">
      <h2 style="text-align: center; margin-bottom: 25px; font-weight: 700;">Cadastro de Usuário</h2>
      <form action="actionUsuario.php?pagina=formUsuario" method="POST" class="was-validated" enctype="multipart/form-data">

        <div class="form-floating mb-3 mt-3">
          <label for="fotoUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Foto:</label>
          <input type="file" class="form-control" id="fotoUsuario" placeholder="Foto" name="fotoUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-floating mb-3 mt-3">
          <label for="nomeUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Nome Completo:</label>
          <input type="text" class="form-control" id="nomeUsuario" placeholder="Nome" name="nomeUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-floating mb-3 mt-3">
          <label for="dataNascimentoUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Data de Nascimento:</label>
          <input type="date" class="form-control" id="dataNascimentoUsuario" placeholder="Data de Nascimento" name="dataNascimentoUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-floating mb-3 mt-3">
          <label for="cidadeUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Cidade:</label>
          <select class="form-select" id="cidadeUsuario" name="cidadeUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
              <option value="curiuva">Curiúva</option>
              <option value="imbau">Imbaú</option>
              <option value="ortigueira">Ortigueira</option>
              <option value="reserva">Reserva</option>
              <option value="telemacoBorba" selected>Telêmaco Borba</option>
              <option value="tibagi">Tibagi</option>
          </select>
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-floating mb-3 mt-3">
          <label for="telefoneUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Telefone:</label>
          <input type="text" class="form-control" id="telefoneUsuario" placeholder="Telefone" name="telefoneUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-floating mb-3 mt-3">
          <label for="emailUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Email:</label>
          <input type="email" class="form-control" id="emailUsuario" placeholder="Email" name="emailUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-floating mt-3 mb-3">
          <label for="senhaUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Senha:</label>
          <input type="password" class="form-control" id="senhaUsuario" placeholder="Senha" name="senhaUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <div class="form-floating mt-3 mb-3">
          <label for="confirmarSenhaUsuario" style="display: block; margin-bottom: 8px; font-weight: 700;">Confirme a Senha:</label>
          <input type="password" class="form-control" id="confirmarSenhaUsuario" placeholder="Confirme a Senha" name="confirmarSenhaUsuario" required
          style="width: 100%; padding: 12px 15px; margin-bottom: 20px; border: none; border-radius: 5px; font-size: 16px;">
          <div class="valid-feedback"></div>
          <div class="invalid-feedback"></div>
        </div>

        <button type="submit" class="btn" style="width: 100%; padding: 15px 0; font-weight: 700; font-size: 18px; border: none; cursor: pointer;">Cadastrar</button>
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

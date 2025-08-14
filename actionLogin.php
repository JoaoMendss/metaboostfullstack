<?php
session_start();
include "conexaoBD.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $senha = trim($_POST['senha']);

    // Consulta o usuário no banco
    $query = "SELECT * FROM Usuarios WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $usuario = mysqli_fetch_assoc($result);

        // Verifica a senha - supondo senha armazenada com password_hash
        if (password_verify($senha, $usuario['senha'])) {
            // Login válido, cria sessão
            $_SESSION['usuario'] = [
                'id' => $usuario['idUsuario'],
                'nome' => $usuario['nomeUsuario'],
                'email' => $usuario['email'],
                'nivel' => $usuario['nivelAcesso'] // ou outro campo que tiver para perfil/permissão
            ];
            header("Location: painel.php");
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
} else {
    $erro = "Método inválido.";
}

// Se chegar aqui tem erro:
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Erro no Login</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body style="background:#121212; color:white; display:flex; justify-content:center; align-items:center; height:100vh;">
  <div style="background:#222; padding:20px; border-radius:8px; width:300px; text-align:center;">
    <h2>Erro no Login</h2>
    <p><?= htmlspecialchars($erro) ?></p>
    <a href="formLogin.php" style="color:#4CAF50;">Voltar para login</a>
  </div>
</body>
</html>

<?php
session_start();
include "conexaoBD.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeUsuario  = trim(mysqli_real_escape_string($conn, $_POST['nomeUsuario']));
    $emailUsuario = trim(mysqli_real_escape_string($conn, $_POST['emailUsuario']));
    $senhaUsuario = $_POST['senhaUsuario'];

    if (empty($nomeUsuario) || empty($emailUsuario) || empty($senhaUsuario)) {
        $_SESSION['error'] = "Por favor, preencha todos os campos.";
        header("Location: formUsuario.php");
        exit;
    }

    // Verifica se o emailUsuario já existe
    $query = "SELECT idUsuario FROM Usuarios WHERE emailUsuario = '$emailUsuario' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Este e-mail já está cadastrado.";
        header("Location: formUsuario.php");
        exit;
    }

    // Criptografia da senhaUsuario
    $senhaUsuario = password_hash($senhaUsuario, PASSWORD_DEFAULT);

    // Inserir novo usuário
    $insert = "INSERT INTO Usuarios (nomeUsuario, emailUsuario, senhaUsuario) VALUES ('$nomeUsuario', '$emailUsuario', '$senhaUsuario')";
    if (mysqli_query($conn, $insert)) {
        $_SESSION['success'] = "Cadastro realizado com sucesso! Faça login para continuar.";
        header("Location: formLogin.php");
        exit;
    } else {
        $_SESSION['error'] = "Erro ao cadastrar usuário. Tente novamente.";
        header("Location: formUsuario.php");
        exit;
    }
} else {
    header("Location: formUsuario.php");
    exit;
}

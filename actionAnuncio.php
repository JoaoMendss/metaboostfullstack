<?php
include "header.php";
?>

<section class="box-container" style="min-height: 80vh; display:flex; justify-content:center; align-items:center; padding:5rem 2rem;">

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include("conexaoBD.php");

    $erroPreenchimento = false;

    $nomeAnuncio = htmlspecialchars(trim($_POST["nomeAnuncio"] ?? ""));
    $descricaoAnuncio = htmlspecialchars(trim($_POST["descricaoAnuncio"] ?? ""));
    $categoriaAnuncio = htmlspecialchars(trim($_POST["categoriaAnuncio"] ?? ""));
    $valorAnuncio = htmlspecialchars(trim($_POST["valorAnuncio"] ?? ""));

    if(!$nomeAnuncio || !$descricaoAnuncio || !$valorAnuncio || !$categoriaAnuncio){
        echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>Todos os campos são obrigatórios!</div>";
        $erroPreenchimento = true;
    }

    $diretorio = "img/";
    $fotoAnuncio = $diretorio . basename($_FILES['fotoAnuncio']['name']);
    $tipoDaImagem = strtolower(pathinfo($fotoAnuncio, PATHINFO_EXTENSION));
    $erroUpload = false;

    if($_FILES['fotoAnuncio']['size'] == 0){
        echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>A foto é obrigatória!</div>";
        $erroUpload = true;
    } else {
        if($_FILES['fotoAnuncio']['size'] > 5000000){
            echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>A foto deve ter no máximo 5MB!</div>";
            $erroUpload = true;
        }
        if(!in_array($tipoDaImagem, ["jpg","jpeg","png","webp"])){
            echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>Formato inválido! Use JPG, JPEG, PNG ou WEBP.</div>";
            $erroUpload = true;
        }
        if(!move_uploaded_file($_FILES['fotoAnuncio']['tmp_name'], $fotoAnuncio)){
            echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>Erro ao mover a foto!</div>";
            $erroUpload = true;
        }
    }

    if(!$erroPreenchimento && !$erroUpload){
        $sql = "INSERT INTO Anuncios (fotoAnuncio, Usuarios_idUsuario, Categorias_idCategoria, nomeAnuncio, descricaoAnuncio, valorAnuncio, statusAnuncio) 
                VALUES ('$fotoAnuncio', '1',  '$categoriaAnuncio', '$nomeAnuncio','$descricaoAnuncio','$valorAnuncio','disponivel')";

        if(mysqli_query($conn, $sql)){
            echo "<div class='box' style='border:var(--border); padding:2rem; text-align:center; background-color:var(--black); border-radius:8px;'>";
            echo "<h2 style='color:var(--main--color); margin-bottom:1rem;'>Anuncio cadastrado com sucesso!</h2>";
            echo "<img src='$fotoAnuncio' alt='$nomeAnuncio' style='width:200px; border-radius:8px; margin-bottom:1rem;'><br>";
            echo "<h3 style='color:#fff; margin-bottom:0.5rem;'>$nomeAnuncio</h3>";
            echo "<p style='color:#fff; margin-bottom:0.5rem;'>$descricaoAnuncio</p>";
            echo "<h3 style='color:#fff; margin-bottom:0.5rem;'>$categoriaAnuncio</h3>";
            echo "<p class='price' style='color:var(--main--color); font-size:2rem;'>R$ $valorAnuncio</p>";
            echo "</div>";
        } else {
            echo "<div style='color:white; font-weight:700; text-align:center;'>Erro ao cadastrar Anuncio: ".mysqli_error($conn)."</div>";
        }
        mysqli_close($conn);
    }

} else {
    header("Location: formAnuncio.php");
    exit;
}
?>

</section>

<?php
include "footer.php";
?>

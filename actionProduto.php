<?php
include "header.php";
?>

<section class="box-container" style="min-height: 100vh; display:flex; justify-content:center; align-items:center; padding:5rem 2rem;">

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include("conexaoBD.php");

    $erroPreenchimento = false;

    $nomeProduto = htmlspecialchars(trim($_POST["nomeProduto"] ?? ""));
    $descricaoProduto = htmlspecialchars(trim($_POST["descricaoProduto"] ?? ""));
    $valorProduto = htmlspecialchars(trim($_POST["valorProduto"] ?? ""));

    if(!$nomeProduto || !$descricaoProduto || !$valorProduto){
        echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>Todos os campos são obrigatórios!</div>";
        $erroPreenchimento = true;
    }

    $diretorio = "img/";
    $fotoProduto = $diretorio . basename($_FILES['fotoProduto']['name']);
    $tipoDaImagem = strtolower(pathinfo($fotoProduto, PATHINFO_EXTENSION));
    $erroUpload = false;

    if($_FILES['fotoProduto']['size'] == 0){
        echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>A foto é obrigatória!</div>";
        $erroUpload = true;
    } else {
        if($_FILES['fotoProduto']['size'] > 5000000){
            echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>A foto deve ter no máximo 5MB!</div>";
            $erroUpload = true;
        }
        if(!in_array($tipoDaImagem, ["jpg","jpeg","png","webp"])){
            echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>Formato inválido! Use JPG, JPEG, PNG ou WEBP.</div>";
            $erroUpload = true;
        }
        if(!move_uploaded_file($_FILES['fotoProduto']['tmp_name'], $fotoProduto)){
            echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>Erro ao mover a foto!</div>";
            $erroUpload = true;
        }
    }

    if(!$erroPreenchimento && !$erroUpload){
        $sql = "INSERT INTO Produtos (fotoProduto, nomeProduto, descricaoProduto, valorProduto, statusProduto) 
                VALUES ('$fotoProduto','$nomeProduto','$descricaoProduto','$valorProduto','disponivel')";

        if(mysqli_query($conn, $sql)){
            echo "<div class='box' style='border:var(--border); padding:2rem; text-align:center; background-color:var(--black); border-radius:8px;'>";
            echo "<h2 style='color:var(--main--color); margin-bottom:1rem;'>Produto cadastrado com sucesso!</h2>";
            echo "<img src='$fotoProduto' alt='$nomeProduto' style='width:200px; border-radius:8px; margin-bottom:1rem;'><br>";
            echo "<h3 style='color:#fff; margin-bottom:0.5rem;'>$nomeProduto</h3>";
            echo "<p style='color:#fff; margin-bottom:0.5rem;'>$descricaoProduto</p>";
            echo "<p class='price' style='color:var(--main--color); font-size:2rem;'>R$ $valorProduto</p>";
            echo "</div>";
        } else {
            echo "<div style='color:#e74c3c; font-weight:700; text-align:center;'>Erro ao cadastrar produto: ".mysqli_error($conn)."</div>";
        }
        mysqli_close($conn);
    }

} else {
    header("Location: formProduto.php");
    exit;
}
?>

</section>

<?php
include "footer.php";
?>

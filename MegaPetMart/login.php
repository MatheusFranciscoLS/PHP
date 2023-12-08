<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $stmt = $conn->prepare("SELECT id, usuario, senha FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($senha, $row["senha"])) {
        $_SESSION["usuario"] = $row["usuario"];
        header("Location: dashboard.php"); // Redireciona para a página do painel após o login
        exit();
    } else {
        echo "Usuário ou senha incorretos.";
    }

    $stmt->close();
}

$conn->close();
?>

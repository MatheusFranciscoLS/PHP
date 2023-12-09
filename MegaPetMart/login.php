<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificação de login
    $loginUsuario = $_POST["loginUsuario"];
    $loginSenha = $_POST["loginSenha"];

    $stmtLogin = $conn->prepare("SELECT usuario, senha FROM usuarios WHERE usuario = ?");
    $stmtLogin->bind_param("s", $loginUsuario);
    $stmtLogin->execute();
    $stmtLogin->bind_result($dbUsuario, $dbSenha);

    if ($stmtLogin->fetch()) {
        // Usuário encontrado, verifique a senha
        if (password_verify($loginSenha, $dbSenha)) {
            echo '<script>alert("Login bem-sucedido!");</script>';
        } else {
            echo '<script>alert("Senha incorreta. Tente novamente.");</script>';
        }
    } else {
        echo '<script>alert("Usuário não encontrado. Verifique suas credenciais.");</script>';
    }

    $stmtLogin->close();
} else {
    echo '<script>alert("Método de requisição inválido.");</script>';
}

$conn->close();
?>

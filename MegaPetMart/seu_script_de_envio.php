<?php
// Conexão com o banco de dados (substitua as credenciais com as suas)
$servername = "localhost";
$username = "root";
$password = "";
$database = "loja";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento dos dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar os dados do formulário (substitua com validações específicas)
    $pNome = $_POST["pNome"];
    $sNome = $_POST["sNome"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];
    $nCartao = $_POST["nCartao"];

    // Verificar se a validação foi bem-sucedida
    if ($email === false) {
        echo "Email inválido. Por favor, forneça um email válido.";
        exit();
    }

    // Inserir os dados no banco de dados usando uma consulta preparada
    $sql = "INSERT INTO usuarios (pNome, sNome, usuario, email, senha, cidade, estado, cep, cpf, nCartao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("ssssssssss", $pNome, $sNome, $usuario, $email, $senha, $cidade, $estado, $cep, $cpf, $nCartao);

    if ($stmt->execute()) {
        // Cadastro bem-sucedido. Redirecione para a página de login.
        header("Location: http://localhost/MegaPetMart/login.html");
        exit();
    } else {
        echo "Erro no cadastro. Por favor, tente novamente mais tarde.";
        // Pode ser interessante registrar os detalhes completos do erro em logs do servidor
    }

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "aula16";

// Obtém o parâmetro PicNum da URL
$PicNum = $_GET["PicNum"];

// Conexão com o banco de dados usando mysqli
$conn = mysqli_connect($host, $username, $password, $db);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Impossível conectar ao banco: " . mysqli_connect_error());
}

// Prepara a consulta SQL com uma instrução preparada para evitar injeção de SQL
$query = "SELECT PES_IMG FROM PESSOA WHERE PES_ID=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $PicNum);

// Executa a consulta preparada
if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_bind_result($stmt, $PES_IMG);

    // Verifica se há resultados
    if (mysqli_stmt_fetch($stmt)) {
        // Define o cabeçalho para a imagem
        header("Content-type: image/gif");
        echo $PES_IMG;
    } else {
        echo "Imagem não encontrada.";
    }

    // Fecha a consulta preparada
    mysqli_stmt_close($stmt);
} else {
    die("Impossível executar a query: " . mysqli_error($conn));
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>

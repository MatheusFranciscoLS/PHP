<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "aula16";

// Conexão com o banco de dados usando mysqli
$conn = mysqli_connect($host, $username, $password, $db);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Impossível conectar ao banco: " . mysqli_connect_error());
}

// Executa a consulta SQL
$query = "SELECT * FROM PESSOA";
$result = mysqli_query($conn, $query);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Impossível executar a query: " . mysqli_error($conn));
}

// Loop para recuperar e exibir os dados
while ($row = mysqli_fetch_object($result)) {
    echo "<img src='getImagem.php?PicNum=$row->PES_ID'>";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>

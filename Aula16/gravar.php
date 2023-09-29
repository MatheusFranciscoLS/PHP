<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "aula16";

// Verifica se um arquivo de imagem foi enviado
if (isset($_FILES["imagem"])) {
    $imagem = $_FILES["imagem"];

    // Verifica se não houve erros durante o upload
    if ($imagem["error"] === UPLOAD_ERR_OK) {
        $nomeFinal = time() . '.jpg';

        // Move o arquivo para o diretório desejado
        if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
            $tamanhoImg = filesize($nomeFinal);

            // Lê o conteúdo do arquivo para inserir no banco de dados
            $mysqlImg = addslashes(file_get_contents($nomeFinal));

            // Conexão com o banco de dados usando mysqli
            $conn = mysqli_connect($host, $username, $password, $db);

            // Verifica se a conexão foi bem-sucedida
            if ($conn) {
                // Executa a inserção no banco de dados
                $query = "INSERT INTO PESSOA (PES_IMG) VALUES (?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "s", $mysqlImg);

                if (mysqli_stmt_execute($stmt)) {
                    // Remove o arquivo temporário
                    unlink($nomeFinal);
                    header("location:exibir.php");
                } else {
                    echo "O sistema não foi capaz de executar a query: " . mysqli_error($conn);
                }

                // Fecha a consulta preparada e a conexão com o banco de dados
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            } else {
                echo "Impossível conectar ao banco: " . mysqli_connect_error();
            }
        } else {
            echo "Falha ao mover o arquivo enviado.";
        }
    } else {
        echo "Erro durante o upload do arquivo: " . $imagem["error"];
    }
} else {
    echo "Você não realizou o upload de forma satisfatória.";
}
?>

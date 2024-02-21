<?php
// endereco
// nome do BD
// admin
// senha
$endereco = 'localhost';
$banco = 'matheusnoite';
$admin = 'postgres';
$senha = 'postgres';
try {
    // sgbd:host;port;dbname
    // admin
    // senha
    // errmode
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $admin,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (ID SERIAL, NOME VARCHAR(255), DATA_NASCIMENTO VARCHAR(255), TELEFONE VARCHAR(255), EMAIL VARCHAR(255) PRIMARY KEY, SENHA VARCHAR(255))";
    $sql = "CREATE TABLE IF NOT EXISTS anuncios (ID SERIAL , FASE VARCHAR(255), TIPO VARCHAR(255), PORTE VARCHAR(255), SEXO VARCHAR(255), PELAGEM_COR VARCHAR(255), RACA VARCHAR(255), OBSERVACAO VARCHAR(255), EMAIL_USUARIO VARCHAR(255))";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
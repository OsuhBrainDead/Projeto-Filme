<?php
// PDO = PHP Data Objects. Usado para conectar o PHP ao banco de dados.

$host = "localhost"; // Servidor onde o banco está hospedado.
$banco = "prof_leticia";  // Nome do banco de dados.
$usuario = "root";   // Usuário do MySQL.
$senha = "";         // Senha do usuário.

// Monta as informações necessárias para criar a conexão com o MySQL.
$dsn = "mysql:host={$host};dbname={$banco};charset=utf8mb4";

try {
    // Cria a conexão com o banco e armazena na variável $pdo.
    $pdo = new PDO($dsn, $usuario, $senha);

    // Faz o PDO gerar uma exceção quando ocorrer algum erro.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Faz os resultados das consultas serem retornados como arrays associativos.
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Exibe o erro ocorrido e interrompe a execução do código.
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
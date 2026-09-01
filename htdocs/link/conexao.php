<?php


$host   = "localhost";       // Endereço do servidor MySQL
$usuario = "root";           // Usuário do banco (no XAMPP costuma ser "root")
$senha   = "";                // Senha do banco (no XAMPP costuma ser vazia)
$banco   = "cadastro_senai"; // Nome do banco criado no banco.sql


// --- Criando a conexão usando mysqli (orientado a objetos) ---
$conexao = new mysqli($host, $usuario, $senha, $banco);


// --- Verificando se a conexão deu certo ---
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}


// Define o charset para evitar problemas com acentuação (ç, ã, é, etc.)
$conexao->set_charset("utf8mb4");
?>



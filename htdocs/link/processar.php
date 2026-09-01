<?php
// Inclui o arquivo que já abre a conexão com o banco
require "conexao.php";


// Só processa se o formulário foi realmente enviado via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    // --- Captura e limpa os dados vindos do formulário ---
    // trim() remove espaços em branco extras
    // htmlspecialchars() evita que o usuário injete código HTML/JS (XSS)
    $nome     = htmlspecialchars(trim($_POST["nome"] ?? ""));
    $email    = htmlspecialchars(trim($_POST["email"] ?? ""));
    $mensagem = htmlspecialchars(trim($_POST["mensagem"] ?? ""));


    // --- Validação simples ---
    if (empty($nome) || empty($email)) {
        die("Por favor, preencha nome e e-mail.");
    }


    // --- Prepared Statement: forma segura de inserir dados no banco ---
    // Os "?" são placeholders que serão preenchidos depois, evitando SQL Injection
    $sql = "INSERT INTO contatos (nome, email, mensagem) VALUES (?, ?, ?)";


    $stmt = $conexao->prepare($sql);


    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $conexao->error);
    }


    // "sss" = os três parâmetros são do tipo string
    $stmt->bind_param("sss", $nome, $email, $mensagem);


    // Executa a inserção e verifica se deu certo
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso! Obrigado, " . $nome . ".";
    } else {
        echo "Erro ao salvar os dados: " . $stmt->error;
    }


    // Fecha o statement e a conexão
    $stmt->close();
    $conexao->close();


} else {
    // Se alguém tentar acessar processar.php diretamente sem enviar o form
    echo "Acesso inválido.";
}
?>



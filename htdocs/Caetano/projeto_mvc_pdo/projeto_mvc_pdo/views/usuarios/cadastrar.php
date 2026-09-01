<!DOCTYPE html>
<!-- Declaração do tipo de documento como HTML5 -->
<html lang="pt-br">
<head>
    <!-- Define a codificação de caracteres como UTF-8 para exibição correta de acentos -->
    <meta charset="UTF-8">
    <!-- Título na aba do navegador (Atenção: está como Produto, mas o formulário é de Cliente) -->
    <title>Cadastro de Produto</title>

    <!-- Estilização CSS interna centralizando o card e formatando o formulário -->
    <style>
    /* Centraliza o formulário na tela e define a cor de fundo */
    body{font-family:Arial,sans-serif;background:#f4f6f8;display:flex;justify-content:center;padding-top:60px}
    /* Estiliza a caixa do formulário no formato de cartão */
    .card{background:#fff;padding:30px 40px;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.1);width:350px}
    h2{margin-top:0;color:#2c3e50}label{display:block;margin-top:15px;font-weight:bold;color:#333}
    /* Ajusta o tamanho e estilo dos campos de entrada */
    input{width:100%;padding:8px;margin-top:5px;border:1px solid #ccc;border-radius:5px;box-sizing:border-box}
    /* Botão de envio na cor azul */
    button{margin-top:20px;width:100%;padding:10px;background:#2c7be5;color:#fff;border:none;border-radius:5px;font-size:16px}
    </style>
</head>
<body>
    <div class="card">
        <h2>Cadastrar cliente</h2>

        <!-- Formulário enviando dados via POST para salvar o usuário em index.php -->
        <form action="index.php?acao=usuario_salvar" method="POST">

            <!-- Campo para o nome do cliente -->
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <!-- Campo para o e-mail (com validação nativa de formato de e-mail) -->
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>

            <!-- Campo para a senha -->
            <label for="senha">senha:</label>
            <input type="text" id="senha" name="senha" required>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
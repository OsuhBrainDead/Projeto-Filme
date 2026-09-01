<!DOCTYPE html>
<!-- Declara o documento como HTML5 -->
<html lang="pt-br">
<head>
    <!-- Define a codificação de caracteres UTF-8 (suporte a acentos e ç) -->
    <meta charset="UTF-8">
    <!-- Título da página exibido na aba do navegador -->
    <title>Cadastro de Produto</title>

    <!-- Blocos de estilo CSS internos para estilização da tela -->
    <style>
        /* Centraliza o card na tela com Flexbox e define a cor de fundo do site */
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            padding-top: 60px;
        }

        /* Estiliza o container do formulário em formato de cartão com sombra e cantos arredondados */
        .card {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
            width: 350px;
        }

        /* Ajusta espaçamentos e cores dos títulos e rótulos */
        h2 {
            margin-top: 0;
            color: #2c3e50;
        }

        label {
            display: block; /* Força os labels a ficarem acima dos inputs */
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        /* Estiliza todos os campos de entrada do formulário */
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Garante que o padding não ultrapasse a largura total do container */
        }

        /* Estiliza o botão de envio principal */
        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background: #2c7be5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Container principal (Card) -->
    <div class="card">
        <h2>Cadastrar produto</h2>

        <!-- Formulário que envia dados via POST para a ação 'produto_salvar' no index.php -->
        <form action="index.php?acao=produto_salvar" method="POST">

            <!-- Campo: Nome do Produto -->
            <label for="nomeProduto">Nome do Produto:</label>
            <input type="text" id="nomeProduto" name="nomeProduto" required>

            <!-- Campo: Valor (Aceita decimais com step="0.01") -->
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" id="valor" name="valor" required>

            <!-- Campo: Preço Unitário (Aceita decimais com step="0.01") -->
            <label for="precoUnitario">Preço Unitário:</label>
            <input type="number" step="0.01" id="precoUnitario" name="precoUnitario" required>

            <!-- Campo: Quantidade (Aceita apenas números inteiros >= 0) -->
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" min="0" required>

            <!-- Botão para submeter o formulário -->
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
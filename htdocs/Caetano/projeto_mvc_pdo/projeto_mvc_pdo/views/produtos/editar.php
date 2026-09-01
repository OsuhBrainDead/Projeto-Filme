<!DOCTYPE html>
<!-- Declara o tipo de documento como HTML5 -->
<html lang="pt-br">
<head>
       <!-- Define a codificação de caracteres como UTF-8 (suporte a acentos e ç) -->
       <meta charset="UTF-8">
       <!-- Título exibido na aba do navegador -->
       <title>Editar Produto</title>
       
       <!-- Estilização CSS interna da página -->
       <style>
       /* Centraliza o cartão vertical/horizontalmente e define cor de fundo */
       body{font-family:Arial,sans-serif;background:#f4f6f8;display:flex;justify-content:center;padding-top:60px}
       /* Moldura estilo card com sombra suave e bordas arredondadas */
       .card{background:#fff;padding:30px 40px;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.1);width:350px}
       /* Estilização de títulos e rótulos dos campos */
       h2{margin-top:0;color:#2c3e50}label{display:block;margin-top:15px;font-weight:bold;color:#333}
       /* Ajusta a largura e espaçamento dos campos de texto e número */
       input{width:100%;padding:8px;margin-top:5px;border:1px solid #ccc;border-radius:5px;box-sizing:border-box}
       /* Botão estilo alerta/edição na cor amarelada (#f0ad4e) */
       button{margin-top:20px;width:100%;padding:10px;background:#f0ad4e;color:#fff;border:none;border-radius:5px;font-size:16px}
       /* Estilo do link de navegação para voltar */
       a{display:inline-block;margin-top:10px;color:#555;text-decoration:none}
       </style>
</head>
<body>
       <!-- Container principal do formulário de edição -->
       <div class="card">

              <h2>Editar Produto</h2>

              <!-- Form envia dados atualizados via POST para a ação 'produto_atualizar' no index.php -->
              <form action="index.php?acao=produto_atualizar" method="POST">

                     <!-- Campo oculto contendo o ID do produto (necessário para o PHP saber qual registro atualizar no banco) -->
                     <input type="hidden" name="id" value="<?= $produto['id'] ?>">

                     <!-- Campo Nome: Pré-preenchido com o valor atual do banco e sanitizado contra XSS -->
                     <label for="nomeProduto">Nome do Produto:</label>
                     <input type="text" id="nomeProduto" name="nomeProduto"
                            value="<?= htmlspecialchars($produto['nomeProduto']) ?>" required>

                     <!-- Campo Valor: Pré-preenchido e com suporte a decimais -->
                     <label for="valor">Valor:</label>
                     <input type="number" step="0.01" id="valor" name="valor"
                            value="<?= htmlspecialchars($produto['valor']) ?>" required>

                     <!-- Campo Preço Unitário: Pré-preenchido com suporte a decimais -->
                     <label for="precoUnitario">Preço Unitário:</label>
                     <input type="number" step="0.01" id="precoUnitario" name="precoUnitario"
                            value="<?= htmlspecialchars($produto['precoUnitario']) ?>" required>

                     <!-- Campo Quantidade: Pré-preenchido exigindo valor maior ou igual a zero -->
                     <label for="quantidade">Quantidade:</label>
                     <input type="number" id="quantidade" name="quantidade" min="0"
                            value="<?= htmlspecialchars($produto['quantidade']) ?>" required>

                     <!-- Botão de submissão do formulário -->
                     <button type="submit">Salvar Alterações</button>

              </form>

              <!-- Link de retorno para a listagem usando a entidade HTML '&larr;' para a seta para esquerda (←) -->
              <a href="index.php?acao=produtos">&larr; Voltar para a lista</a>

       </div>
</body>
</html>
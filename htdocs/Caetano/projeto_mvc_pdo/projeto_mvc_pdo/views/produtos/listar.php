<!DOCTYPE html>
<!-- Declara o tipo de documento como HTML5 -->
<html lang="pt-br">
<head>
   <!-- Define a codificação de caracteres UTF-8 (suporte a acentos e ç) -->
   <meta charset="UTF-8">
   <!-- Título exibido na aba do navegador -->
   <title>Produtos Cadastrados</title>

   <!-- Bloco de estilização CSS para o layout da listagem e botões -->
   <style>
   /* Estilização base da página e centralização do container */
   body{font-family:Arial,sans-serif;background:#f4f6f8;padding:40px}
   .container{max-width:1100px;margin:0 auto;background:#fff;padding:30px;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,.1)}
   h2{color:#2c3e50}

   /* Formatação visual da tabela de dados */
   table{width:100%;border-collapse:collapse;margin-top:20px}
   th,td{padding:10px;border-bottom:1px solid #eee;text-align:left}
   th{background:#2c7be5;color:#fff} /* Cabeçalho azul da tabela */

   /* Estilização dos botões de ação dentro da tabela */
   a.btn{padding:5px 10px;border-radius:5px;text-decoration:none;color:#fff;font-size:13px;margin-right:5px}
   .editar{background:#f0ad4e} /* Botão Editar em tom amarelo/laranja */
   .excluir{background:#d9534f} /* Botão Excluir em tom vermelho */

   /* Estilo do botão de topo para inclusão de novos registros */
   a.novo{display:inline-block;margin-bottom:15px;padding:8px 15px;background:#2c7be5;color:#fff;border-radius:5px;text-decoration:none}
   </style>
</head>
<body>
   <!-- Container central com largura máxima delimitada -->
   <div class="container">
      <h2>Produtos Cadastrados</h2>

      <!-- Botão de atalho para a tela de criação de novos produtos -->
      <a class="novo" href="index.php?acao=produto_novo">+ Novo produto</a>

      <a class="novo" href="index.php?acao=fornecedor">Fornecedor</a>

      <!-- Tabela para exibição organizada dos dados recebidos do PHP -->
      <table>
      <!-- Nomes das colunas da tabela -->
      <tr>
         <th>Nome do Produto</th>
         <th>Valor</th>
         <th>Preço Unitário</th>
         <th>Quantidade</th>
         <th>Ações</th>
      </tr>

      <!-- Sintaxe alternativa do foreach (ideal para templates HTML): percorre o array $produtos -->
      <?php foreach ($produtos as $linha): ?>
      <tr>
         <!-- Sanitização das saídas contra XSS usando htmlspecialchars -->
         <td><?= htmlspecialchars($linha["nomeProduto"]) ?></td>
         <td><?= htmlspecialchars($linha["valor"]) ?></td>
         <td><?= htmlspecialchars($linha["precoUnitario"]) ?></td>
         <td><?= htmlspecialchars($linha["quantidade"]) ?></td>
         
         <!-- Coluna com ações vinculadas ao ID específico do registro -->
         <td>
         <!-- Link que passa o ID via parâmetro GET na URL para a tela de edição -->
         <a class="btn editar"
            href="index.php?acao=produto_editar&id=<?= $linha['id'] ?>">
            Editar
         </a>

         <!-- Link de exclusão com alerta nativo em JavaScript para prevenir cliques acidentais -->
         <a class="btn excluir"
            href="index.php?acao=produto_deletar&id=<?= $linha['id'] ?>"
            onclick="return confirm('Tem certeza que deseja excluir este produto?');">
            Excluir
         </a>
         </td>
      </tr>
      <?php endforeach; ?>

      </table>
   </div>
</body>
</html>
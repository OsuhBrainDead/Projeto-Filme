<!-- Define que o documento é um HTML5 moderno -->
<!DOCTYPE html>
<!-- Tag raiz da página, definindo o idioma principal como português do Brasil -->
<html lang="pt-BR">
<head>
    <!-- Define a codificação de caracteres como UTF-8 (garante o suporte a acentos e ç) -->
    <meta charset="UTF-8">
    <!-- Título da página exibido na aba do navegador -->
    <title>Página Inicial</title>
</head>
<body>
    <!-- 
      Exibe uma saudação. 
      O atalho  do PHP equivale a 
      A função htmlspecialchars() é usada por segurança para evitar ataques de XSS (injeta caracteres seguros ao ler $_SESSION["nome"]).
    -->
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION["nome"]) ?>!</h1>

    <!-- Mensagem informando a situação atual do usuário -->
    <p>Você está logado no sistema.</p>

    <!-- Link de navegação para gerenciar produtos enviando a variável GET 'acao=produtos' para index.php -->
    <p><a href="index.php?acao=produtos">Gerenciar produtos</a></p>

     <p><a href="index.php?acao=categorias">Gerenciar categorias</a></p>

    <!-- Link para efetuar o logout enviando a variável GET 'acao=sair' para index.php -->
    <a href="index.php?acao=sair">Sair</a>
</body>
</html>
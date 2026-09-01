<!-- Declaração do tipo de documento HTML5 -->
<!DOCTYPE html>
<!-- Tag raiz definindo o idioma como português do Brasil -->
<html lang="pt-BR">
<head>
    <!-- Define a codificação UTF-8 para suporte a acentos e caracteres especiais -->
    <meta charset="UTF-8">
    <!-- Título exibido na aba do navegador -->
    <title>Cadastro realizado</title>
</head>
<body>
    <!-- Título informando a confirmação do cadastro -->
    <h1>Cadastro realizado com sucesso!</h1>

    <!-- 
      Exibe o nome do usuário cadastrado.
      O uso do htmlspecialchars() previne possíveis ataques de XSS caso a variável $nome contenha caracteres maliciosos.
    -->
    <p>Usuário: <?= htmlspecialchars($nome) ?></p>

    <!-- Link para direcionar o novo usuário diretamente para a tela de login -->
    <a href="index.php?acao=login">Ir para o login</a>
</body>
</html>
<!-- Declaração do tipo de documento HTML5 -->
<!DOCTYPE html>
<!-- Elemento raiz definindo a linguagem da página para português do Brasil -->
<html lang="pt-BR">
<head>
    <!-- Define a codificação de caracteres como UTF-8 para exibição correta de acentos -->
    <meta charset="UTF-8">
    <!-- Título da página exibido na aba do navegador -->
    <title>Área Restrita</title>
</head>
<body>
    <!-- Título principal da página -->
    <h1>Login</h1>

    <!-- 
      Formulário de autenticação. 
      - action: Envia os dados para 'index.php' passando o parâmetro 'acao=autenticar' via GET na URL.
      - method="post": Envia as credenciais no corpo da requisição (oculto da URL) por segurança.
    -->
    <form action="index.php?acao=autenticar" method="post">

        <!-- Campo para entrada do nome/usuário. O valor estará acessível no PHP via $_POST['nome'] -->
        <label>Nome:</label><input type="text" name="nome"><br><br>

        <!-- Campo de senha. O tipo 'password' oculta os caracteres digitados na tela (via $_POST['senha']) -->
        <label>Senha:</label><input type="password" name="senha"><br><br>

        <!-- Botão para disparar o envio das informações do formulário -->
        <button type="submit">Entrar</button>
    </form>

    <!-- Link para redirecionar o usuário para a tela de registro de nova conta -->
    <p><a href="index.php?acao=usuario_novo">Cadastrar usuário</a></p>
</body>
</html>
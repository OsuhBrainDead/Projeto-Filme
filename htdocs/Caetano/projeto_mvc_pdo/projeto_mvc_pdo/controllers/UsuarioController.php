<?php
// Controller responsável pelo cadastro, login, sessão e logout.
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController
{
    private Usuario $usuario;

    // Cria o Model e passa a conexão com o banco.
    public function __construct(PDO $pdo)
    {
        $this->usuario = new Usuario($pdo);
    }

    // Exibe o formulário de cadastro.
    public function cadastrar(): void
    {
        require __DIR__ . "/../views/usuarios/cadastrar.php";
    }

    // Recebe os dados do formulário e cadastra o usuário.
    public function salvar(): void
    {
        $nome = trim($_POST["nome"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $senha = trim($_POST["senha"] ?? "");

        // Verifica se todos os campos foram preenchidos.
        if ($nome === "" || $email === "" || $senha === "") {
            die("Preencha todos os campos.");
        }

        // Envia os dados para o Model salvar no banco.
        $this->usuario->cadastrar($nome, $email, $senha);

        // Mostra a página informando que o cadastro foi concluído.
        require __DIR__ . "/../views/usuarios/sucesso.php";
    }

    // Exibe a tela de login.
    public function login(): void
    {
        require __DIR__ . "/../views/auth/login.php";
    }

    // Verifica os dados de login e cria a sessão do usuário.
    public function autenticar(): void
    {
        $nome = trim($_POST["nome"] ?? "");
        $senha = trim($_POST["senha"] ?? "");

        // Verifica se nome e senha foram preenchidos.
        if ($nome === "" || $senha === "") {
            die("Preencha nome e senha.");
        }

        // Consulta o Model para verificar o usuário no banco.
        $usuario = $this->usuario->autenticar($nome, $senha);

        if ($usuario) {
            // Guarda o nome na sessão para identificar o usuário logado.
            $_SESSION["nome"] = $usuario["nome"];

            // Redireciona para a página inicial.
            header("Location: index.php?acao=inicio");
            exit;
        }

        // Exibe mensagem caso os dados estejam incorretos.
        echo "Usuário ou senha incorretos.";
    }

    // Exibe a página inicial somente para usuários logados.
    public function inicio(): void
    {
        // Verifica se existe uma sessão de usuário.
        if (!isset($_SESSION["nome"])) {
            header("Location: index.php?acao=login");
            exit;
        }

        // Exibe a página inicial.
        require __DIR__ . "/../views/auth/inicio.php";
    }

    // Encerra a sessão do usuário.
    public function sair(): void
    {
        session_destroy();

        // Após sair, volta para a tela de login.
        header("Location: index.php?acao=login");
        exit;
    }
}
?>
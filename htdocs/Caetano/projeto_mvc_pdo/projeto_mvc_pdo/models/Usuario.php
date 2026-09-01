<?php
// Model responsável por acessar a tabela de usuários.

class Usuario
{
    private PDO $pdo;

    // Recebe e armazena a conexão com o banco.
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Cadastra um novo usuário no banco.
    public function cadastrar(string $nome, string $email, string $senha): bool
    {
        $sql = "INSERT INTO login_usuario (nome, email, senha)
                VALUES (?, ?, ?)";

        // Prepara o comando SQL para receber os dados.
        $stmt = $this->pdo->prepare($sql);

        // Envia os dados e executa o cadastro.
        return $stmt->execute([$nome, $email, $senha]);
    }

    // Verifica se existe um usuário com o nome e senha informados.
    public function autenticar(string $nome, string $senha): array|false
    {
        $sql = "SELECT * FROM login_usuario
                WHERE nome = ? AND senha = ?";

        // Prepara a consulta para receber os dados com segurança.
        $stmt = $this->pdo->prepare($sql);

        // Envia nome e senha para a consulta.
        $stmt->execute([$nome, $senha]);

        // Retorna os dados do usuário ou false se não encontrar.
        return $stmt->fetch();
    }
}
?>
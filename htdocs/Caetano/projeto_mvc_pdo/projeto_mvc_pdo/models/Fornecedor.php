<?php
// Model responsável por acessar e alterar os dados da tabela fornecedor.

class Fornecedor
{
    private PDO $pdo;

    // Recebe a conexão com o banco e guarda em $pdo.
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Busca todos os fornecedores cadastrados.
    public function listar(): array
    {
        $sql = "SELECT id, nomeFornecedor, email, telefone
                FROM fornecedor ORDER BY id DESC";

        // Executa o SQL e retorna todos os registros encontrados.
        return $this->pdo->query($sql)->fetchAll();
    }

    // Busca um único fornecedor pelo seu ID.
    public function buscarPorId(int $id): array|false
    {
        $sql = "SELECT id, nomeFornecedor, email, telefone
                FROM fornecedor WHERE id = ?";

        // Prepara o SQL para receber o ID com segurança.
        $stmt = $this->pdo->prepare($sql);

        // Envia o ID para o comando SQL.
        $stmt->execute([$id]);

        // Retorna o fornecedor encontrado ou false se não existir.
        return $stmt->fetch();
    }

    // Cadastra um novo fornecedor no banco.
    public function cadastrar(
        string $nomeFornecedor,
        string $email,
        string $telefone
    ): bool {
        $sql = "INSERT INTO fornecedor
                (nomeFornecedor, email, telefone)
                VALUES (?, ?, ?)";

        // Prepara o comando INSERT.
        $stmt = $this->pdo->prepare($sql);

        // Envia os valores e executa o cadastro.
        return $stmt->execute([
            $nomeFornecedor,
            $email,
            $telefone
        ]);
    }

    // Atualiza os dados de um fornecedor existente.
    public function atualizar(
        int $id,
        string $nomeFornecedor,
        string $email,
        string $telefone
    ): bool {
        $sql = "UPDATE fornecedor
                SET nomeFornecedor = ?, email = ?, telefone = ?
                WHERE id = ?";

        // Prepara o comando UPDATE.
        $stmt = $this->pdo->prepare($sql);

        // Envia os novos valores e o ID do fornecedor.
        return $stmt->execute([
            $nomeFornecedor,
            $email,
            $telefone,
            $id
        ]);
    }

    // Exclui um fornecedor pelo ID.
    public function deletar(int $id): bool
    {
        // Prepara o comando DELETE para o ID informado.
        $stmt = $this->pdo->prepare("DELETE FROM fornecedor WHERE id = ?");

        // Executa a exclusão.
        return $stmt->execute([$id]);
    }
}
?>
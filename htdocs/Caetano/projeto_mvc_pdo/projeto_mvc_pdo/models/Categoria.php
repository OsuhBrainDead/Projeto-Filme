<?php
// Model responsável por acessar e alterar os dados da tabela categorias.

class Categoria
{
    private PDO $pdo;

    // Recebe a conexão com o banco e guarda em $pdo.
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Busca todas as categorias cadastradas.
    public function listar(): array
    {
        $sql = "SELECT id, nomeMarca, descricao, paisOrigem, statuss
                FROM categorias ORDER BY id DESC";

        // Executa o SQL e retorna todos os registros encontrados.
        return $this->pdo->query($sql)->fetchAll();
    }

    // Busca uma única categoria pelo seu ID.
    public function buscarPorId(int $id): array|false
    {
        $sql = "SELECT id, nomeMarca, descricao, paisOrigem, statuss
                FROM categorias WHERE id = ?";

        // Prepara o SQL para receber o ID com segurança.
        $stmt = $this->pdo->prepare($sql);

        // Envia o ID para o comando SQL.
        $stmt->execute([$id]);

        // Retorna a categoria encontrada ou false se não existir.
        return $stmt->fetch();
    }

    // Cadastra uma nova categoria no banco.
    public function cadastrar(
        string $nomeMarca,
        string $descricao,
        string $paisOrigem,
        int $statuss
    ): bool {
        $sql = "INSERT INTO categorias
                (nomeMarca, descricao, paisOrigem, statuss)
                VALUES (?, ?, ?, ?)";

        // Prepara o comando INSERT.
        $stmt = $this->pdo->prepare($sql);

        // Envia os valores e executa o cadastro.
        return $stmt->execute([
            $nomeMarca,
            $descricao,
            $paisOrigem,
            $statuss
        ]);
    }

    // Atualiza os dados de uma categoria existente.
    public function atualizar(
        int $id,
        string $nomeMarca,
        string $descricao,
        string $paisOrigem,
        int $statuss
    ): bool {
        $sql = "UPDATE categorias
                SET nomeMarca = ?, descricao = ?, paisOrigem = ?, statuss = ?
                WHERE id = ?";

        // Prepara o comando UPDATE.
        $stmt = $this->pdo->prepare($sql);

        // Envia os novos valores e o ID da categoria.
        return $stmt->execute([
            $nomeMarca,
            $descricao,
            $paisOrigem,
            $statuss,
            $id
        ]);
    }

    // Exclui uma categoria pelo ID.
    public function deletar(int $id): bool
    {
        // Prepara o comando DELETE para o ID informado.
        $stmt = $this->pdo->prepare("DELETE FROM categorias WHERE id = ?");

        // Executa a exclusão.
        return $stmt->execute([$id]);
    }
}
?>
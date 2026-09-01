<?php
// Model responsável por acessar e alterar os dados da tabela produtos.

class Produto
{
    private PDO $pdo;

    // Recebe a conexão com o banco e guarda em $pdo.
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Busca todos os produtos cadastrados.
    public function listar(): array
    {
        $sql = "SELECT 
                    produtos.id,
                    produtos.nomeProduto,
                    produtos.valor,
                    produtos.precoUnitario,
                    produtos.quantidade,
                    produtos.fornecedor_id,
                    fornecedor.nomeFornecedor
                FROM produtos
                INNER JOIN fornecedor
                    ON produtos.fornecedor_id = fornecedor.id
                ORDER BY produtos.id DESC";

        // Executa o SQL e retorna todos os registros encontrados.
        return $this->pdo->query($sql)->fetchAll();
    }

    // Busca um único produto pelo seu ID.
    public function buscarPorId(int $id): array|false
    {
        $sql = "SELECT id, nomeProduto, valor, precoUnitario, quantidade
                FROM produtos WHERE id = ?";

        // Prepara o SQL para receber o ID com segurança.
        $stmt = $this->pdo->prepare($sql);

        // Envia o ID para o comando SQL.
        $stmt->execute([$id]);

        // Retorna o produto encontrado ou false se não existir.
        return $stmt->fetch();
    }

    // Cadastra um novo produto no banco.
    public function cadastrar(
        string $nomeProduto,
        string $valor,
        string $precoUnitario,
        int $quantidade
    ): bool {
        $sql = "INSERT INTO produtos
                (nomeProduto, valor, precoUnitario, quantidade)
                VALUES (?, ?, ?, ?)";

        // Prepara o comando INSERT.
        $stmt = $this->pdo->prepare($sql);

        // Envia os valores e executa o cadastro.
        return $stmt->execute([
            $nomeProduto,
            $valor,
            $precoUnitario,
            $quantidade
        ]);
    }

    // Atualiza os dados de um produto existente.
    public function atualizar(
        int $id,
        string $nomeProduto,
        string $valor,
        string $precoUnitario,
        int $quantidade
    ): bool {
        $sql = "UPDATE produtos
                SET nomeProduto = ?, valor = ?, precoUnitario = ?, quantidade = ?
                WHERE id = ?";

        // Prepara o comando UPDATE.
        $stmt = $this->pdo->prepare($sql);

        // Envia os novos valores e o ID do produto.
        return $stmt->execute([
            $nomeProduto,
            $valor,
            $precoUnitario,
            $quantidade,
            $id
        ]);
    }

    // Exclui um produto pelo ID.
    public function deletar(int $id): bool
    {
        // Prepara o comando DELETE para o ID informado.
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = ?");

        // Executa a exclusão.
        return $stmt->execute([$id]);
    }
}
?>
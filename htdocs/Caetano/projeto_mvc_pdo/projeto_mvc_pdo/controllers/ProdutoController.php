<?php
// Controller responsável por receber as ações e ligar Model e View.

require_once __DIR__ . "/../models/Produto.php";

class ProdutoController
{
    private Produto $produto;

    // Cria o Model e passa a conexão com o banco.
    public function __construct(PDO $pdo)
    {
        $this->produto = new Produto($pdo);
    }

    // Busca os produtos no Model e envia para a View.
    public function index(): void
    {
        $produtos = $this->produto->listar();
        require __DIR__ . "/../views/produtos/listar.php";
    }

    // Abre a página com o formulário de cadastro.
    public function criar(): void
    {
        require __DIR__ . "/../views/produtos/cadastrar.php";
    }

    // Recebe os dados do formulário e envia para o Model cadastrar.
    public function salvar(): void
    {
        $nomeProduto = trim($_POST["nomeProduto"] ?? "");
        $valor = trim($_POST["valor"] ?? "");
        $precoUnitario = trim($_POST["precoUnitario"] ?? "");
        $quantidade = intval($_POST["quantidade"] ?? 0);

        // Verifica se os campos obrigatórios foram preenchidos.
        if ($nomeProduto === "" || $valor === "" || $precoUnitario === "") {
            die("Preencha todos os campos do produto.");
        }

        // Envia os dados para o Model realizar o cadastro.
        $this->produto->cadastrar(
            $nomeProduto,
            $valor,
            $precoUnitario,
            $quantidade
        );

        // Volta para a página de listagem após o cadastro.
        header("Location: index.php?acao=produtos");
        exit;
    }

    // Busca o produto pelo ID e abre a View de edição.
    public function editar(): void
    {
        $id = intval($_GET["id"] ?? 0);

        // Verifica se o ID informado é válido.
        if ($id <= 0) {
            die("ID inválido.");
        }

        // Busca no banco os dados do produto.
        $produto = $this->produto->buscarPorId($id);

        // Verifica se o produto realmente existe.
        if (!$produto) {
            die("Produto não encontrado.");
        }

        // Envia os dados encontrados para a página de edição.
        require __DIR__ . "/../views/produtos/editar.php";
    }

    // Recebe os dados alterados e envia para o Model atualizar.
    public function atualizar(): void
    {
        $id = intval($_POST["id"] ?? 0);
        $nomeProduto = trim($_POST["nomeProduto"] ?? "");
        $valor = trim($_POST["valor"] ?? "");
        $precoUnitario = trim($_POST["precoUnitario"] ?? "");
        $quantidade = intval($_POST["quantidade"] ?? 0);

        // Verifica se o ID e o nome foram informados corretamente.
        if ($id <= 0 || $nomeProduto === "") {
            die("Dados inválidos para atualização.");
        }

        // Envia os novos dados para o Model atualizar no banco.
        $this->produto->atualizar(
            $id,
            $nomeProduto,
            $valor,
            $precoUnitario,
            $quantidade
        );

        // Volta para a listagem após a atualização.
        header("Location: index.php?acao=produtos");
        exit;
    }

    // Recebe o ID e solicita ao Model a exclusão do produto.
    public function deletar(): void
    {
        $id = intval($_GET["id"] ?? 0);

        // Verifica se o ID informado é válido.
        if ($id <= 0) {
            die("ID inválido.");
        }

        // Envia o ID para o Model excluir o produto.
        $this->produto->deletar($id);

        // Volta para a listagem após a exclusão.
        header("Location: index.php?acao=produtos");
        exit;
    }
}
?>
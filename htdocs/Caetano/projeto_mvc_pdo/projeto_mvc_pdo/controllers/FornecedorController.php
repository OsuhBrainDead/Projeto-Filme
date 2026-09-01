<?php
/*Recebe as ações e liga Model e View.*/

require_once __DIR__ . "/../models/Fornecedor.php";

class FornecedorController
{
    private Fornecedor $fornecedor;

    // Cria o Model e entrega a ele a conexão PDO.
    public function __construct(PDO $pdo)
    {
        $this->fornecedor = new Fornecedor($pdo);
    }

    // Lista os fornecedores e chama a View.
    public function index(): void
    {
        // Alterado de $fornecedor para $fornecedores para corresponder à View
        $fornecedores = $this->fornecedor->listar();
        require __DIR__ . "/../views/fornecedor/listar.php";
    }

    // Exibe o formulário de cadastro.
    public function criar(): void
    {
        require __DIR__ . "/../views/fornecedor/cadastrar.php";
    }

    // Recebe POST e manda os dados para o Model.
    public function salvar(): void
    {
        $nomeFornecedor = trim($_POST["nomeFornecedor"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $telefone = trim($_POST["telefone"] ?? "");

        if ($nomeFornecedor === "" || $email === "" || $telefone === "") {
            die("Preencha todos os campos do fornecedor.");
        }

        $this->fornecedor->cadastrar(
            $nomeFornecedor,
            $email,
            $telefone
        );

        // Redireciona para a listagem.
        header("Location: index.php?acao=fornecedor");
        exit;
    }

    // Busca o fornecedor e envia para a View de edição.
    public function editar(): void
    {
        $id = intval($_GET["id"] ?? 0);

        if ($id <= 0) {
            die("ID inválido.");
        }

        $fornecedor = $this->fornecedor->buscarPorId($id);

        if (!$fornecedor) {
            die("Fornecedor não encontrado.");
        }

        require __DIR__ . "/../views/fornecedor/editar.php";
    }

    // Atualiza os dados recebidos pelo formulário.
    public function atualizar(): void
    {
        $id = intval($_POST["id"] ?? 0);
        $nomeFornecedor = trim($_POST["nomeFornecedor"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $telefone = trim($_POST["telefone"] ?? "");

        if ($id <= 0 || $nomeFornecedor === "") {
            die("Dados inválidos para atualização.");
        }

        $this->fornecedor->atualizar(
            $id,
            $nomeFornecedor,
            $email,
            $telefone
        );

        header("Location: index.php?acao=fornecedor");
        exit;
    }

    // Exclui o fornecedor indicado pelo ID.
    public function deletar(): void
    {
        $id = intval($_GET["id"] ?? 0);

        if ($id <= 0) {
            die("ID inválido.");
        }

        $this->fornecedor->deletar($id);

        header("Location: index.php?acao=fornecedor");
        exit;
    }
}
?>
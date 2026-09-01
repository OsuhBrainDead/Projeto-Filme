<?php
// Controller responsável por receber as ações e ligar Model e View.

require_once __DIR__ . "/../models/Categoria.php";

class CategoriaController
{
    private Categoria $categoria;

    // Cria o Model e passa a conexão com o banco.
    public function __construct(PDO $pdo)
    {
        $this->categoria = new Categoria($pdo);
    }

    // Busca as categorias no Model e envia para a View.
    public function index(): void
    {
        $categorias= $this->categoria->listar();
        require __DIR__ . "/../views/categorias/listar.php";
    }

    // Abre a página com o formulário de cadastro.
    public function criar(): void
    {
        require __DIR__ . "/../views/categorias/cadastrar.php";
    }

    // Recebe os dados do formulário e envia para o Model cadastrar.
    public function salvar(): void
    {
        $nomeMarca = trim($_POST["nomeMarca"] ?? "");
        $descricao = trim($_POST["descricao"] ?? "");
        $paisOrigem = trim($_POST["paisOrigem"] ?? "");
        $statuss = intval($_POST["statuss"] ?? 0); // Nota: verifique se o nome correto do campo no HTML/BD não é apenas 'status'

        // Verifica se os campos obrigatórios foram preenchidos.
        if ($nomeMarca === "" || $descricao === "" || $paisOrigem === "") {
            die("Preencha todos os campos da categoria.");
        }

        // Envia os dados para o Model realizar o cadastro.
        $this->categoria->cadastrar(
            $nomeMarca,
            $descricao,
            $paisOrigem,
            $statuss
        );

        // Volta para a página de listagem após o cadastro.
        header("Location: index.php?acao=categorias");
        exit;
    }

    // Busca a categoria pelo ID e abre a View de edição.
    public function editar(): void
    {
        $id = intval($_GET["id"] ?? 0);

        // Verifica se o ID informado é válido.
        if ($id <= 0) {
            die("ID inválido.");
        }

        // Busca no banco os dados da categoria.
        $categoria = $this->categoria->buscarPorId($id);

        // Verifica se a categoria realmente existe.
        if (!$categoria) {
            die("Categoria não encontrada.");
        }

        // Envia os dados encontrados para a página de edição.
        require __DIR__ . "/../views/categorias/editar.php";
    }

    // Recebe os dados alterados e envia para o Model atualizar.
    public function atualizar(): void
    {
        $id = intval($_POST["id"] ?? 0);
        $nomeMarca = trim($_POST["nomeMarca"] ?? "");
        $descricao = trim($_POST["descricao"] ?? "");
        $paisOrigem = trim($_POST["paisOrigem"] ?? "");
        $statuss = intval($_POST["statuss"] ?? 0);

        // Verifica se o ID e o nome foram informados corretamente.
        if ($id <= 0 || $nomeMarca === "") {
            die("Dados inválidos para atualização.");
        }

        // Envia os novos dados para o Model atualizar no banco.
        $this->categoria->atualizar(
            $id,
            $nomeMarca,
            $descricao,
            $paisOrigem,
            $statuss
        );

        // Volta para a listagem após a atualização.
        header("Location: index.php?acao=categorias");
        exit;
    }

    // Recebe o ID e solicita ao Model a exclusão da categoria.
    public function deletar(): void
    {
        $id = intval($_GET["id"] ?? 0);

        // Verifica se o ID informado é válido.
        if ($id <= 0) {
            die("ID inválido.");
        }

        // Envia o ID para o Model excluir a categoria.
        $this->categoria->deletar($id);

        // Volta para a listagem após a exclusão.
        header("Location: index.php?acao=categorias");
        exit;
    }
}
?>
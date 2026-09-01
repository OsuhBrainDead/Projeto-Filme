<?php
/**
 * FRONT CONTROLLER / PONTO DE ENTRADA
 * Todas as ações passam por este arquivo.
 */

session_start();

require_once __DIR__ . "/config/conexao.php";
require_once __DIR__ . "/controllers/ProdutoController.php";
require_once __DIR__ . "/controllers/UsuarioController.php";
require_once __DIR__ . "/controllers/CategoriaController.php";
require_once __DIR__ . "/controllers/FornecedorController.php";

$acao = $_GET["acao"] ?? "inicio";

$produtoController = new ProdutoController($pdo);
$usuarioController = new UsuarioController($pdo);
$categoriaController = new CategoriaController($pdo);
$fornecedorController = new FornecedorController($pdo);

switch ($acao) {
    case "produtos":
        $produtoController->index();
        break;

    case "produto_novo":
        $produtoController->criar();
        break;

    case "produto_salvar":
        $produtoController->salvar();
        break;

    case "produto_editar":
        $produtoController->editar();
        break;

    case "produto_atualizar":
        $produtoController->atualizar();
        break;

    case "produto_deletar":
        $produtoController->deletar();
        break;

    case "usuario_novo":
        $usuarioController->cadastrar();
        break;

    case "usuario_salvar":
        $usuarioController->salvar();
        break;

    case "login":
        $usuarioController->login();
        break;

    case "autenticar":
        $usuarioController->autenticar();
        break;

    case "inicio":
        $usuarioController->inicio();
        break;

    case "sair":
        $usuarioController->sair();
        break;

    case "categorias" :
        $categoriaController->index();
        break;

    case "categoria_novo" :
        $categoriaController->criar();
        break;

    case "categoria_salvar" :
        $categoriaController->salvar();
        break;

    case "categoria_editar" :
        $categoriaController->editar();
        break;

    case "categoria_atualizar" :
        $categoriaController->atualizar();
        break;

    case "categoria_deletar" :
        $categoriaController->deletar();
        break;

    case "fornecedor":
        $fornecedorController->index();
        break;
    
    case "fornecedor_novo":
        $fornecedorController->criar();
        break;
    
    case "fornecedor_salvar":
        $fornecedorController->salvar();
        break;
    
    case "fornecedor_editar":
        $fornecedorController->editar();
        break;
    
    case "fornecedor_atualizar":
        $fornecedorController->atualizar();
        break;
    
    case "fornecedor_deletar":
        $fornecedorController->deletar();
        break; 

    default:
        die("Ação não encontrada.");
}
?>

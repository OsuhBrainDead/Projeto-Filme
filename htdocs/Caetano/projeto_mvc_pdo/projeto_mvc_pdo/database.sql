-- =========================================================
-- BANCO DE DADOS - PROJETO MVC + POO + PDO
-- =========================================================

CREATE DATABASE IF NOT EXISTS mvc_pdo
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE prof_leticia;

-- =========================================================
-- TABELA: produtos
-- Campos solicitados:
-- nomeProduto
-- valor
-- precoUnitario
-- quantidade
-- =========================================================

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduto VARCHAR(255) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    precoUnitario DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL
);

-- =========================================================
-- TABELA: login_usuario
-- Mantida para o sistema de cadastro/login.
-- =========================================================

CREATE TABLE IF NOT EXISTS login_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- =========================================================
-- IMPORTANTE:
-- Nenhum INSERT foi incluído.
-- O banco será criado sem dados.
-- =========================================================

CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomeMarca VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    paisOrigem VARCHAR(100) NOT NULL,
    statuss TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

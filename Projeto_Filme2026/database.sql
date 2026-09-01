-- Criando o banco de dados 'Filme' se ele ainda não existir,
-- garantindo suporte completo a acentos e caracteres especiais (utf8mb4)
CREATE DATABASE IF NOT EXISTS Filme
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- Selecionando o banco de dados 'Filme' para os comandos seguintes
USE Filme;

-- =========================================================
-- TABELA DE USUÁRIOS
-- =========================================================
CREATE TABLE IF NOT EXISTS login_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- ID único e autoincrementável do usuário
    nome VARCHAR(255) NOT NULL,                 -- Nome do usuário (obrigatório)
    email VARCHAR(255) NOT NULL UNIQUE,         -- E-mail de acesso (único para evitar duplicatas)
    senha VARCHAR(255) NOT NULL,                -- Hash da senha do usuário
    mensalidade BOOLEAN DEFAULT FALSE           -- Status do plano (TRUE = pago / FALSE = pendente)
);

-- =========================================================
-- TABELA DE CATÁLOGO / CATEGORIAS
-- =========================================================
CREATE TABLE IF NOT EXISTS catalogo (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- ID único de cada categoria/gênero
    nomeCategoria VARCHAR(100) NOT NULL         -- Nome da categoria (ex: Ação, Drama, Comédia)
);

-- =========================================================
-- TABELA DE FILMES
-- =========================================================
CREATE TABLE IF NOT EXISTS filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- ID único de cada filme
    nomeFilme VARCHAR(255) NOT NULL,            -- Título do filme
    descricao TEXT NOT NULL,                    -- Sinopse (TEXT permite descrições mais longas que 255 chars)
    dataLancamento DATE NOT NULL,               -- Data de lançamento no formato YYYY-MM-DD
    catalogo_id INT NOT NULL,                   -- Coluna que armazenará o ID da categoria (Chave Estrangeira)
    
    -- Definição da Chave Estrangeira (Foreign Key):
    -- Relaciona 'catalogo_id' desta tabela com o 'id' da tabela 'catalogo'
    CONSTRAINT fk_filmes_catalogo 
        FOREIGN KEY (catalogo_id) 
        REFERENCES catalogo(id) 
        ON DELETE CASCADE                       -- Se excluir a categoria, deleta os filmes vinculados a ela
        ON UPDATE CASCADE                       -- Se alterar o ID da categoria, atualiza aqui automaticamente
);
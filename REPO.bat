@echo off
echo Criando estrutura MVC...
echo.
set /p nome_projeto="Digite o nome do projeto: "
echo.

rem 1. Criar a pasta raiz e acessar
mkdir %nome_projeto%
cd %nome_projeto%

rem 2. Criar subpastas
mkdir config
mkdir controllers
mkdir models
mkdir assets
mkdir views

rem 3. Criar arquivos na raiz
type nul > index.php
type nul > database.sql
echo Projeto: CRUD Produtos PHP MVC > README.md
echo Tecnologias: PHP, PDO, MySQL, MVC >> README.md


echo Projeto criado com sucesso!
pause
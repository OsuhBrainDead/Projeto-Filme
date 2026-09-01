PROJETO MVC + POO + PDO

VERSÃO COM NOVOS ATRIBUTOS DE PRODUTO

Campos da tabela produtos:
- id
- nomeProduto
- valor
- precoUnitario
- quantidade

Campos da tabela login_usuario:
- id
- nome
- email
- senha

COMO EXECUTAR:

1. Copie a pasta para:
   C:\xampp\htdocs\

2. Ligue Apache e MySQL no XAMPP.

3. Abra:
   http://localhost/phpmyadmin

4. Importe o arquivo:
   database.sql

5. Acesse:
   http://localhost/projeto_mvc_pdo_atributos_produto/

ESTRUTURA MVC:

config/
    conexao.php

models/
    Produto.php
    Usuario.php

controllers/
    ProdutoController.php
    UsuarioController.php

views/
    produtos/
    usuarios/
    auth/

index.php
    Front Controller / ponto de entrada.

FLUXO:

Navegador
    ↓
index.php
    ↓
Controller
    ↓
Model
    ↓
PDO
    ↓
MySQL

No retorno:

MySQL
    ↓
Model
    ↓
Controller
    ↓
View
    ↓
Navegador

OBSERVAÇÃO DIDÁTICA:

A senha foi mantida como texto simples para preservar a proposta
original do projeto. Em um projeto de produção, recomenda-se usar
password_hash() e password_verify().

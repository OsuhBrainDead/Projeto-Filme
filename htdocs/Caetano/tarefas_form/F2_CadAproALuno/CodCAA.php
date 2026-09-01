<?php
    $nome_aluno = $_POST["nome"];
    $nota1_aluno = $_POST["nota1"];
    $nota2_aluno = $_POST["nota2"];

    $media = ($nota1_aluno + $nota2_aluno) / 2;
    $situacao = "";
    if ($media >= 7) {
        $situacao = "APROVADO";
    }
    elseif ($media < 7) {
        $situacao = "REPROVADO";
    }

    echo $nome_aluno . " sua situação é: " . $situacao;
?>
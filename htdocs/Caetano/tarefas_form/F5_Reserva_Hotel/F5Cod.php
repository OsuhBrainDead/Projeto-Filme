<?php

    $nome = $_POST["nome"];
    $diarias = $_POST["diarias"];
    $valor = $_POST["valor"];

    $Caluculo_diarias = $diarias * $valor;

    if ($diarias > 6) {

        $desconto = $Caluculo_diarias * 0.15;
        $total_final = $Caluculo_diarias - $desconto;

        echo "Hóspede: " . $nome;
        echo "Diárias: " . $diarias;
        echo "Total diárias: " . $total_final;

    }

    echo "Hóspede: " . $nome ."<br>"; 
    echo "Diárias: " . $diarias ."<br>";
    echo "Total diárias: " . $Caluculo_diarias ."<br>";
?>
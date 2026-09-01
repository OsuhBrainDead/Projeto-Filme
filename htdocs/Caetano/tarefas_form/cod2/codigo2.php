<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $idade = $_POST["idade"];
        $verificar_idade = $idade;

        if ($idade <= 17) {
            echo "<p>Você é menor de idade</p>";
        }
        elseif ($idade >= 18) {
            echo "<p>Você é maior de idade</p>";
        }
        else{
            echo "<p>digite algo..</p>";
        }
    }

?>
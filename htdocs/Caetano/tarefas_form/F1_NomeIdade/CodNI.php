<?php

    $idade = $_POST["idade"];

    if ($idade >= 16) {
        echo "Você pode votar nas eleições";
    }
    else {
        echo "Você não pode votar nas eleições";
    }
?>
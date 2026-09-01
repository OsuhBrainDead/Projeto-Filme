<?php
    
    $number = $_POST["number"];

    if ($number > 0) {
        echo "Positivo";
    } elseif ($number < 0) {
        echo "Negativo";
    } else {
        echo "Zero";
    }

?>
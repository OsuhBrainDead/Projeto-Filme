<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocContagem de 1 até 20</title>
</head>
<body>
    <p>Contagem de 1 até 20</p>
</body>
</html>

<?php
    
    for ($i=1; $i < 21 ; $i++) { 
        if ($i % 2 == 0) {
            echo "$i<br>";
        }
    }
?>
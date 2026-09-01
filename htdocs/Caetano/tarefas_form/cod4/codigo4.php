<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="codigo4.php"></form>
    <p>== Tabuada do 5 ==</p>
</body>
</html>

<?php
for ($i=0; $i < 11; $i++) { 
    $numero = $i * 5;
    echo "5 x $i = $numero<br>";
}
?>
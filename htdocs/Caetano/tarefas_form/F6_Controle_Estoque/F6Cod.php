<?php
if (isset($_POST['enviar'])) {
    $produto = $_POST['produto'];
    $quantidade = (int) $_POST['quantidade'];

    if ($quantidade < 10) {
        $status = "Repor estoque";
    } else {
        $status = "Estoque adequado";
    }

    echo "<h3>Resultado</h3>";
    echo "Produto: " . $produto . "<br>";
    echo "Quantidade: " . $quantidade . "<br>";
    echo "Status: " . $status;
}
?>
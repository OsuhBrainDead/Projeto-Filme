<?php
if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $salario_base = (float) $_POST['salario_base'];
    $horas_extras = (int) $_POST['horas_extras'];

    $valor_hora_extra = 25;
    $total_extras = $horas_extras * $valor_hora_extra;
    $salario_final = $salario_base + $total_extras;

    echo "<h3>Dados do Funcionário</h3>";
    echo "Nome: " . $nome . "<br>";
    echo "Salário base: R$ " . number_format($salario_base, 2, ',', '.') . "<br>";
    echo "Horas extras: " . $horas_extras . "<br>";
    echo "Valor das horas extras: R$ " . number_format($total_extras, 2, ',', '.') . "<br>";
    echo "Salário final: R$ " . number_format($salario_final, 2, ',', '.');
}
?>
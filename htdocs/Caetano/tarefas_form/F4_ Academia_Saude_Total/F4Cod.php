    <?php
    if (isset($_POST['enviar'])) {
        $nome = $_POST['nome'];
        $peso = (float) $_POST['peso'];
        $altura = (float) $_POST['altura'];

        $imc = $peso / ($altura * $altura);

        if ($imc < 18.5) {
            $situacao = "Abaixo do peso";
        } elseif ($imc <= 24.9) {
            $situacao = "Peso normal";
        } else {
            $situacao = "Acima do peso";
        }

        echo "<h3>Resultado</h3>";
        echo "Nome: " . $nome . "<br>";
        echo "IMC: " . number_format($imc, 2, ',', '.') . "<br>";
        echo "Situação: " . $situacao;
    }
    ?>
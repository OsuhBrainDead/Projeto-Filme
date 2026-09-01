
    <?php
    if (isset($_POST['enviar'])) {
        $produto = $_POST['produto'];
        $quantidade = (int) $_POST['quantidade'];
        $valor_unitario = (float) $_POST['valor_unitario'];

        $total = $quantidade * $valor_unitario;

        if ($total > 500) {
            $desconto = $total * 0.10;
            $total_final = $total - $desconto;
        } else {
            $desconto = 0;
            $total_final = $total;
        }

        echo "<h3>Resultado da Compra</h3>";
        echo "Produto: " . $produto . "<br>";
        echo "Quantidade: " . $quantidade . "<br>";
        echo "Valor unitário: R$ " . number_format($valor_unitario, 2, ',', '.') . "<br>";
        echo "Total bruto: R$ " . number_format($total, 2, ',', '.') . "<br>";

        if ($desconto > 0) {
            echo "Desconto aplicado (10%): R$ " . number_format($desconto, 2, ',', '.') . "<br>";
        } else {''
            echo "Sem desconto aplicado.<br>";
        }

        echo "<strong>Valor final: R$ " . number_format($total_final, 2, ',', '.') . "</strong>";
    }
    ?>
</body>
</html>
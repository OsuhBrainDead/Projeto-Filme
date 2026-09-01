<?php
function processa(int &$a, int &$b, int &$c) {
    if ($a > $b) {
        $c = $a - $b;
    } elseif ($a < $b) {
        $c = $b - $a;
    } else {
        $c = 0;
    }

    echo "Valor de A = " . $a . "\n";
    echo "Valor de B = " . $b . "\n";
    echo "Valor de C (resultado) = " . $c . "\n";
}

$x = 4;
$y = 8;
$z = 0;

processa($x, $y, $z);
?>
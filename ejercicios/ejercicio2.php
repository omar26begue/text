<?php
$numeros = array(66, 10, 18, 11, 21, 28, 31, 37, 40, 55, 60, 1);

$totalSuma = $numeros[0];
$cantidadElementos = $numeros[1];

$suma = 0;
$result = 0;

for ($i = 2; $i < $cantidadElementos; $i++) {
    for ($j = 3; $j < $cantidadElementos; $j++) {
        if ($i != $j) {
            if (($numeros[$i] + $numeros[$j]) == $totalSuma) {
                $result = 1;
            }
        }
    }
}

echo $result . "\n";


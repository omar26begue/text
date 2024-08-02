<?php

function imprimir($numero)
{
    if ($numero > 100 || $numero < 1) {
        echo "Numero invalido"."\n";
    } else {
        for ($i = 1; $i <= $numero; $i++) {
            echo str_repeat(" ", $numero - $i).str_repeat("#", $i)."\n";
        }
    }
}

// Numero para cambiar para mostrar
imprimir(95);
?>
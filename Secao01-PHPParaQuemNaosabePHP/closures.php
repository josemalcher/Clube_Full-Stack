<?php
$contador = 0;
$incrementar = function() use (&$contador) {
    $contador++;
};

$incrementar();
$incrementar();
$incrementar();
$incrementar();
$incrementar();
echo $contador; // Saída: 2

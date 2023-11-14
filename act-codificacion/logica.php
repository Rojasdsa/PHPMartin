<?php

$arrayLetras = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
$inputCadena = $_POST["nombre"];
$stringModificado = "";

for ($i = 0; $i < strlen($inputCadena); $i++) {

    $posCadena = array_search($inputCadena[$i], $arrayLetras);
    $valorLetra = $arrayLetras[$posCadena + 13];
    $stringModificado .= $valorLetra;
}

echo ("<h1>" . $stringModificado . "</h1>");

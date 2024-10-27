<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

// CASE-SENSITIVE:

$cadena = "ejemplo de texto";
$mayusculas = strtoupper($cadena);
$minusculas = strtolower($cadena);
$primeraMayuscula = ucfirst($cadena);


//substring

//string substr(string $string, int $start, ?int $length = null); 

//tienen la misma longitud??
$resultado = strcmp($string1, $string2);


//comprobar el tipo de valor
if (is_string($var)){}
if (is_numeric($var)){}
if (is_array($var)){}


if (preg_match("[A-Z]", $cadena)){}







?> 
</body>
</html>
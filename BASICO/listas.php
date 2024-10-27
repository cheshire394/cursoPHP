<?php
// Definición de un array indexado
$frutas = array("manzana", "banana", "cereza");

// Añadir un elemento al final del array
array_push($frutas, "naranja");
print_r($frutas);

// Eliminar el último elemento del array
array_pop($frutas);
print_r($frutas);

// Añadir un elemento al inicio del array
array_unshift($frutas, "mango");
print_r($frutas);

// Eliminar el primer elemento del array
array_shift($frutas);
print_r($frutas);

//tamaño del array
$longitud = count($frutas); 


// Obtener un elemento del array (por índice)
echo $frutas[1] . "\n";


// Recortar un array (similar a slice en JavaScript)
$frutas_recortadas = array_slice($frutas, 1, 2);
print_r($frutas_recortadas);

// Dividir un string en un array (similar a split en JavaScript)
$cadena = "uno,dos,tres,cuatro";
$array_cadena = explode(",", $cadena);
print_r($array_cadena);

// Unir elementos de un array en un string (similar a join en JavaScript)
$cadena_unida = implode("-", $array_cadena);
echo $cadena_unida . "\n";

// Ordenar un array (sort)
sort($frutas);
print_r($frutas);

// Ordenar un array en orden inverso (rsort)
rsort($frutas);
print_r($frutas);

//COMPROBAR SI EXISTE UN ELEMENTO: 


$array = array("manzana", "banana", "naranja");

if (in_array("banana", $array)) {
    echo "¡La banana está en el array!"; // Salida: ¡La banana está en el array!
} else {
    echo "La banana no está en el array.";
}


$array2 = array(10 => "manzana", 20 => "banana", 30 => "naranja");

$clave = array_search("banana", $array2);
if ($clave !== false) {
    echo "¡La banana está en el array con la clave $clave!"; // Salida: ¡La banana está en el array con la clave 20!
} else {
    echo "La banana no está en el array.";
}






// Definición de un array asociativo
$edades = array(
    "Juan" => 25,
    "Ana" => 30,
    "Pedro" => 35
);

count($edades); // 3

// Obtener un elemento del array (por índice)
echo $edades["Ana"] . "\n";

// Añadir un elemento al array asociativo
$edades["Laura"] = 28;
print_r($edades);

// Eliminar un elemento del array asociativo
unset($edades["Pedro"]);
print_r($edades);

// Comprobar si un índice existe en el array asociativo
if (array_key_exists("Ana", $edades)) {
    echo "Ana está en el array.\n";
}

// Obtener todos los valores de un array
$valores = array_values($edades);
print_r($valores);

// Obtener todos los índices de un array
$indices = array_keys($edades);
print_r($indices);

// Ordenar un array asociativo por valores (asort)
asort($edades);
print_r($edades);

// Ordenar un array asociativo por índices (ksort)
ksort($edades);
print_r($edades);
?>

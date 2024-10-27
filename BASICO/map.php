<?php

// Mapa de datos sencillos
$simpleMap = [
    "key1" => "value1",
    "key2" => "value2",
    "key3" => "value3"
];

// Mapa de datos tipo objetos
$objectMap = [
    "obj1" => (object) ["name" => "Object 1", "value" => 100],
    "obj2" => (object) ["name" => "Object 2", "value" => 200],
    "obj3" => (object) ["name" => "Object 3", "value" => 300]
];

// Obtener el valor de una llave
$keyToGet = "key1";
$value = $simpleMap[$keyToGet];
echo "Valor de $keyToGet: $value\n";

// Añadir un nuevo elemento al principio
array_unshift($simpleMap, "newValueStart");
echo "Mapa después de añadir al principio:\n";
print_r($simpleMap);

// Añadir un nuevo elemento al final
$simpleMap[] = "newValueEnd";
echo "Mapa después de añadir al final:\n";
print_r($simpleMap);

// Eliminar un elemento al principio
array_shift($simpleMap);
echo "Mapa después de eliminar al principio:\n";
print_r($simpleMap);

// Eliminar un elemento al final
array_pop($simpleMap);
echo "Mapa después de eliminar al final:\n";
print_r($simpleMap);

// Eliminar un elemento específico por su clave
$keyToRemove = "key2";
if (array_key_exists($keyToRemove, $simpleMap)) {
    unset($simpleMap[$keyToRemove]);
    echo "Mapa después de eliminar la llave '$keyToRemove':\n";
    print_r($simpleMap);
} else {
    echo "La llave '$keyToRemove' no existe en el mapa.\n";
}

// Obtener todas las llaves
$keys = array_keys($simpleMap);
echo "Llaves del mapa:\n";
print_r($keys);

// Obtener todos los valores
$values = array_values($simpleMap);
echo "Valores del mapa:\n";
print_r($values);

// Iterar con foreach
echo "Iterando con foreach:\n";
foreach ($simpleMap as $key => $value) {
    echo "Llave: $key, Valor: $value\n";
}

// Iterar sobre el mapa de objetos con foreach
echo "Iterando sobre el mapa de objetos con foreach:\n";
foreach ($objectMap as $key => $obj) {
    echo "Llave: $key, Nombre: {$obj->name}, Valor: {$obj->value}\n";
}

?>

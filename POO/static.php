<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include("concesionario.php"); 

$compra_Antonio = new Compra_vehiculo("compacto");

echo("EL precio final es: ".$compra_Antonio-> precioFinaStatic()."\n"); //la ayuda es de 100 euros porque solo usa un atributo static

//ahora usamos un metodo static cuya ayuda es mayor
Compra_vehiculo::descuento_gobierno(); 

//despues de ejecutar el metodo descuento gobierno.
echo("EL precio final es: ".$compra_Antonio-> precioFinaStatic(). "\n"); //la ayuda es de 100 euros porque solo usa un atributo static



?>
    
</body>
</html>
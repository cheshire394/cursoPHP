<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

//vamos a hacer filtrados a los empleados dependiendo las condiciones de filtrado: 


//PASO 1 ESTABLECER CONEXION CON LA BBDD

require("../rutaConexion.php"); //importamos la ruta a la BBDD



//creamos conexiones
$conexionPOO = new mysqli($host,$db_usuarios,$db_contraseña,$db_nombre);

if($conexionPOO -> connect_error){
    echo"Error al conectar con la BBDD con POO <br>";
}else{
    echo"Conexion POO realizada con exito<br>";
}



//PASO 2) RECOGER EL VALOR DEL FORMULARIO EN VARIABLES

//si esta vacio, declaralo nulo, si tiene argumento escapalos
$buscarApellido = empty($_GET["apellido"]) ? null : $conexionPOO-> real_escape_string($_GET["apellido"]);
$buscarOficio = empty($_GET["oficio"]) ? null : $conexionPOO-> real_escape_string($_GET["oficio"]);
$buscarSalario = empty($_GET["salario"]) ? null : floatval($_GET["salario"]); 
//floatavar es como un parseFLoat en php


//PASO 3) FORMULAR LA CONSULTA: 

$consulta = "SELECT EMP_NO,SALARIO,APELLIDO, OFICIO FROM EMPLE WHERE 1=1"; //busqueda dinamica 1=1 equivale a un AND 


$parametros = []; 
$types=""; 

if($buscarApellido){
    //es necesario concadenar con el .= y dejar un espacio en el " (SPACE)AND porque el numero de parametros es acumularivo

    $consulta .= " AND UPPER(APELLIDO) = UPPER(?)"; 
    $parametros[] = $buscarApellido; 
    $types .= 's'; 
}

if($buscarOficio){
    $consulta .= " AND UPPER(OFICIO) = UPPER(?)"; 
    $parametros[] = $buscarOficio; 
    $types .= 's';  // s porque es de tipo string
}

if($buscarSalario){
    $consulta = " AND SALARIO >= ?"; 
    $parametros[] = $buscarSalario; 
    $types .= 'd';  // d porque el dato es de tipo double
}


//PASO 4) PREPARAR LA CONSULTA: 
$preparadaPOO = $conexionPOO->prepare($consulta); 
if($preparadaPOO === false )  die("Error en la preparación de la consulta: " . $conexionPOO->error);


//PASO 5) VINCULAR EL PARAMETRO DE BUSQUEDA ?, DE LA COSULTA PREPARA

//$preparadaPOO->bind_param("s", $buscarPOO);  --> asi era para un parametro de busqueda

if(!empty($parametros)){
    $preparadaPOO-> bind_param($types,...$parametros); 
}


//PASO 6 EJECUTAR LA CONSULTA
$preparadaPOO->execute(); 


//PASO 7 OBTENEMOS RESULTADOS: 
$resultadoPOO = $preparadaPOO->get_result(); 



//IMPRIMIR LOS RESULTADOS: (PRIMERO COMPROBAR QUE HAYA FILAS DEVUELTAS)
if($resultadoPOO-> num_rows > 0){
    while($fila = $resultadoPOO->fetch_assoc()){

        echo "<pre>";
        echo "RESULTADO DE CONEXION CON POO: "; 
        echo "Número de empleado: " . $fila["EMP_NO"] . " | Apellido: " . $fila["APELLIDO"] . " | Salario: " . $fila["SALARIO"] ." || OFICIO; ". $fila["OFICIO"]. "<br>\n";
        echo "</pre>";
        
    }
} else {
    echo "No se encontraron resultados para la búsqueda: " . htmlspecialchars($busquedaPOO);
}


?> 
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión a una BBDD</title>
</head>
<body>

<?php
//autorizar para Mostrar errores en PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); //informa sobre el tipo de error


//los parametros deben de aparecer en este orden porque siguen una ruta.
$host = "localhost"; 
$db_usuarios = "alicia"; 
$db_contraseña = "passw0rd"; 
$db_nombre = "prueba";  //nombre de la bbdd


//existen dos formas de CREAR CONEXION con una BBDD una es con POO Y otra es con procedimientos$

//1 ) con procedimientos
    $conexion=mysqli_connect($host, $db_usuarios, $db_contraseña,$db_nombre); 


   //CUANDO EL NOMBRE DE LA BBDD NO ES CORRECTO, SE PUEDE CONTROLAR CON ESTA FUNCION

    //NOTA* EL NOMBRE DE LA BBDD NO SE DEBE ASIGNAR COMO PARAMETRO EN LA CONEXIÓN SI
    //UTILIZAMOS ESTE FORMATO SINO QUE SE DEBE DE ASIGNAR ASI:


    //NO FUNCIONA
// Seleccionar la base de datos
if (!mysqli_select_db($conexion, $db_nombre)) {
  die("NOOOOOOOOOOOOOOO SE ENCUENTA LA BBDD: " . mysqli_error($conexion));
}
 




    //si la conexion es exitosa no va a devolver un objeto con el contenido de esa
    //conexión. 
    //Sin embargo si la conexión es fallida nos devulve un boolean --> false.
    //que vamos a tratar en este bloque.

      //cuando la conexion es false.
      if(!$conexion){
        echo "La conexion a la BBDD de datos es fallida: "; 
        echo mysqli_connect_errno(); //devuelve el codigo de error
        echo mysqli_connect_error(); //devuelve detalles de ese error

        exit(); //si no hya conexión no trates de cargar lo demás
    }


    mysqli_set_charset($conexion, "utf8"); //PERMITIR QUE LOS DATOS CONTENGAN ACENTOS

  

    $consulta = "SELECT * FROM DATOSPERSONALES"; 
    $resultado = mysqli_query($conexion, $consulta); 




    function verResultado($resultado){
       

  // Crear un array con cada una de las filas devueltas en nuestra query
  $fila = mysqli_fetch_row($resultado);

  // Salir del bucle si no hay más filas
  if ($fila === null) {
      return;
  }

  // El foreach ejecuta cada una de las COLUMNAS que ha recogido
  foreach ($fila as $item) {
      echo htmlspecialchars($item) . " "; // Añadido htmlspecialchars para evitar problemas con caracteres especiales
  }

  echo "\n"; // Añadido salto de línea para mejor visualización de los resultados

  
        
    }
   //verResultado($resultado); 





?>
    
</body>
</html>
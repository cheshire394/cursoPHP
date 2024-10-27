

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion POO</title>

</head>
<body>

<?php



 //2) conexion con POO (+ recomendada)

    //EN una conexion con este formato, la variable conexión nunca almacenará un boolean 
    // si la conexión es fallida devuelve un objeto de tipo error.

// Mostrar errores en PHP

require("rutaConexion.php"); //importamos la ruta con los datos 

$conexion = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre);

// Comprobar si hay errores en la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$consulta= "select * from EMPLE"; 
$resultados = mysqli_query($conexion, $consulta); //conexion esta en el archivo requiere.


//muestra todos los datos fetch_row trabaja con los indices de un array
function verConsulta($resultados){
   
    echo "<pre>"; //estas etiquetas haden que los datos aparezcan ordenados tambien en el navegador
    
    // Bucle para recorrer todas las filas del resultado, --> RECUERDA QUE $FILA ES UN ARRAY DE FILAS DEVUELTAS POR NUESTA CONSULTA
    while($fila = mysqli_fetch_row($resultados)){

        // Recorre cada campo de la fila en la que se encuentra, SOLO ES RECOMENDABLE SI QUEREMOS IMPRIMIR TODOS LOS DATOS
        foreach($fila as $item){
          
            echo $item. " ";
        }
       
        echo "\n"; //salto de linea por consola
        echo "<br>"; //salto de linea por navegador
    }
    

    echo "</pre>";
}
//verConsulta($resultados);


//muestra los datos segun esten asociados a una tabla
function verResultadoArrayAsociativo($resultados){

    //EXISTEN VARIAS FORMAS DE TRABAJAR CON ARRAYS ASOCIATIVOS 
  
echo "<pre>"; 

    //PRIMERA FORMA DE TRABAJAR CON ARRAY ASOCIATIVOS
    echo "ARRAY ASOCIATIVO (por nombre de la columna): MYSQLI_FETCH_ARRAY(X, MYSQLI_ASSOC) \n"; 
    echo "<br>"; 
   while($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC)){

        echo $fila["EMP_NO"] . " " . $fila["APELLIDO"]; 
        echo "\n"; 
        echo "<br>"; 
   } 

   mysqli_data_seek($resultados, 0); // Reiniciar el cursor de resultados


   //SEGUNDA FORMA DE TRABAJAR CON ARRAY ASOCIATIVOS, ES LO MISMO QUE LO ANTERIOR, PERO OTRA FORMA DE CREAR EL CODIGO
   echo "ARRAY ASOCIATIVO (por nombre de la columna): MYSQLI_FETCH_ASSOC(X) \n"; 
   echo "<br>"; 
  while($fila2 = mysqli_fetch_assoc($resultados)){

       echo $fila2["EMP_NO"] . " " . $fila2["APELLIDO"]; 
       echo "\n"; 
       echo "<br>"; 
  } 


  mysqli_data_seek($resultados, 0); 

  // LA TERCERA FORMA ACCEDE A LOS DATOS DE CADA FILA, SEGUN LA POSICION DE SU COLUMNA
  // ES LO MISMO QUE CUANDO USAMOS MYSQL_FETCH_ROW. (COMO EN EL PROCEDIMIENTO ANTERIOR)
  echo "ARRAY ASOCIATIVO (por indice del array): MYSQLI_FETCH_ARRAY(X, MYSQLI_NUMBER) \n"; 
   echo "<br>"; 
  while($fila2 = mysqli_fetch_array($resultados, MYSQLI_NUM)){

       echo $fila2[0] . " " . $fila2[1]; 
       echo "\n"; 
       echo "<br>"; 
  } 

    // LA CUARTA  FORMA ACCEDE A LOS DATOS DE CADA FILA, SEGUN LA POSICION DE SU COLUMNA Y TAMBIEN EL NOMBRE DE LA COLUMNA (BOTH),
    //AUNQUE A NIVEL ACCESO ES MAS COMODA PORQUE PUEDES ACCEDER A LOS DATOS DE LAS DOS FORMAS, PRESENTA EL INCONVENIENTE DE SER 
    //MENOS EFICIENTE.
    echo "ARRAY ASOCIATIVO (por indice del array): MYSQLI_FETCH_ARRAY(X, MYSQLI_BOTH) \n"; 
    echo "<br>"; 

    mysqli_data_seek($resultados, 0); 
   while($fila2 = mysqli_fetch_array($resultados, MYSQLI_BOTH)){
 
        echo $fila2["EMP_NO"] . " " . $fila2[1]; 
        echo "\n"; 
        echo "<br>"; 
   } 
 

   

   echo "</pre>"; 

   }

   //verResultadoArrayAsociativo($resultados); 













?>


    
</body>
</html>
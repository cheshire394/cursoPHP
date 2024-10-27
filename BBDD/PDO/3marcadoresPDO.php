<?php


//ESTA CONEXIÓN ES PARECIDA A LA ANTERIOR CON LA EXCEPCIÓN DE QUE UTILIZAREMOS MARCADORES: 

/**1. Marcadores de Interrogación (?)
Estos son marcadores posicionales y se reemplazan por los valores correspondientes en el orden en que aparecen en la consulta.

2. Marcadores Nombrados (:nombre_parametro)
Estos marcadores permiten asociar un nombre específico a cada parámetro, lo que puede hacer que tu código sea más claro y menos propenso a errores.

+ ventajas-> es más fácil de identificar la variable que representan
- deventajas-> son ligeramente menos eficiente en tiempo y peso de la consulta por el analasis sintactico que conllevan

nota*-> LOS MARCADORES NOMBRADOS SOLOR ESTAN DISPONIBLE EN PDO,  mysqli: Solo soporta marcadores posicionales (?)*/

require ("../rutaConexion.php"); 

//fallo de conexion con PDO se controla con try/catch
try{
   
    //PASO 1) ESTABLECER CONEXIÓN
    $conn = new PDO(
        "mysql:host=$host;dbname=$db_nombre",  // Asegúrate que estas variables estén correctamente definidas.
        $db_usuarios,
        $db_contraseña,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")  // Mover esta línea fuera del comentario si necesitas la configuración UTF-8.
    ); 

    $conn-> exec("SET CHARACTER SET utf8");    //econserva, acentos de la BBDD

    //capturamos el error asi..ES COMO UN RAISE EN SQL
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    //PASO 2) RECOGER LOS INPUT DEL FORMULARIO:
    //NOTA*: En PDO, no necesitas usar real_escape_string() para sanitizar los datos
    $oficio =  $_GET["oficio"]; 
    $dept_no = intval($_GET["dept_no"]); //convertimos a integer

    //PASO 3) SENTENCIA SQL
    $consulta = "SELECT APELLIDO, SALARIO, OFICIO FROM EMPLE WHERE UPPER(OFICIO) = :ejemploMarcador AND  DEPT_NO = :ejemploMarcador2"; 

    //PASO 4) PREPARAR en la conexion, la consulta sql
    $preparada= $conn->prepare($consulta); 

    //PASO 5) VINCULAR PARAMENTROS CON PDO-> LLEVA UN NUMERO INDICE, + VARIABLE RECOGIDA + PDO::PARA_TIPODATO:
    //a diferencia de la conexion mysqli, aqui los parametros se vinculan con un indice de uno en uno:  
    $preparada-> bindParam(1, $oficio, PDO::PARAM_STR); 

    //nota* para nuestro ejemplo, solo buscamos por oficio, seria suficiente asi, pero vamos a dejar ejemplo
    //por si en un futuro necesitaras vincular más de un tipo de dato:

    //nota* PDO TRATA LOS DOUBLE Y FLOAT COMO STR -->  PDO trata los números con decimales como cadenas (string)

    //$preparada->bindParam(2, $salario, PDO::PARAM_INT);  
   // $preparada->bindParam(3, $oficio, PDO::PARAM_STR); 

    //PASO 6) EJECUTAR LA CONSULTA--> DEVUELVE UN ARRAY CON CADA COLUMNA DE LA TABLA....
    $preparada->execute(array(":ejemploMarcador" => $oficio, ":ejemploMarcador2" => $dept_no)); 


    //PASO 7) MOSTRAMOS LOS RESULTADOS: 
    while($fila = $preparada->fetch(PDO::FETCH_ASSOC)){
        echo "Nombre: " . $fila["APELLIDO"] . "<br>"; 
        echo "Oficio: " . $fila["OFICIO"] . "<br>"; 
        echo "Salario: " . $fila["SALARIO"] . "<br><br>";
    }

    //PASO 8) CERRAMOS EL CURSOR (LA CONEXION NO SE CIERRA EN PDO)
    $preparada-> closeCursor(); 
   



}catch(Exception $e){
    die("Error de conexión en objeto PDO: " . $e->getMessage());  // Asegúrate de que se concatena correctamente el mensaje de error.
}








  


?>
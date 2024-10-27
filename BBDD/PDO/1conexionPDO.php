<?php


/*PDO PERMITE ESTABLECER CONEXIÓN CON BBDD QUE SON MYSQL Y QUE NO SON MYSQL, ESA ES LA PRINCIPAL DIFERENCIA
ES DECIR PODRÍAS USAR PDO PARA ORACLE POR EJEMPLO..

ES IMPORTANTE DECIR, QUE PDO NO VIENE INSTALADO CON PHP, Y QUE DE TENER ALGUN ERROR PUEDE SER DEBIDO A SU INTALACIÓN: 
EN EL CASO DE USAR DOCKER, EN EL DOCKERFILE DE PHP HAY QUE AÑADIR--> 

# Instala la extensión pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

Y POSTERIORMENTE EJECUTAR ESTOS COMANDOS EN TERMINAL: 
docker-compose down
docker-compose up --build -d

SI ESTAS EN LOCAL EJECUTAR: 
sudo apt-get install php-mysql


*/ 

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

    //lazar las excepción si no llega a establecer la conn (raise)
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $conn-> exec("SET CHARACTER SET utf8");    //econserva, acentos de la BBDD

    //PASO 2) RECOGER LOS INPUT DEL FORMULARIO:
    //NOTA*: En PDO, no necesitas usar real_escape_string() para sanitizar los datos
    $oficio =  $_GET["oficio"]; 

    //PASO 3) SENTENCIA SQL
    $consulta = "SELECT APELLIDO, SALARIO, OFICIO FROM EMPLE WHERE UPPER(OFICIO) = UPPER(?)"; 

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
    $preparada->execute(); 

    //PASO 7) MOSTRAMOS LOS RESULTADOS: 
    while($fila = $preparada->fetch(PDO::FETCH_ASSOC)){
        echo "Nombre: " . $fila["APELLIDO"] . "<br>"; 
        echo "Oficio: " . $fila["OFICIO"] . "<br>"; 
        echo "Salario: " . $fila["SALARIO"] . "<br><br>";
    }

    //PASO 8) CERRAMOS EL CURSOR (LA CONEXION NO SE CIERRA EN PDO, ya que lo hace el programa automaticamente cuando terminas la ultima llamada a $conn)
    $preparada-> closeCursor(); 
   
}catch(Exception $e){
    die("Error de conexión en objeto PDO: " . $e->getMessage());  // Asegúrate de que se concatena correctamente el mensaje de error.
}

?>
<?php


try{

require "../rutaConexion.php"; 
//PASO 1) ESTABLECER CONEXIÓN
$conn = new PDO(
    "mysql:host=$host;dbname=$db_nombre",  // Asegúrate que estas variables estén correctamente definidas.
    $db_usuarios,
    $db_contraseña,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")  // Mover esta línea fuera del comentario si necesitas la configuración UTF-8.
); 

//LANZAMOS EXCEPCION SI NO SE PUEDE CONECTAR CON LA BBDD (RAISE) nota* -> necesario solo en conexiones PDO
$conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//conn-> exec("SET CHARACTER SET utf8"); //conservar acentos en la devolucion de la consulta


//PASO 2) RESCATAR LAS VARIABLES (RECUERDA EN PDO NO SE ESCAPAR STRING)....
$emp_no = $_POST["emp_no"]; 
$apellido = $_POST["apellido"]; 
$oficio = $_POST["oficio"]; 
$salario = floatval($_POST["salario"]); 
$comision = floatval($_POST["comision"]); 
$dept_no = intval($_POST["dept_no"]); 

$fecha_alt = date("y-m-d"); 


//PASO 2) GENERAR LAS INSERCCIÓN-> UTILIZAREMOS MARCADORES NOMBRADOS, PERO ESTOS TAMBIÉN SERIAN VALIDOS:
$insertar = "INSERT INTO EMPLE (EMP_NO, APELLIDO, OFICIO, SALARIO, COMISION,FECHA_ALT, DEPT_NO) VALUES (?,UPPER(?),UPPER(?),?,?,?,?)"; 


//PASO 4) PREPARAR LA CONEXION
$preparada = $conn-> prepare($insertar); 

//PASO 5) VINCULAR LOS PARAMETROS
$preparada-> bindParam(1, $emp_no, PDO::PARAM_INT); 
$preparada-> bindParam(2, $apellido, PDO::PARAM_STR); 
$preparada-> bindParam(3, $oficio, PDO::PARAM_STR); 
$preparada-> bindParam(4, $salario, PDO::PARAM_STR); //recuerda que PDO interpreta con str los flotantes...
$preparada-> bindParam(5, $comision, PDO::PARAM_STR); 
$preparada-> bindParam(6, $fecha_alt, PDO::PARAM_STR); 
$preparada-> bindParam(7, $dept_no, PDO::PARAM_INT); 

//PASO 5) EJECURAR LA CONSULTA
$ejecutada= $preparada-> execute(); 


//PASO 6) informamos 
if($ejecutada){
    echo "Empleado insertado con PDO"; 
}else  echo "Error al insertar empleado"; 

//PASO 8) CERRAMOS CURSOR
$preparada-> closeCursor(); 





}catch(Exception $e){

    die("Error en la conexion PDO --> ". $e-> getMessage()); 

}




?>
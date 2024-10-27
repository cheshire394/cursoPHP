<?php


//PASO 1) ESTABLECER CONEXIÓN: 
require "../LOGIN/rutaConexion.php"; 

$conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre); 

//informar si falla la conexion
if($conn-> connect_error){
    die("Error de conexión con la BBDD"); 
}



//PASO 2) RESCATAR LOS VALORES DEL FORMULARIO
$username = $conn-> real_escape_string($_POST["username"]); 
$password=  $conn-> real_escape_string($_POST["password"]); 

//con PDO -> $username= htmlentities($_POST['username']); 

//PASO 3) FORMULAR LA CONSULTA A LA BBDD: 
$consulta = "SELECT USERNAME, PASSWORD FROM USUARIOS WHERE USERNAME= ? AND PASSWORD=?"; 

//PASO 4= PREPARAMOS LA CONSULTA (con PDO ES = )
$preparada= $conn -> prepare($consulta); 

//PASO 5-> VINCULAR LOS PARAMETROS POSICIONALES CON LAS VARIABLES: 
$preparada-> bind_param("ss", $username, $password); 
//CON PDO-> $preparada-> bindParam(2, $password, PDO::PARAM_STR); nota*-> recuerda que es cada dati dek formulario uno por uno


//PASO 6) EJECUTAMOS LA CONSULTA  (con PDO ES = )
$preparada->execute(); 



// PASO 7) TRABAJAMOS CON LOS RESULTADOS
$resultado = $preparada->get_result(); //imprescindible para que funcion en mysql (EN PDO ESTE PASO NO ERA NECESARIO)

if($resultado-> num_rows === 1 ){ //si la consula devuleve un resultado:     //PDO ->     if($preparada-> rowCount() === 1 )

    //iniciamos sesion 
    session_start(); 

    //vinculamos a un nombre es como la PK DE LA SESION DE CADA USUARIO: 
    $_SESSION['username'] = $username; 

    //Redirigimos a una zona privada: 
    header("location: areaPrivada.php"); 
   


}else{
    header("location:formUser.html");  //no logeamos....

    echo "Usuario no Valido o contraseña incorrecta"; 
}


?>
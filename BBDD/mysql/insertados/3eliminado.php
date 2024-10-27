<?php

//PASO 1) ESTABLECER CONEXIÓN CON LA BBDD
require "../rutaConexion.php"; 

$conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre); 

if($conn -> connect_error){
    die("Erro de conexión con la BBDD"); 
}

//PASO 2) RECOGER LOS DATOS DEL FORMULARIO: 
$emp_no = intval($_POST["emp_no"]);

//PASO 3) FORMULAR LA ELIMINACION
$eliminar = "DELETE FROM EMPLE WHERE EMP_NO = ?"; 

//PASO 4) PREPARAR LA CONEXIÓN PARA LA ELIMINACION
$preparada = $conn->prepare($eliminar); 

//PASO 5) VINCULAR PARAMETROS con ?: 
$preparada-> bind_param("i", $emp_no); 

//PASO 6) EJECUTAR 
$ejecutada = $preparada->execute(); 

// PASO 7) VERIFICAR SI SE ELIMINÓ ALGÚN REGISTRO
$ejecutada = $preparada->execute(); 
if($ejecutada && $conn->affected_rows > 0){
    echo "<p>Empleado eliminado correctamente</p>"; 
} else {
    echo "<p>Error al eliminar el empleado o el empleado no existe</p>"; 
}



//PASO 7) CERRAR CONEXIONES
$preparada-> close();
$conn-> close(); 



?>
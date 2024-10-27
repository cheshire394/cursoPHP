<?php


//paso 1) establecer connexión con la BBDD: 
require "../rutaConexion.php"; 

$conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre); 

if($conn-> connect_error){
    die("conexión con la BBDD fallida"); 
}

//PASO 2 ) RECOGER LOS VALORES DEL FORMULARIO

$dnombre = $conn-> real_escape_string($_POST["dnombre"]); 
$dept_no = intval($_POST['dept_no']); //recueda que con numerico no lleva la conexion delante
$loc = empty($_POST["loc"]) ? null : $conn-> real_escape_string($_POST["loc"]); 


//PASO 3) PREPARA LA INSERCCION: 
$insertaDepart = "INSERT INTO DEPART (DEPT_NO, DNOMBRE, LOC) VALUES(?, UPPER(?), ?)"; 

//PASO 4) PREPARAR LA CONEXION PARA LA INSERCCION: 
$preparada = $conn-> prepare($insertaDepart); 

//PASO 5) VINCULAR LOS PARAMETROS: 
$preparada->bind_param('iss', $dept_no, $dnombre, $loc); 

//PASO 6) EJECUTAR LA CONSULTA

// Ejecutar la consulta y devolver el resultado en formato JSON
if ($preparada->execute()) {
    $response['success'] = true;
} else {
    $response['message'] = 'Error al insertar el departamento';
}

//paso 7 cerrar conexion
$conn-> close(); 
$preparada-> close(); 

echo json_encode($response);


?>
<?php
// Cargar configuración de la conexión (con manejo de errores)
require "../rutaConexion.php"; 

// PASO 1: Conectar a la base de datos
$conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre);

if ($conn->connect_error) {
    die("Error de conexión con la BBDD: " . $conn->connect_error); 
}

// PASO 2: Recoger el emp_no del formulario (calculado previamente)
$emp_no = intval($_POST['emp_no']);  // Convertir a número entero

// PASO 3: Recoger los datos del formulario
$apellido = $conn->real_escape_string($_POST['apellido']);
$oficio = $conn->real_escape_string($_POST['oficio']);
$dept_no = intval($_POST['dept_no']);  // Convertir a número entero
$salario = floatval($_POST['salario']);  // Convertir a flotante
$comision =floatval($_POST['comision']);

// PASO 4: Calcular la fecha de alta
$fecha_alt = date("Y-m-d");

// PASO 5: Preparar la consulta de inserción
$sql = "INSERT INTO EMPLE (EMP_NO, APELLIDO, OFICIO, DEPT_NO, SALARIO, FECHA_ALT, COMISION) VALUES (?, UPPER(?), UPPER(?), ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// PASO 6: Vincular los parámetros
$stmt->bind_param("issidsd", $emp_no, $apellido, $oficio, $dept_no, $salario, $fecha_alt, $comision);

// PASO 7: Ejecutar la consulta y verificar el resultado

if ($stmt->execute()) {
   
    echo '<div id="insert">'; 
        echo "<p> Empleado insertado correctamente </p>"; 
    echo '</div>'; 


}else{

    echo '<div id="errorInsert">'; 
    echo "<p> Error de insercción </p>"; 
    echo '</div>'; 



}


// PASO 8: Cerrar conexiones
$stmt->close();
$conn->close();




?>

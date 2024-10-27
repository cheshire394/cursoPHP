<?php

// CODIGO DE LOGEO CON COOKIES... Es decir, si el usuario ha pulsado el checkbox y quiere ser recordado
$recordarUser = isset($_POST["recordar"]);

// PASO 1) ESTABLECER CONEXIÓN
require "rutaConexion.php"; 

$conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre); 

// Informar si falla la conexión
if ($conn->connect_error) {
    die("Error de conexión con la BBDD");
}

// PASO 2) RESCATAR LOS VALORES DEL FORMULARIO
$username = $conn->real_escape_string($_POST["username"]); 
$password = $conn->real_escape_string($_POST["password"]); 

// PASO 3) FORMULAR LA CONSULTA A LA BBDD
$consulta = "SELECT USERNAME, PASSWORD FROM USUARIOS WHERE USERNAME= ? AND PASSWORD=?";

// PASO 4) PREPARAMOS LA CONSULTA
$preparada = $conn->prepare($consulta);

// PASO 5) VINCULAR LOS PARAMETROS POSICIONALES CON LAS VARIABLES
$preparada->bind_param("ss", $username, $password);

// PASO 6) EJECUTAMOS LA CONSULTA
$preparada->execute();

// PASO 7) TRABAJAMOS CON LOS RESULTADOS
$resultado = $preparada->get_result();

// Variable para saber si el usuario existe
$existeUsuario = false;

if ($resultado->num_rows === 1) {
    // El usuario existe en la BBDD
    $existeUsuario = true;

    // PASO 2) Verificamos si el usuario ha pulsado el checkbox "recordar"
    if ($recordarUser) {
        // Si el checkbox fue marcado, creamos la cookie con el nombre de usuario
        $nombreCookie = "registrarUsuario";
        $contenido = $username;
        
        setcookie($nombreCookie, $contenido, [
            "expires" => time() + 30, // La cookie durará 30 segundos
            "path" => "/",
            "secure" => true,  // Cambiar a true si usas HTTPS
            "httponly" => true, 
            "samesite" => "Lax"
        ]);

        // Iniciamos sesión
        session_start();
        $_SESSION['username'] = $username;

        // Redirigimos a la zona privada
        header("Location: 3_areaPrivada.php");
        exit();
    } else {
        // Si el checkbox NO fue marcado, simplemente iniciamos sesión sin crear la cookie
        session_start();
        $_SESSION['username'] = $username;
        
        // Redirigimos a la zona privada
        header("Location: 3_areaPrivada.php");
        exit();
    }
} else {
    // Si el usuario no existe, redirigimos a la página de inicio de sesión
    header("Location: 3_loginCook.php");
    exit();
}

?>

<?php
// Comprobamos si el usuario ya tiene una cookie activa y no está logeado (es decir, sin sesión)
if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE["registrarUsuario"])) {
        // Si la cookie existe, iniciamos sesión automáticamente
        session_start();
        $_SESSION['username'] = $_COOKIE["registrarUsuario"];

        // Redirigimos a la zona privada
        header("Location: 3_areaPrivada.php");
        exit();
    } else {
        // Si no existe la cookie, mostramos el formulario de inicio de sesión
        include("3_loginCook.php");
    }
}
?>

<?php
// Iniciamos la sesión al inicio del archivo PHP, pero no hacemos nada con ella todavía
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formLOGIN</title>
</head>
<body>

<?php
if (isset($_POST["conectar"])) { 
    try {
        // PASO 1) CONECTAR A LA BBDD
        require("rutaConexion.php");

        $conn = new PDO(
            "mysql:host=$host;dbname=$db_nombre", // host + nombre de la bbdd
            $db_usuarios, 
            $db_contraseña,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
        ); 

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        // PASO 2) RESCATAMOS LOS VALORES INTRODUCIDOS EN FORMULARIO:
        $username = htmlentities($_POST["username"]);
        $password = htmlentities($_POST["password"]); 

        // PASO 3) REALIZAMOS LA CONSULTA
        $consulta = "SELECT USERNAME, PASSWORD FROM USUARIOS WHERE UPPER(USERNAME) = UPPER(?) AND PASSWORD = ?"; 

        // PASO 4) PREPARAMOS LA CONEXIÓN PARA LA CONSULTA
        $preparada = $conn->prepare($consulta); 

        // PASO 5) VINCULAMOS CON LOS MARCADORES ?, En el mismo orden que están en la consulta
        $preparada->bindParam(1, $username, PDO::PARAM_STR);
        $preparada->bindParam(2, $password, PDO::PARAM_STR); 

        // PASO 6) EJECUTAR LA CONSULTA
        $preparada->execute(); 

        // PASO 7) OBTENER EL RESULTADO
        if ($preparada->rowCount() > 0) {  
            // SI EL USUARIO EXISTE, AHORA INICIAMOS SESIÓN Y GUARDAMOS SU NOMBRE
            $_SESSION["nombre"] = $username; 

            // Mostramos un mensaje de bienvenida
            echo "Bienvenido a tu zona privada: " . $_SESSION["nombre"]; 

        } else {
            // Si el usuario no existe, mostramos un mensaje de error
            echo "Usuario NO registrado y/o contraseña incorrecta"; 
        }

    } catch (Exception $e) {
        echo $e->getMessage(); 
    }
}

// Si no se ha iniciado sesión, mostramos el formulario
if (!isset($_SESSION["nombre"])) {
   
    include "4form.php";  // Muestra el formulario en web
    
}
?>

<div id="container">
    <h2>Resto del contenido público</h2>

    <select name="sesion" id="sesion" onchange="cerrarSesion(this.value)">

        <option selected value="">Sesion Iniciada</option>
        <option value="cerrar">Cerrar Sesión</option>

    </select>

    <script>

        function cerrarSesion(estado){
            if(estado === 'cerrar'){
                window.location.href="3cierrelogin.php"; 
            }
        }

    </script>
</div>
</body>
</html>

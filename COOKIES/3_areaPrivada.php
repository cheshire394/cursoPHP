<?php
// Iniciamos la sesión, esto debe ser lo primero en el archivo
session_start();

// Verificamos si la sesión contiene el nombre de usuario
if (!isset($_SESSION['username'])) {
    // Si no existe la variable de sesión, redirigimos al login
    header("Location: db_login.php");
    exit(); // Asegura que el script se detenga después de redirigir
}

// Si estamos aquí, significa que la sesión existe, podemos dar la bienvenida al usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Privada</title>
    <style> 

        body{

            /*fondo */
            background-color: rgb( 234, 250, 241);

            /**letra */
            font-size: 30px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        h1{
            text-shadow: 2px, 2px, 7px, ;
            color: rgb( 40, 55, 71 ); 
            text-align: center;
        }

        select{
            padding: 8px; 
            margin-left: 27px;
            font-family: Arial, Helvetica, sans-serif;
            color: rgb (40, 55, 71);
            font-weight: bold;
        }

    
    </style>
</head>
<body>

    <!-- Usamos htmlspecialchars para evitar problemas de seguridad como XSS -->
    <h1>Bienvenida al área privada, <?php echo ucfirst(htmlspecialchars($_SESSION['username'])); ?>!</h1>

<select name="sesion" id="sesion" onchange="cerrarSesion(this.value)">

<option value="cerrar">cerrar sesion</option>
<option selected value="">Inicia sesion</option> <!--selected muestra la opcion por defecto siempre-->

<script>

    function cerrarSesion(estado){
        if(estado === 'cerrar'){
            let body = document.querySelector('body'); 
            let despedir = document.createElement('h1'); 
            despedir.textContent="cerrando sesion..."
            body.appendChild(despedir); 

          
      
        setTimeout(() => {

            let desaparecer = setInterval(() => {
                if (despedir.style.opacity > 0) { //si todavia tiene opcacidad , la reducimos en casa intervalor 0.05 (es acumulativo, hasta que llegue a cero)
                    despedir.style.opacity -= 0.05; 

                } else { 
                   
                    clearInterval(desaparecer); // Detenemos el intervalo cuando la opacidad llega a 0
                    body.removeChild(despedir); // Eliminamos el elemento del DOM
                    window.location.href="3cierrelogin.php";  //cerramos sesion de verdad
                }
            }, 100); // Intervalo de 100 milisegundos (0.1 segundos)


        }, 1000); // Esperamos 2 segundos antes de iniciar la transición

        
        }
    }


</script>

<?php 
       session_unset(); // Limpiar todas las variables de sesión
       session_destroy(); 

       header("location:db_login.php"); //redirigir al formulario
       exit();

?>


    
</body>
</html>

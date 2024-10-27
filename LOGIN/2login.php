<?php

//nota*--> la etquete de php tiene que empezar en la linea 1 para que el documento carge
session_start(); // Reanuda la sesión

/*isset() es una función en PHP BOOLEANA que se utiliza para verificar si una variable está definida y no es null. (TRUE)
de lo contrario, devuelve false = NULL. */

if (!isset($_SESSION["nombre"])) { // UTILIZAMOS LA VARIABLE SUPERGLOBAL PARA COMPROBAR SI ES NULL... ES DE DECIR FALSE --> !
    header("location:formLogin.html"); //Y SI ES NULL redirige al login inicial del formulario
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  

</head>
<body>
<h1> Bienvenido a la pagina de usuarios Registrados <?php echo ucfirst($_SESSION["nombre"])?></h1> <!--ucfirst solo es para poner en formato titulo, parecido a  ucfwords-->
<br>
<select name="sesion" id="sesion" onchange="cerrarSesion(this.value)">

    <option selected value="">Sesion iniciada</option>
    <option value="cerrar">cerrar Sesion</option>

</select>

<script>

    function cerrarSesion(estado){

        if(estado === 'cerrar'){
            window.location.href="3cierrelogin.php"; 
        }

    }
</script>



<br>
    
</body>
</html>
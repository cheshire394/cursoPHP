<?php

    session_start(); 
    session_unset(); // Limpiar todas las variables de sesión
    session_destroy(); 

    header("location: 3_loginCook.php"); //redirigir al formulario
    exit(); 

?>

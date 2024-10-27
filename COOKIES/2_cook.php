<?php

$nombreCookie="miCookie"; 
$contenido ="contenido de la cookie pendiente de desarrollar"; 
$segundos = 10;
$web_actuar= "/cursoPHP/COOKIES/"; //actuar sobre todas las webs creadas en COOKIES
$web = "/cursoPHP/COOKIES/2_cook.php"; //redireccionar a la web

//$dominio= "NO DESARROLAMOS PORQUE ES DE PAGO, PERO SE PUEDE INCLUIR EN LA CREACION

/*Verificar si se envió algun boton del formulario, a traves de un name dado:  */
if(isset($_GET["aceptar"])){

    setcookie(
        /* CREAR UNA COOKIE DE FORMA SEGURA, O mejor dicho de forma semiSegura*/
        $nombreCookie, 
        $contenido, 
        [
            "expires" => time() + $segundos, 
            "path" => $web_actuar, 
            "secure" => true,      // Solo se envía a través de HTTPS
            "httponly" => false,   // Accesible desde JavaScript, AL ESTAR EN FALSE, GENERA UNA BRECHA DE SEGURIDAD, PERO NO QUIERO COMPLICARTE CON OTRO CODIGO PARA MOSTRAR LAS VISIBILIDADES
            "samesite" => "Lax"    // Enviar en solicitudes de origen cruzado en algunos casos, al estar en lax, no es tan stricto y mejor la experiencia del usuario, a la vez que genera seguridad
        ]
    ); 

}elseif(isset($_GET["esenciales"])){

    /* CREAR UNA COOKIE DE FORMA INSEGURA */

        setcookie($nombreCookie, $contenido, time()+ $segundos, $web_actuar); 
        header("Location: $web"); // Redireccionar después de aceptar cookies
        exit();

}else if(isset($_GET["rechazar"])){

        setcookie($nombreCookie, "", time() - $segundos, $web_actuar); 
        header("Location: $web"); // Redireccionar después de aceptar cookies
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

<style>

    body, html{
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body{

        /**Esta propiedad transforma el contenedor (body en este caso) en un contenedor flex. Esto significa que los elementos hijos directos de body (como header, main, y footer) se organizan según las reglas de Flexbox, 
        lo que permite un control más dinámico del diseño */
        display: flex;


        /**Define que los elementos dentro del contenedor body 
        se coloquen en una columna vertical, es decir, uno debajo del otro. 
        En este caso, los elementos como header, main, y footer 
        se organizan en forma de bloque vertical en lugar de estar alineados en fila. */
        flex-direction: column;
        
        
       
    }


    main {

        /**Esto le dice al elemento main que ocupe todo el espacio disponible en el contenedor 
        body una vez que se haya colocado el resto de los elementos (como header y footer). */
        flex-grow: 1;
}

/**Capa superpuesta */
#overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: whitesmoke;
            display: flex;
            justify-content: center; /*Centrar texto horizonatalmente */
            align-items: center;
            z-index: 9999; /* Asegúrate de que el overlay esté por encima de todo */
        
        }

    #divCookies{
        background-color: rgb( 41, 44, 48);
        color:whitesmoke; 
        align-content: center;
        text-align: center;
        justify-content: center;
        padding: 15px;
        border-radius: 4px;

    }   

    button{
        padding: 7px;
        margin: 10px 10px 20px;
        background-color: rgb( 86, 163, 36 );

        color:whitesmoke; 
        font-weight: bold;
        border-radius: 4px;
    
    }

    button:hover{
        background-color: rgb( 184, 244, 145);
        color: black;
    }

    button:active{

        transform: translateY(2px);

    }



</style>
<body>

<header>
    <h1> esto es el header </h1>
</header>

<main>
    <h3>Resto de contenido web...............</h3>
</main>

  

<footer>

<div id="overlay">
    <div id="divCookies">
        <form method="get">
            <h4>Aceptar las cookies para mejorar la experiencia con el usuario:</h4>
            <button type="submit" name="aceptar">Aceptar</button>
            <button type="submit" name="esenciales">Aceptar esenciales</button>
            <button type="submit" name="rechazar">Rechazar</button>
        </form>
    </div>
</div>


</footer>


 <!--Permitimos el acceso al contenido de la pagina web, despues de seleccionar las cookies con JS--> 
<script>
    // Verificar si la cookie está establecida
    document.addEventListener('DOMContentLoaded', function() {


        /*.indexOf('miCookie='):

    indexOf es un método de las cadenas en JavaScript que busca una subcadena dentro de la cadena principal.
    En este caso, se está buscando la subcadena 'miCookie=' en la cadena document.cookie.
    indexOf devuelve la posición de la primera aparición de la subcadena. Si la subcadena no se encuentra, devuelve -1. */

    /**Cookies con nombres similares:
    Las cookies se almacenan en document.cookie en un formato de nombre=valor. Por ejemplo, si tienes cookies llamadas miCookie y miCookie2, 
    document.cookie podría verse así: miCookie=value; miCookie2=anotherValue;.
    Si solo buscas 'miCookie', podrías encontrar una coincidencia parcial en miCookie2, lo cual no es lo que quieres.
    La búsqueda de 'miCookie=' asegura que estás buscando la cookie que tiene el nombre exacto  */

        if (document.cookie.indexOf('miCookie=') !== -1) {

            // Cookie está presente, ocultar el overlay y mostrar el contenido
            document.getElementById('overlay').style.display = 'none';
            document.querySelector('main').style.display = 'block'; /*block -> hace que se estiren a lo ancho del contenedor padre, ocupando toda la anchura disponible */
            document.body.style.overflow = 'auto'; // Permitir el scroll

        } else {
            // Cookie no está presente, mostrar el overlay y ocultar el contenido
            document.querySelector('main').style.display = 'none';
            document.body.style.overflow = 'hidden'; // Evitar el scroll
        }
    });

</script>



    
</body>
</html>
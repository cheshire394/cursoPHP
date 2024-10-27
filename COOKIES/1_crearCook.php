<?php 

/*TEORIA: ¿QUÉ SON LAS COOKIES?

Cuando en el navegador, realizamos una petición al servidor de una pagina (es decir,buscamos una web en el navegador), el servidor nos responde en
extensión html, o en extension php para que podamos ver la pagina en nuestro navegador. 

Lo que sucede es que nuestro ordenador fisico, tiene en su disco duro un pequeño espacio reservado para la cookies, las cookies de esa pagina web
van a quedar almacenadas en nuestro disco duro. ¿y que es lo que contiene?

es un fichero plano, con muchisimos datos (tanto como el programador quiera), puede contener tu nombre de usuario, la hora, el tiempo que has estado visitando esa pagina,
donde has hecho click...etc almacenan tus habitos de navegación y tus intereses, algo que aprovechan muy bien las empresas para ofrecerte una publicidad personalizada

lo habitual es que el fin sea que el usuario pueda navegar por las paginas, sin que tenga que estar introduciendo constantemente sus datos, es decir facilitarle las cosas
al usuario. UN ejemplo muy común es cuando hacemos compras que se almacenan en un carrito, y si el usuario cierra ese carrito, cuando volvemos a entrar en la web
los productos sigue ahi. (esa informacion se va a guardar en las cookies y las cookies a su vez en el disco duro de ese equipo).

Pero como hemos visto, no siempre los fines son facilitarte la vida, también puede ser bombardearte con publicidad

*/


//por defecto la cookie muere al cerrar el navegador de la pagina, si queremos que dure mas tiempo, tenemos que darle una duración en SEGUNDOS (NO EXISTE FORMA DE CONVERSION)
$NOMBRE_COOK ="cookie1";
$CONTENIDO ="esta es la información de nuestra primera cookie";
$SEGUNDOS = 30; 
$WEB_ACTUAR= "/cursoPHP/COOKIES/";  // recuerda excluir localhost, la ruta será hasta el directorio padre que contiene la pagina web donde queremos que actue la cookie

setcookie($NOMBRE_COOK, $CONTENIDO, time() + $SEGUNDOS, $WEB_ACTUAR);

/*Para eliminar una cookie creada, solo hay que poner le tiempo en negativo, es decir no hay una funcion directa que elimine una cookie*/ 

?>
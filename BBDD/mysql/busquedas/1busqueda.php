<?php
require("../rutaConexion.php");

$conexionPOO = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre);
$conexion = mysqli_connect($host, $db_usuarios, $db_contraseña, $db_nombre);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa con la BBDD<br>";
}

// SENTENCIAS PREPARADAS EN SQL OBTIENE VENTAJAS COMO NO TRATAR LA CADENA QUE INTRODUZCA EL USUARIO COMO UNA SENTENCIA SQL
// SINO COMO UN DATO MÁS, GRACIAS A ESTO PODEMOS PROTEGER NUESTRA BBDD DE CÓDIGOS MALICIOSOS QUE QUIERAN DAÑAR SU ESTRUCTURA.

/**Seguridad: El uso de ? en lugar de incrustar directamente $busqueda previene inyecciones SQL. El motor de la base de datos sabe que ?
 * es un marcador de posición para un valor que será suministrado por separado y no lo tratará como parte del código SQL.
 *  
 * Aunque usamos real_escape_string para escapar caracteres especiales, cuando inyectamos $busqueda directamente en la consulta
 * aún estamos construyendo la consulta SQL directamente con los datos del usuario. Esto puede ser riesgoso si no se escapan adecuadamente todos los caracteres.
 * 
 * 
 * Otra ventaja de usar ? es: 
 * REUTILIZACIÓN DE CÓDIGO --> además ? actúa como un parámetro sustituible
 */

// Este método de la clase mysqli escapa caracteres especiales en una cadena para su uso en una consulta SQL, lo que previene inyecciones SQL. 
$busqueda = $conexionPOO->real_escape_string($_GET["buscar"]);
$busqueda2 = mysqli_real_escape_string($conexion, $_GET["buscar"]); // Ejemplo de conexión con procedimiento

// Preparar y ejecutar la consulta --> UTILIZAMOS UN PARÁMETRO (?) PARA OBTENER LAS VENTAJAS ANTERIORMENTE SEÑALADAS, SQL SABRÁ INTERPRETAR QUE SUSTITUYE A $BUSQUEDA
$consulta = "SELECT EMP_NO, APELLIDO, SALARIO FROM EMPLE WHERE UPPER(APELLIDO) = UPPER(?)"; // Podríamos poner UPPER($busqueda) pero sería más inseguro para nuestra BBDD

// PASO 1) PREPARAR LA CONSULTA 

$stmt = $conexionPOO->prepare($consulta);
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conexionPOO->error);
}

// Si utilizamos conexión con procedimiento
$stmt2 = mysqli_prepare($conexion, $consulta);
if ($stmt2 === false) {
    die("Error en la preparación de la consulta: " . mysqli_error($conexion));
}

/**¿Qué Almacena $stmt?

     Objeto mysqli_stmt: $stmt almacena un objeto que representa una sentencia SQL preparada.
     Este objeto tiene métodos y propiedades que permiten ejecutar la sentencia, 
     vincular parámetros, obtener resultados, etc. */



// PASO 2) VINCULAR EL PARÁMETRO $busqueda con -->       ?

/*$stmt->bind_param("s", $busqueda): Este método vincula el valor de $busqueda al marcador de posición ? en la consulta.
 El primer argumento "s" indica que el parámetro es una cadena (string).*/ 
$stmt->bind_param("s", $busqueda);

// Para la conexión procedimental, usamos mysqli_stmt_bind_param
mysqli_stmt_bind_param($stmt2, "s", $busqueda2);

// PASO 3) EJECUTAMOS LA CONSULTA
$stmt->execute();
mysqli_stmt_execute($stmt2);

// PASO 4) OBTENEMOS LOS RESULTADOS
$resultado = $stmt->get_result();
$resultado2 = mysqli_stmt_get_result($stmt2);



// PASO 5) Comprobar si hay resultados y si los hay, los devolvemos
if ($resultado->num_rows > 0) {
    // Otras formas de hacer lo mismo -> mysqli_fetch_array($resultado, MYSQLI_ASSOC) Y $fila = mysqli_fetch_assoc($resultado)
    while ($fila = $resultado->fetch_assoc()) {
        echo "<pre>";
        echo "RESULTADO DE CONEXION CON POO: "; 
        echo "Número de empleado: " . $fila["EMP_NO"] . " | Apellido: " . $fila["APELLIDO"] . " | Salario: " . $fila["SALARIO"] . "<br>\n";
        echo "</pre>";
    }
} else {
    echo "No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda);
}

if (mysqli_num_rows($resultado2) > 0) {
    while ($fila2 = mysqli_fetch_assoc($resultado2)) {
        echo "<pre>";
        echo "RESULTADO DE CONEXION CON PROCEDIMIENTO: "; 
        echo "Número de empleado: " . $fila2["EMP_NO"] . " | Apellido: " . $fila2["APELLIDO"] . " | Salario: " . $fila2["SALARIO"] . "<br>\n";
        echo "</pre>";
    }
} else {
    echo "No se encontraron resultados para la búsqueda: " . htmlspecialchars($busqueda2);
}


//CERRAMOS CONEXIONES, no olvides que también debes de cerrar $stmt
$stmt->close();
mysqli_stmt_close($stmt2);

$conexionPOO->close();
mysqli_close($conexion);
?>

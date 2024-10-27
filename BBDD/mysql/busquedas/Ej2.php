<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

#caja {
    /* Estilo de la caja */
    border-radius: 4px;
    border: solid 2px green;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */

    /* Estilo del texto */
    font-size: 15px;
    text-align: center;
    padding: 4px;
    background-color: rgb(192, 255, 192); /* Verde manzana claro */

    /* Alineación vertical */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px; /* Ajusta según el tamaño deseado */

    margin-bottom: 25px;
}

        #conexionON{
            color: green; 
          
        }

        #conexionOFF{
            color: red; 
        }



table{
    border: 2px solid rgb( 78, 52, 46);
    width: 80%;
   
    max-width: 80%;
    min-width: 20%;
    border-collapse: collapse;
    align-content: center;
    margin-left: 10%;
    margin-top: 10%;
 

        
}

th{
 
    border: 2px solid rgb( 78, 52, 46);
    background-color: rgb( 141, 110, 99); 


    text-align: center; 
    color: rgb(255, 253, 231); 
    font-weight: bold;
    padding: 0.25%;



}

td{
    text-align: center;
    background-color: rgb(161, 136, 127);
    color: rgb(255, 253, 231); 
    font-weight: bold;
    padding: 0.25%;
    

}

tr{
    border: 2px solid rgb( 141, 110, 99); 
    
}
tr:hover{
  
    transform: translateY(4px);
    
}


    </style>
</head>

<body>

    <?php

    require "../rutaConexion.php";

    $host = "db";
    $db_usuarios = "user";
    $db_contraseña = "password";
    $db_nombre = "employees";  //nombre de la bbdd

    // PASO 1: CONECTAR CON LA BBDD 
    $conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre);

    echo "<div id='caja'>";
    if ($conn->connect_error) {
        echo "<div = >";
        echo "<h1 id='conexionOFF'>Error al conectar con la BBDD</h1> <br>";
        
    } else {
        echo "<h1 id='conexionON'>Conexión con la BBDD establecida<h1> <br>";
    }
    echo "</div>";

    // PASO 2: RECOGER EL VALOR DEL FORMULARIO EN VARIABLES
    $apellido = empty($_GET["apellido"]) ? null : $conn->real_escape_string($_GET["apellido"]);
    $emp_no = empty($_GET["emp_no"]) ? null : intval($_GET["emp_no"]);
    $oficio = empty($_GET["oficio"]) ? null : $conn->real_escape_string($_GET["oficio"]);
    $salario = empty($_GET["salario"]) ? null : floatval($_GET["salario"]);

    // PASO 3: FORMULAR LA CONSULTA CON LOS VALORES RECOGIDOS
    $consulta = "SELECT EMP_NO, APELLIDO, OFICIO, SALARIO FROM EMPLE WHERE 1=1";




    $datos = [];
    $types = "";

    if ($emp_no) {
        $consulta .= " AND EMP_NO = ?";
        $datos[] = $emp_no;
        $types .= "i";
    }

    if ($apellido) {
        $consulta .= " AND UPPER(APELLIDO) = UPPER(?)";
        $datos[] = $apellido;
        $types .= "s";
    }

    //como el value por defecto era null en el html de tipo string, 
    //si hay un oficio y ademas ese oficio no es "null" de tipo string, buscar por ese oficio:
    if ($oficio && $oficio !== "null") {
        $consulta .= " AND UPPER(OFICIO) = UPPER(?)";
        $datos[] = $oficio;
        $types .= "s";
    }



    if ($salario) {
        $consulta .= " AND SALARIO >= ?";
        $datos[] = $salario;
        $types .= "d";
    }

    // PASO 4: PREPARAR LA CONSULTA
    $preparada = $conn->prepare($consulta);

    if ($preparada === false) die("Error en la preparación de la consulta");

    // PASO 5: VINCULAR EL PARAMETRO DE BÚSQUEDA
    if (!empty($datos)) {
        $preparada->bind_param($types, ...$datos);
    }

    // PASO 6: EJECUTAR LA CONSULTA
    $preparada->execute();

    // PASO 7: OBTENER LOS RESULTADOS y mostrarlos
    $resultados = $preparada->get_result();

    if ($resultados->num_rows > 0) {

        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Apellido</th>";
        echo "<th>Oficio</th>";
        echo "<th>Salario</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($fila = $resultados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila["EMP_NO"] . "</td>";
            echo "<td>" . $fila["APELLIDO"] . "</td>";
            echo "<td>" . $fila["OFICIO"] . "</td>";
            echo "<td>" . $fila["SALARIO"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No se encontraron resultados para la búsqueda";
    }

//PASO 8 CERRAMOS CONEXIONES
$conn-> close(); 
$preparada-> close(); 
    ?>


</body>

</html>
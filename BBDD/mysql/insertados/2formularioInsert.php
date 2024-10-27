<?php
// PASO 1: Conectar a la base de datos
require "../rutaConexion.php"; 
$conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre); 

if ($conn->connect_error) {
    die("Error de conexión con la BBDD " . $conn->connect_error); 
}

// PASO 2: Obtener el próximo emp_no
$q_emp_no = "SELECT (MAX(EMP_NO) + 1) AS proximo_emp_no FROM EMPLE"; 
$result = $conn->query($q_emp_no);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $emp_no = $row['proximo_emp_no'];
} else {
    $emp_no = 1;  // Si no hay registros, el primer emp_no será 1
}

// NO Cerrar la conexión a la base de datos, YA QUE NECESITAMOS CAPTURAR EL VALOR DE $emp_no para la inserción en insertado.php

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Empleado</title>
   <style>
        h1 {
            color: rgb(51, 48, 48);
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            width: 30%;
            background-color: rgb(240, 240, 157);
            border-radius: 2%;
            align-items: center;
            padding: 30px 50px;
        }

        label {
            display: block;
            font-size: 20px;
            color: rgb(75, 73, 73); 
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            margin-bottom: 12px;
            padding: 8px;
            border: solid 0.5px rgb(85, 82, 82); 
            font-size: 15px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: rgb(212, 204, 204);
            color: rgb(51, 50, 50); 
            font-size: 16px;
            font-weight: bold;
        }

    

   </style>
</head>
<body>
    <h1>Registrar un empleado:</h1>
    <form action="insertado.php" method="post">
        <label for="emp_no">Código empleado:</label>
    <!-- recibe el valor de una consulta ejecutada a la BBDD con php, además es de solo lectura, por lo cual el usuario no puede cambiarla-->
        <input type="text" name="emp_no" id="emp_no" value="<?php echo $emp_no; ?>" readonly> 

    <!--Aqui value tiene mucha importancia porque es el código de departamento que se va a insertar en la BBDD-->
        <label for="dept_no">Departamento:</label>
        <select id="dept_no" name="dept_no" required>
            <option value="40" selected>Producción</option>
            <option value="30">Ventas</option>
            <option value="20">Investigación</option>
            <option value="10">Contabilidad</option>
        </select>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required> 

    <!--selected asigna un oficio por defecto siempre, es la forma de seleccionar un value cuando existe más de un opción-->
        <label for="oficio">Oficio:</label>
        <select id="oficio" name="oficio" required>
            <option value="empleado" selected>Empleado</option>
            <option value="vendedor">Vendedor</option>
            <option value="director">Director</option>
            <option value="analista">Analista</option>
            <option value="presidente">Presidente</option>
        </select>

    <!--El salario lo puede rellenar el usuario, o bien cuando se asigne un oficio se ejecuta el script y se autoAsigna-->
        <label for="salario">Salario:</label>
        <input type="text" name="salario" id="salario" value="">

        <label for="comision">Comisión: </label>
        <input type="text" default=null name="comision" id="comision" placeholder="por defecto no tiene comisión">

        <button type="submit" id="registrar">Registrar</button>
    </form>



    
<script>
//ESTE SCRIPT PERMITE QUE CUANDO SE HAYA CARGADO TODO EL DOCUMENTO ('DOMContentLoaded') --> obtenemos el valor del oficio selecionado y del salario.
        document.addEventListener('DOMContentLoaded', function () {
            const salarioInput = document.getElementById('salario');
            const oficioSelect = document.getElementById('oficio');

            //creamos una tabla de salarios minimos a nuestro gusto...
            const salariosMinimos = {
                empleado: 15000,
                vendedor: 18000,
                director: 35000,
                analista: 25000,
                presidente: 50000
            };

            //si, se cambia el oficio --> sacamos su valor, y ese valor se lo damos al salario, 
            oficioSelect.addEventListener('change', function () {
                const oficioSeleccionado = oficioSelect.value;
                salarioInput.value = salariosMinimos[oficioSeleccionado] || 0;
            });

            //  el salario al cargar la página con la opción predeterminada, si que exista ningun change...
            salarioInput.value = salariosMinimos[oficioSelect.value];
        });

</script>
    


</body>
</html>

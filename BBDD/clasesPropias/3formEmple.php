<?php

require "2mostrarEmple.php"; 

// Instanciar la clase MOSTARR EMPLE con los parámetros de conexión (recuerda que heredaban del padre)
$empleados = new mostrarEmple();  

// Obtener los empleados en un array
$arrayEmple = $empleados->mostrarEmpleados(); //llamamos al metodo con la instancia creada


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #009879;
            color: white;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

        /*Hace que las filas pares(even) de la tabla sean más claras*/ 
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>EMP_NO</th>
                <th>Apellido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arrayEmple as $empleado): ?>
            <tr>
                <td><?php echo $empleado['emp_no']; ?></td>
                <td><?php echo $empleado['apellido']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

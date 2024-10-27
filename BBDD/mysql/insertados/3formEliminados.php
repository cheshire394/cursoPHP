

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
    <form action="eliminado.php" method="post">

    
        <label for="emp_no">Código empleado:</label>
        <input type="text" name="emp_no" id="emp_no" required> 
        <button type="submit" id="eliminar">eliminar</button>
    </form>



    
<script>
//ESTE SCRIPT PERMITE QUE CUANDO SE HAYA CARGADO TODO EL DOCUMENTO ('DOMContentLoaded') --> obtenemos el valor del oficio selecionado y del salario.
        document.addEventListener('DOMContentLoaded', function () {


            let btnEliminar = document.getElementById('eliminar'); 
            btnEliminar.addEventListener('click', function(){

                if(!confirm("¿Estas seguro que deseas eliminar el empleado?")){
                    event.preventDefault(); 
                }; 


            }); 
     
        });

</script>
    


</body>
</html>




<?php
//queremos hayar cual es el ultimo departamento para ofrecer a partir de ahi un dept_no.

//paso 1) establecer connexión con la BBDD: 
require "../rutaConexion.php"; 

$conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre); 

if($conn-> connect_error){
    die("conexión con la BBDD fallida"); 
}


//Paso dos consulta

$sql = "SELECT dept_no FROM DEPART ORDER BY dept_no DESC LIMIT 1"; 
$result = $conn-> query($sql); 

if($result-> num_rows  > 0){

$fila = $result-> fetch_assoc(); 
$lastDepart = $fila["dept_no"]; 
$lastDepart += 10; // porque no queremos el ultimo, sino el siguiente


}else{
    $lastDepart= 10;  
}




?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Departamento</title>
</head>
<style>
h1{

    color: rgb(18, 92, 22)
}

body{
    background-color: rgba(255, 255, 255, 0.89);
    
}

form{
    background-color: rgb(113, 168, 113);
    border-radius: 8px;
    max-width: 55%;

    padding: 25px;
    
}

label{ 
    font-size: 25px;
    padding: 5px;
    margin: 2px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
   
}

input{
    padding: 5px;

}


</style>
<body>

    <h1>Insertar Departamento: </h1>

    <form action="insertDepart.php" method="post" id='departForm'>

        <label for="dept_no">Código departamento: </label>
        <input type="number" min="<?php echo $lastDepart;?>" step="10" max=150 value="<?php echo $lastDepart;?>" name="dept_no" id="dept_no" required> 
        <br>
        <label for="dnombre">Nombre departamento: </label>
        <input type="text" name="dnombre" id="dnombre" required>
        <br>
        <label for="loc">Localidad: </label>
        <input type="text" name="loc" id="loc">
        <br>
        <button type="submit" id="registrar">Registrar</button>
    </form>

    

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {

            
            let form = document.getElementById("departForm");
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Evitamos el envío normal del formulario

                let formData = new FormData(form);

                fetch('insertDepart.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    let mensajeDiv = document.getElementById("mensaje");
                    let msj_registrado = document.createElement('p');

                    if (data.success) {
                        msj_registrado.textContent = "Departamento registrado";
                    } else {
                        msj_registrado.textContent = data.message || "Error en el registro del departamento";
                    }

                    mensajeDiv.innerHTML = '';
                    mensajeDiv.appendChild(msj_registrado);

                    // Mostramos el mensaje solo 3 segundos
                    setTimeout(() => {
                        msj_registrado.remove();
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>
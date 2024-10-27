<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>

        header{

            /*Fondo*/
            background-color: rgb(242, 255, 127);
           
        
            /*texto*/
            text-align: center;
            color: rgb(83, 133, 83);
            text-shadow: 2px 2px 5px rgba(50, 53, 50, 0.9); /* Sombra negra con algo de transparencia */
            
          
        }
       
        body{
            background-color: beige;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 30px;
            padding-left: 40px;
            margin-top: 0px; 


           
         

        }

        form{

            /*contenedor*/
            background-color: rgb(242, 255, 127);
            border-radius: 10px;
            display: inline-block; /*El contenedor se adapta al tamaño del contenido*/
            padding: 50px; 
        }

        #recordar{
            font-size: 15px;
            
        }
      
        

    </style>
</head>
<body>
    <header><h1>logear usuarios: </h1></header>
    <main>

        <form action="3_db_login.php" method="post">

            <label for="username">Nombre: </label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Contraseña: </label>
            <input type="password" name="password" id="password">
            <br>
            <input type="checkbox" name="recordar" id="recordar">
            <label for="recordar">recordar usuario</label>
            <br>

           
          
            <br>
            <button type="submit">Iniciar Sesion</button>
            <button type="reset">Restablecer</button>





        </form>



    </main>
    
</body>
</html>
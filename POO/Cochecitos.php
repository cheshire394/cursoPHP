<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php


    include("Coches.php"); 
    class Cochecitos extends Coches{




    

    function arrancar(): void
    {
        parent :: arrancar(); //esta linea dice, en el metodo arrancar ejecuta todo el metodo de la clase padre equivale a super()
        
        echo " y después de ejecutar todo el metodo de la clase padre, imprime está frase"."\n"; 
    }
 


    }



    

    $miCochecito = new Cochecitos(); 
    $miCoche = new Coches(); 

    $miCochecito -> establecer_color("azulito"); //observamos que gracias a herencia si podemos acceder a los métodos de la clase padre
                                                // esto no lo podiamos hacer en la clase camión.
    
    $miCochecito -> arrancar();  

   echo "mi cochechito tiene ". $miCochecito-> getRuedas() . " ruedas \n" ; 
 
   


   
?>
    
</body>
</html>
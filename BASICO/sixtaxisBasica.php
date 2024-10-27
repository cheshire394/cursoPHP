
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- DAMOS ESTILO AL RESULTADO DE LA OPERACIÓN -->
<style>
    .resultado{
        color:violet; 
        font-size: 50px;
    }

    .validaEdad{
        color: green; 
        font-style: oblique;
        font-size: medium;
    }

    .NoValidaEdad{

        color: red; 
        font-style: oblique;
        font-size: medium;

    }
    
 
</style>


</head>
<body>

<?php   
        
?>
    <?php
            //variables(no es estricto con el tipo de dato, pero los String deben tener "", al no ser que sean constante): 

            //variables local y global son aquellas dentro de una función o fura de una función.
            //variable superGlobal ES AQUELLA ALAMACENADA EN OTRO ARCHIVO.

            //La palabrea reservada "global" no se puede utilizar en codigo principal, sino que debe de ser llamada desde una funcion mira el ejemplo con el nombre:
            
            //global $nombre = "ALicia";  --> en otras palabras, ESTO DA ERROR

            $nombre = "ALicia"; 

        function persona(){

            global $nombre; 
            $edad = 25; 
            $altura = 1.65; 
            $programador = true;  

             //concademanos con punto . = equivalente a +
             print("Hola "  .  $nombre . " y su edad es: ".$edad); 
             echo ("edad ".$edad); //echo consume menos recursos que print, por eso se recomienda usar echo siempre
      
        }
       // persona(); 



        //include llama a otro file de php para ejecutar ese codigo, es una forma de reutilización de codigo, 
        //require tiene la misma función con la diferencia de que si no encuentra el archivo, no continua ejecutando el codigo, sin embargo include
        //actua como una excepcion.

        //include("nombreArchivo.php"); 
        //require("nombreArchivo.php"); 

        //Static ; es una variable que almacena el valor de una variable local de forma definitiva, es decir que no se pierde aunque se termine de ejecuta el metodo
        //juega a eliminar la palabra static y observa como cambia el comportamiento del codigo.
        function incrementaVariable(){

             static $contador = 0; 

            $contador++; 
            echo ("EL valor del contador es " . $contador); 
        }

        //incrementaVariable(); 
        //incrementaVariable(); 

      
      // equals en php, se llama STRCMP , y no devuelve un bool sino un valor ASCII si son != y un 0 si son =. dicho de otro modo seropositivo
       
      function equals(){
      
      $var1 = "casa"; 
        $var2 = "CASA"; 
        echo "¿son iguales? ".strcmp($var1, $var2); 
        echo "¿son iguales? ".strcasecmp($var1, $var2); 

        $resultado = strcmp($var1, $var2); 
   

        if($resultado){
            echo"son iguales"; 
        }else {
            echo "son distintos"; 
        }
      }
      //equals(); 

    //constantes con define:

    //siempre debes de intentar defirnilas en mayusculas.
    // no deben de llevar $
    //es obligatorio el uso de define() 
    // por defecto una constante es GLOBAL
    //solo puede almacenarse en valores escalares.

    function constantes(){
    define("NOMBRE_CONSTANTE", "valor", true); //true hace que se pueda llamar al la variable en minusculas 
    echo NOMBRE_CONSTANTE; 

    //constantes predefinidas php
    echo ("la linea de esta constante predefinida es: " . __LINE__ . "\n"); //nos dicel la linea de donde se encuntra esta constante, es decir la 90
    echo ("la ruta de este archivo es: ". __FILE__ . "\n"); //nos dice la ruta de este fichero.
    echo ("El directorio de este archivo es ".__DIR__. "\n"); 
    
    }
    //constantes(); 


    ?>





<?php

    function formularioCalculadora(){

    
    //si se pulsa el boton...
    if(isset($_POST["button"])){

        // recogemos los valores introducidos en las casillas del formulario con $_POST["name"]; 
        // en codigo php lo valores del formulario se recogen llamando a la etiqueta "name", en JS y/o css seria a la etiqueta "id"
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"]; 
        $ope = $_POST["operacion"];

        //convertirmos a numericos
        $num1 = (int)$num1; 
        $num2 = (int)$num2; 
    
        

        if(is_numeric($num1) && is_numeric($num2)){

            switch($ope){
                case "multiplica":
                    $resultado = $num1 * $num2; 
                    echo("El resultado es: ". $resultado); 
                    break; 
                case "divide":
                    if($num2 != 0){
                        $resultado = $num1 / $num2; 
                        echo "<p class='resultado'>El resultado es: $resultado</p>";
                    }else echo ("división por 0 no es valida"); 
                    
                    break; 
                case "resta":
                    $resultado = $num1 - $num2; 
                    echo "<p class='resultado'>El resultado es: $resultado</p>"; 
                    break;  
                case "suma":
                    $resultado = $num1 + $num2; 
                    echo "<p class='resultado'>El resultado es: $resultado</p>"; 
                    break; 
                case "modulo": 
                    $resultado = $num1 % $num2; 
                    echo "<p class='resultado'>El resultado es: $resultado</p>";
                    break; 
                
                default:
                    echo "Operación no válida"; 
                    break; 
            }
        }else echo "No se han itroducdio numeros"; 
        


    }
}
//formularioCalculadora(); 


?>

<?php

//funciones matematicas

function random(){

    $num1= rand(); 
    $num2 = rand(10, 20); 
    $numeros = array(); 

    echo("resutado aleatorio: ". $num1."\n"); 
    echo("resultado entre 10 y 20: ".$num2."\n"); 

    //ARRAY DE ALEATORIOS
    for($i = 0; $i < 10; $i++){
        $numeros[$i] = rand(1,20); 
    }
    
    print_r($numeros); 
}

//random(); 

function potencia(){

    $num1 = pow(5,3); 
    echo("la potencia de 5 a la 3 es: ". $num1)."\n"; 

    $num2= round(sqrt($num1));
    echo("La raiz cuadrada de $num1 es: ". $num2);

}


//potencia(); 

function redondeo(){
    $num1= 5.50; 

    echo("el redondeo con ROUND de ".$num1 . " es: ".round($num1). "\n"); 
    echo("el redondeo con FLOOR de ".$num1 . " es: ".floor($num1). "\n"); 
    echo("el redondeo con CEIL de ".$num1 . " es: ".ceil($num1). "\n"); 

    //redondeo con decimales
    $num2 = round(5.6758754, 2); 
    echo("Redondeo a dos decimales: ". $num2. "\n"); 

    

}
//redondeo();

function maximos(){

    $maximo = max(1, 2, 3, 4, 5); 
   $minimo = min(1, 2, 3, 4, 5); 

   echo("el numero máximo es ". $maximo ." y el numero minimo es: ". $minimo); 

    //con arrays no hay que utilizar MIN_VALUE, NI MAX_VALUE como en java o JS, se hace con min() y max(): 

    $numeros = array(); 

    for($i = 0; $i < 10; $i++){
        
        $numeros[$i] = rand(); 
    }
    echo("el numero máximo del array es ". max($numeros) ." y el numero minimo es: ". min($numeros)); 
}
 // maximos(); 

 

?> 

<form name="edades" method="post" action="prueba.php">
    <table border="2" width="15%" align="center">
        <tr>
            <td>Nombre: </td>
            <td>
                <label for="userName"></label>
                <input type="text" name="userName" id="userName">
            </td>
        </tr>
        <tr>
            <td>Edad: </td>
            <td>
                <label for="edad"></label>
                <input type="text" name="edad" id="edad">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="enviado" id="enviado" value="Enviar">
            </td>
        </tr>
    </table>
</form>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function formularioEdades(){
   
    if (isset($_POST["enviado"])) {
        $nombre = $_POST["userName"];
        $edad = (int) $_POST["edad"]; // edad casteada

        if (is_numeric($edad) && $edad >= 0 && !empty($nombre)) {
            if ($edad >= 1 && $edad < 18) {
                echo "<p class='NoValidaEdad'>El usuario  . $nombre .  es menor de edad </p>";
            } else {
                echo "<p class ='validaEdad'>El usuario  . $nombre .  es mayor de edad</p>";
            }
        } else {
            echo "Datos introducidos incorrectamente";
        }
    }

    
}
//formularioEdades(); 

?>

   

<?php

function ternario(){

    //si se pulsa enviado en el formulario
    if (isset($_POST["enviado"])){

        $edad = (int) $_POST["edad"];

        echo ($edad < 18 ? "Acceso denegado" : "Accediendo..."); 
    }
}
//ternario(); 

function for_Each(){

    $numeros = [1, 2, 3, 4, 5];

    foreach($numeros as $numero){
            echo("USANDO FOR_EAHC  "); 
            echo($numero . "\n"); 
    }

    $personas = ["Andrés" => 28, "Jaqui" => 27]; 

    foreach($personas as $nombre => $edad){
        echo("nombre: ". $nombre . " edad: ". $edad). "\n"; 


        $frutas=[]; 
        foreach ($frutas as $fruta) {
            echo "Nombre: " . $fruta->getNombre() . ", Procedencia: " . $fruta->getProcedencia() . "\n";
        }
    }
}

//for_Each(); 
?>

<?php
    //funciones 

    function funciones(){
    $mayus = "MAYUSCULA"; 
    $minus = "minuscula";
    $titulo= "alicia en el pais de las maravilas"; 

    echo("El string $mayus convertido en minusculas ". strtolower($mayus). "\n"); 
    echo("El string $minus convertido en mayuscula ". strtoupper($minus). "\n"); 
    echo ("El titulo $titulo convertido al formato titulo => ". ucwords($titulo)); 

    }
   // funciones(); 

?>

<?php
     

    function pasoPorReferencia(&$valor){
        
        $valor++; 
        echo("Ejemplo de paso por referencia: ". $valor. "\n"); 

    }

    function pasoValor($valor){
        $valor++; 
        echo("Ejemplo de paso valor: ". $valor . "\n"); 
    }

    //cuando pasas por referencia (Y ESTO ES OBVIO PERO NO CAISTE) siempre tienes que pasar una variable, nunca el valor directamente
    $numero = 5; 
    pasoValor($numero); 
    echo("imprimimos el valor de numero fuera de pasoValor() y vemos que pierde el incremento cuando sale del metodo: ".$numero."\n"); 

    pasoPorReferencia($numero);
    echo("imprimimos el valor de numero fuera de pasoPorReferencia() y vemos que conserva el incremento que obtuvo en el metodo: ".$numero. "\n"); 
    

?>
   
</body>
</html>

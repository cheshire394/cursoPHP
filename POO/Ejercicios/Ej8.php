<?php 


/**8. Realiza una clase Temperatura, la cual convierta grados Celsius a
Farenheit y viceversa. Para ello, crea dos métodos que devolverán un
double (la temperatura convertida) llamados celsiusToFarenheit y
farenheitToCelsius, respectivamente. Ambos métodos recibirán como
parámetro la temperatura a convertir. Declara los métodos estáticos.
Ten cuenta que:
• Fahrenheit a Celsius: C=(F-32)/1.8
• Celsius a Farenheit: F=(1.8)C+32
En el método main() incorpora lo necesario para que la salida del
programa al ejecutarlo sea:
0 grados Celsius son 32.0 grados Farenheit
15 grados Celsius son 59.0 grados Farenheit
20 grados Celsius son 68.0 grados Farenheit
0 grados Farenheit son -17.77777777 grados Celsius
40 grados Farenheit son 4.4444444444444 grados Celsius
70 grados Farenheit son 21.1111111 grados Celsius */



class Temperatura{

    private static float $temperatura; 




    public static function celsiusToFarenheit($temp){

        $conversion = ($temp  * 1.8 ) + 32; 

        echo"La temperatura celsius " . $temp . " son en farenheit ". $conversion."\n"; 



    }

    public static function farenheitToCelsius($temp){

        $conversion = ($temp  - 32 ) / 1.8;
  
        echo"La temperatura farenheir " . $temp . " son en celsius ". $conversion . "\n"; 


    }



}
Temperatura :: celsiusToFarenheit(0); 
Temperatura :: celsiusToFarenheit(15); 
Temperatura :: celsiusToFarenheit(20); 


Temperatura :: farenheitToCelsius(0); 
Temperatura :: farenheitToCelsius(40); 
Temperatura :: farenheitToCelsius(70); 



?>
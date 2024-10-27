<?php

/*4. Realiza una clase Finanzas que convierta dólares a euros y viceversa.
Codifica los métodos dolaresToEuros (double dolares) y eurosToDolares
(double euros). Prueba que dicha clase funciona correctamente
haciendo conversiones entre euros y dólares.*/


class Finanzas {


    

      //  1  euro = 1.09 dolares; 

public static function convertir_dolares($euros) : float {

    $conversion = $euros * 1.09; 
    
    
    return $conversion;

}

public static function convertir_euros($dolares) : float{

    $conversion = $dolares *  0.9; 

    return $conversion;
    
}


}

$dolares = Finanzas :: convertir_dolares(1); 
$euros = Finanzas :: convertir_euros(1.09); 

echo ("Un dolar equivale a ".$euros. " euros y un euro equivale a ".$dolares. " dolares \n"); 



?>
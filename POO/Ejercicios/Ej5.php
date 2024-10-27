<?php


/*5. Realiza una clase MiNumero que proporcione el doble, el triple y
cuádruple de un número proporcionado en su constructor (realiza un
método para doble, otro para triple y otro para cuádruple). Haz una
clase de prueba para probar que los métodos funcionan correctamente. */

class MiNumero{


    private static int $num = 5; 


    public static function multiplica($operacion) : int {

        $resultado = -1; 

        $operacion = strtolower($operacion); 

        switch ($operacion){


            case "duplica": 
                    $resultado= self :: $num * 2; 
                    break; 

            case "triplica"; 
                    $resultado= self :: $num * 3; 
                    break; 

            case "cuadruplica": 
                    $resultado= self :: $num * 4; 
                    break; 
       
        }
        return $resultado; 

    }

}

$resultado = MiNumero :: multiplica("DUPLICA"); 
echo "El resultado es ". $resultado. "\n" ; 



?>
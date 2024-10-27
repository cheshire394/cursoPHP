
<?php
/*2. Crea una clase Coche con un atributo velocidad. Añade a la clase Coche
los siguientes métodos:
a. Método constructor sin parámetros.
b. int getVelocidad(). Este método devuelve la velocidad actual.
c. Int setVelocidad(). Este método actualiza la velocidad actual.
d. void acelera (int incremento). Este método actualiza la
velocidad a incremento kilómetros más.
e. void frena (int decremento). Este método actualiza la velocidad
a decremento kilómetros menos.*/


class Coche{


    private static int $vel = 100;
  
       


        public static  function cambiarVelocidad($numero) :int {

            $newVel = self :: $vel += $numero; 

            if($newVel < 0) $newVel = 0; //la velocidad nunca puede ser negatva

            return $newVel; 

        }
}




echo "nueva velocidad ". Coche :: cambiarVelocidad(50). "\n"; 
echo "nueva velocidad ". Coche :: cambiarVelocidad(-50). "\n"; 
echo "nueva velocidad ". Coche :: cambiarVelocidad(-50). "\n"; 
echo "nueva velocidad ". Coche :: cambiarVelocidad(-50). "\n"; 
echo "nueva velocidad ". Coche :: cambiarVelocidad(-50). "\n"; 






?>
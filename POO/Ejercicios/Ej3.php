<?php

/*3. Crea una clase Rebajas con un método descubrePorcentaje() que
descubra el descuento aplicado en un producto. El método recibe el
precio original del producto y el rebajado y devuelve el <porcentaje></porcentaje>*/




    function  descubrePorcentaje($oldPrice, $newPrice) : int {

        $porcentaje = 0; 
        $porcentaje = (($oldPrice - $newPrice) / $oldPrice) * 100;
        return $porcentaje;


    }

   $porcentaje=  descubrePorcentaje(100, 50); 
   echo"El porcentaje es: " .$porcentaje. " \n"; 


   




?>
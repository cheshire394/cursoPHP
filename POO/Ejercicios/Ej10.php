<?php


/*10. El restaurante mejicano de Israel cuya especialidad son las papas con
chocos nos pide diseñar un método con el que se pueda saber cuántos
clientes pueden atender con la materia prima que tienen en el almacén.
El método recibe la cantidad de papas y chocos en kilos y devuelve el
número de clientes que puede atender en el restaurante teniendo en
cuenta que, por cada tres personas, Israel utiliza un kilo de papas y
medio de chocos.
11. Modifica el programa anterior creando una clase que permita
almacenar los kilos de papas y chocos del restaurante. Implementa los
siguientes métodos:
a. public void addChocos(int x). Añade x kilos de chocos a los ya
existentes.
b. public void addPapas(int x). Añade x kilos de papas a los ya
existentes.
c. public int getComensales(). Devuelve el número de clientes que
puede atender el restaurante (este es el método anterior).
d. public void showChocos(). Muestra por pantalla los kilos de
chocos que hay en el almacén.
e. public void showPapas(). Muestra por pantalla los kilos de
papas que hay en el almacén.*/ 


class Restaurante{

    private static $k_chocos = 0.5; 
    private static $k_papas = 1; 

    
  /**
     * Get the value of k_chocos
     */ 
    public static function getK_chocos()
    {
        return self::$k_chocos;
    }

    /**
     * Set the value of k_chocos
     *
     * @return  self
     */ 
    public static function setK_chocos($k_chocos)
    {
        self::$k_chocos = $k_chocos;
    }

    /**
     * Get the value of k_papas
     */ 
    public static function getK_papas()
    {
        return self::$k_papas;
    }

    /**
     * Set the value of k_papas
     *
     * @return  self
     */ 
    public static function setK_papas($k_papas)
    {
        self::$k_papas = $k_papas;
    }







    public static function comensales($clientes){

        if( ! is_numeric($clientes)) {

            echo "Error no se ha introducido correctamente el numero de comensales \n"; 
            return; 
        }

        $stock_chocos = self :: getK_chocos();
        $stock_papas = self :: getK_papas(); 

        $unidadPapas = 1 / 3;  
        $unidadChocos = 0.5 / 3; 

        // 3 personas --> 1 kilo papa 0.5 kilos de chocos            
        $platos_chocos = $stock_chocos /  $unidadChocos;              
        $platos_papas = $stock_papas / $unidadPapas;

        if($platos_chocos < $clientes) echo "Se han gastado las reservas de chocos \n"; 
        if($platos_papas < $clientes) echo "Se han gastado las reservas de papas \n"; 

        //actualizamos el stock real del almacen
        self :: setK_chocos($stock_chocos - ($clientes * $unidadChocos));
        self :: setK_papas($stock_papas - ($clientes * $unidadPapas));
        
        


       


        
        echo "El total de stoc disponible para choscos es " . $platos_chocos. " \n"; 
        echo  "El total de stoc disponible para papas es " . $platos_papas. "\n"; 
   
    }


    public static function addAlmacen($ingrediente, $kilos){

        $ingrediente = strtolower($ingrediente); 

        if( ! is_numeric($kilos)) {

            echo "Error no se ha introducido correctamente los kilos"; 
            return; 
        }

        switch($ingrediente){

            case "chocos": 
                           $stock_actual =  self :: getK_chocos();
                           self :: setK_chocos($stock_actual + $kilos);
                            echo "El stock de chocos se ha incrementado de ". $stock_actual. " a ". self :: getK_chocos()." \n"; 

                           break;  

            case "papas":   
                            $stock_actual =  self :: getK_papas();
                            self :: setK_papas($stock_actual + $kilos); 
                            echo "El stock de papas se ha incrementado de ". $stock_actual. " a ". self :: getK_papas()." \n"; 
                            break; 

            default:  echo "Error ingrediente no registrado en el almacén "; 
                            break; 
        }

    }



 
}

Restaurante ::  comensales(3);
Restaurante ::  comensales(2);


//Restaurante :: addAlmacen("chocos", 0.5); 
//Restaurante :: addAlmacen("papas", 1); 





?>
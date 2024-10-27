<?php

/*2. En un almacén se guarda fruta para su posterior venta. Por cada
cargamento se tiene la siguiente información: nombre de la fruta,
procedencia, número de kilos, precio coste por kilo y precio venta por
kilo. Codificar una clase para manejar esta información de forma que
contenga las siguientes operaciones:
● Constructor
● Método que devuelva la información de cada cargamento de fruta.
● Método “rebajar” que rebaja el precio de venta en una cantidad
pasada como parámetro, (el precio de venta nunca puede ser
menor que el precio de coste).
● Método “vender”: se le pasa el número de kilos a vender y si hay
suficiente cantidad, se decrementa el número de kilos y se
devuelve el importe de la venta,

sino da error.● Método que nos diga si dos cargamentos de fruta tienen la misma
procedencia.
● Llevar en todo momento el beneficio obtenido por el almacén.
Para probar dicha clase hacer un main que:
● Dé de alta 3 cargamentos y muestre su información.
● Diga si los dos primeros tienen la misma procedencia.
● Rebaje el precio del tercero.
● Realice ventas de los tres cargamentos.
● Muestre el beneficio obtenido por el almacén.*/

class AlmacenFrutas{

   public static $num_ventas; 
   public static $recaudacion; 

public function __construct(

    private string $nombre,
    private string $procedencia, 
    private  float $kilos, 
    private float $priceCoste, 
    private float $priceVenta

    
) {}


  /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of procedencia
     */ 
    public function getProcedencia()
    {
        return $this->procedencia;
    }

    /**
     * Set the value of procedencia
     *
     * @return  self
     */ 
    public function setProcedencia($procedencia)
    {
        $this->procedencia = $procedencia;

        return $this;
    }

    /**
     * Get the value of kilos
     */ 
    public function getKilos()
    {
        return $this->kilos;
    }

    /**
     * Set the value of kilos
     *
     * @return  self
     */ 
    public function setKilos($kilos)
    {
        $this->kilos = $kilos;

        return $this;
    }

    /**
     * Get the value of priceCoste
     */ 
    public function getPriceCoste()
    {
        return $this->priceCoste;
    }

    /**
     * Set the value of priceCoste
     *
     * @return  self
     */ 
    public function setPriceCoste($priceCoste)
    {
        $this->priceCoste = $priceCoste;

        return $this;
    }

    /**
     * Get the value of priceVenta
     */ 
    public function getPriceVenta()
    {
        return $this->priceVenta;
    }

    /**
     * Set the value of priceVenta
     *
     * @return  self
     */ 
    public function setPriceVenta($priceVenta)
    {
        $this->priceVenta = $priceVenta;

        return $this;
    }


public static function rebajar($nombreFruta, $array, $rebaja){


    if(!is_numeric($rebaja)) {
        echo "Error: no se ha introducido una rebaja numerica"; 
        return; 
    }



    if(!is_string($nombreFruta)){
        echo "Error no se ha introducido un String como nombre de la fruta \n"; 
        return; 
    }else{
        $nombreFruta = strtolower($nombreFruta); 
    }



  
        for($i = 0; $i < count($array); $i++){

            if($nombreFruta == strtolower($array[$i]-> getNombre())){

                $coste = $array[$i]-> getPriceCoste(); 

                $ventaRebajado =  $array[$i]-> getPriceVenta() - $rebaja; 

                if($ventaRebajado <= $coste){
                    echo("La rebaja no se puede aplicar porque no cubre el precio de coste \n"); 
                }else{
                    $array[$i]-> setPriceVenta($ventaRebajado); 
                    echo "Rebaja aplicada con exito \n"; 
                }



            }
        }


     




        }
   

        /*Método “vender”: se le pasa el número de kilos a vender y si hay
        suficiente cantidad, se decrementa el número de kilos y se
        devuelve el importe de la venta, sino da error*/

        public static function vender($kilos, $fruta, $array){

    

            if(!is_numeric($kilos)) {
                echo "Error: no se ha introducido una referencia numerica \n"; 
                return; 
            }
        
        
        
            if(!is_string($fruta)){
                echo "Error no se ha introducido un String como nombre de la fruta \n"; 
                return; 
            }else{
                $fruta = strtolower($fruta); 
            }



            foreach($array as $item){

                echo strtolower($item-> getNombre()). " prueba \n"; 
                echo $fruta ." \n"; 

                if(strtolower($item-> getNombre()) == $fruta){
                   $stock=  $item -> getKilos(); 


           

                   if($stock < $kilos){
                        echo "Error, no hay stock para esta venta \n"; 
                        return; 
                   }else{
                    $stock=  $item -> getKilos(); 
                    $item -> setKilos($stock - $kilos); 
                    echo ("Venta ejecutada y almacén actualizado \n"); 

                    $total =  $item -> getPriceVenta() * $kilos; 

                    self :: $recaudacion += $total; //variable static que almacena la recaudacion total del negocio
                    self :: $num_ventas ++; 


                    return $total; 

                   }
                }
            }

        


        }



}





$cargamento = [
    new AlmacenFrutas("Pera", "Argentina", 8.2, 1.0, 2.0),
    new AlmacenFrutas("Naranja", "Brasil", 15.0, 0.8, 1.5),
    new AlmacenFrutas("Banana", "Ecuador", 20.0, 0.5, 1.2),
    new AlmacenFrutas("Uva", "Chile", 5.5, 2.0, 3.5),
    new AlmacenFrutas("Fresa", "México", 3.2, 2.5, 4.0),
    new AlmacenFrutas("Kiwi", "Nueva Zelanda", 7.0, 1.8, 3.0),
    new AlmacenFrutas("Melón", "España", 12.5, 0.7, 1.8),
    new AlmacenFrutas("Sandía", "Italia", 18.0, 0.6, 1.7),
    new AlmacenFrutas("Cereza", "Turquía", 2.5, 3.0, 5.0),
    new AlmacenFrutas("Mango", "India", 10.0, 1.5, 3.2)
];

AlmacenFrutas :: rebajar("NARANJA", $cargamento, 0.5); 

$total = AlmacenFrutas :: vender(1, "Pera" , $cargamento); 
$total = AlmacenFrutas :: vender(1, "Pera" , $cargamento); 
$total = AlmacenFrutas :: vender(1, "Pera" , $cargamento); 
//echo ("EL precio de la veta es ".$total. " euros \n")

echo "numero de ventas : ". AlmacenFrutas :: $num_ventas. "\n "; 
echo "Recaudación total : ". AlmacenFrutas :: $recaudacion. " \n"; 
 





?>
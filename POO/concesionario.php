
<?php

class Compra_vehiculo{

    private float $precio_base; 
    
    private static $descuento = 100; //atributo static que resta 100 euros.


    //metodo de instancia
    function __construct($gama)
    {
        $gama = strtolower($gama); 

        switch($gama){

            case "urbano": $this-> setPrecio_base(1000.0) ; 
                            break;
            case "compacto": $this-> setPrecio_base(2000.0);
                            break; 
            case "berlina": $this-> setPrecio_base(3000.0); 
                            break;   


            default: 
                echo "gama introducida no válida"; 
                break; 
        
    }
     
        }

    // METODO STATIC
    static function descuento_gobierno(){ //cuando el gobierno abre nuevas ayudas el descuento es de 1000 euros
            self :: $descuento= 1000; 
    }


    function precioFinaStatic(){

        $precioFinal = $this-> precio_base - self::$descuento; //ASI DEBEMOS LLAMAR A UN ATRIBUTO DE TIPO STATICO
        return $precioFinal; 

    }

    function tapizador($color){

        $color = strtolower($color); 

       switch($color){

        case "blanco": $this->precio_base += 100; 
                        break; 
        case "beige": $this->precio_base += 200; 
                        break; 
        default: //culquier otro color
                    $this->precio_base += 500; 
                    break; 
       }

    }

    function climatizador(){
        $this->precio_base += 200; 
    }

    function navegador_gps(){
        $this->precio_base += 500; 
    }

        
    
    /**
     * Get the value of precio_base
     */ 
    public function getPrecio_base()
    {
        return $this->precio_base;
    }

    /**
     * Set the value of precio_base
     *
     * @return  self
     */ 
    public function setPrecio_base($precio_base)
    {
        $this->precio_base = $precio_base;

        return $this;
    }
}

$miBerlina = new Compra_vehiculo("berlina"); 


echo "El precio de mi berlina es ". $miBerlina->getPrecio_base()."\n"; 


$miBerlina-> tapizador("BEIGE"); 
echo "El precio de mi berlina es ". $miBerlina->getPrecio_base(). " \n"; 





?>

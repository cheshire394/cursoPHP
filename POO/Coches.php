<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

class Coches{

    private string $color; 
    private  int $motor; 
    private int $ruedas; 


    //constructor....
    public function __construct() {
        $this->ruedas= 4;
        $this-> color = ""; 
        $this-> motor = 1600; 
    }

    //METODOS QUE OPERAN


    public function establecer_color($color) : void{

        $this -> setColor($color);  
        echo "El color asociado es ". $this-> color."\n"; 
    }

    public function arrancar() : void{

        echo "El coche ". $this-> getColor() ."  ya está arracando"."\n"; 
        
    }


    //GETTER Y SETTER
    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of ruedas
     */ 
    public function getRuedas()
    {
        return $this->ruedas;
    }

    /**
     * Set the value of ruedas
     *
     * @return  self
     */ 
    public function setRuedas($ruedas)
    {
        $this->ruedas = $ruedas;

        return $this;
    }
}

$volkswagen = new Coches(); 
$hyundai = new Coches(); 

$volkswagen -> establecer_color("Azul"); 



?>

    
</body>
</html>
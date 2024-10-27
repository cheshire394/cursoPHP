<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include("Coches.php"); 

class Camion{


    public function __construct(

        private string $color,
        private  int $motor = 1600, 
        private int $ruedas = 8

    ) {}
      

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
         * Get the value of motor
         */ 
        public function getMotor()
        {
                return $this->motor;
        }

        /**
         * Set the value of motor
         *
         * @return  self
         */ 
        public function setMotor($motor)
        {
                $this->motor = $motor;

                return $this;
        }

        /**
         * Get the value of ruedas
         */ 
        public function getRuedas()
        {
                return $this->ruedas;
        }
    }


    $scania = new Camion("blanco"); 
    echo "El camion ". $scania -> getColor(). " tiene ". $scania-> getRuedas(). "\n"; // el número de rueda lo hemos establecido por defecto

    $miCoche = new Coches();  //include permite acceder a la clase COCHE desde la clase camión.
    echo "Mi coche ". $miCoche -> getColor(). " tiene ". $miCoche-> getRuedas()."\n"; 

  //  $scania-> establecer_color("Naranja");    //ESTA LINEA DA ERROR PORQUE EL METODO PERTENECE A LA CLASE COCHE Y LA INTANCIA ES DE CAMIÓN.
  $miCoche-> establecer_color("Azul Marino"); //esta linea no da error porque llamamos a l metodo de la misma clase

  $scania-> setColor("Naranja"); 










?>
    
</body>
</html>
<?php

/*1. Crea la clase Coche con dos constructores. Uno no toma parámetros y
el otro sí. Los dos constructores inicializarán los atributos marca y
modelo de la clase. Crea dos objetos (cada objeto llama a un
constructor distinto) y verifica que todo funciona */

class Coche{

    public function __construct(
        //inicializamos los atributos para poder sobrecarga el constructor al instanciar objetos.
        private string $marca = "",
        private string $modelo = ""

    ) {
      
    }


        

        /**
         * Get the value of marca
         */ 
        public function getMarca()
        {
                return $this->marca;
        }

        /**
         * Set the value of marca
         *
         * @return  self
         */ 
        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }

        /**
         * Get the value of modelo
         */ 
        public function getModelo()
        {
                return $this->modelo;
        }

        /**
         * Set the value of modelo
         *
         * @return  self
         */ 
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }
    }

  
    $coche1 = new Coche();  
    $coche2 = new Coche("volkswagen", "polo"); 

    echo "Constructor por defecto " .$coche1-> getMarca() . "  ". $coche1-> getModelo(). " \n"; 
    echo "Constructor sobrecargado ". $coche2-> getMarca() . "  ". $coche2-> getModelo(). " \n"; 



?>
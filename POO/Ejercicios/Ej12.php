<?php


class Estudiante{

        private $nombre; 
        private $edad; 
        private $promedio; 
        private $notas= []; 

       

         public function __construct($nombre, $edad, $notas) {
            $this->nombre = $nombre; 
            $this-> edad = $edad; 
            $this-> notas = $notas; 
            $this-> promedio= $this-> calcularPromedio($notas); 

        }


        public function calcularPromedio($notas){
            $promedio = 0; 
            $suma = 0; 

            if(is_array($notas)){
            
                 $notas = array_values($notas); //obtenemos solo los valoras del array notas

               foreach($notas as $nota){
                $suma += $nota; 
               }

              if(count($notas) > 0) $promedio =  $suma / count($notas);
                

            }

           $promedio=  ($promedio < 5 || $promedio > 4  ? floor($promedio) : round($promedio)); //si la nota es 4 redonda a la baja el promedio

            return$promedio ; 

        }

        

        // Método para mostrar la información del estudiante
        public function mostrarInformacion(){

            echo "Nombre usuario: ". $this->getNombre() . " edad: ". $this-> getEdad(). " promedio: ". $this-> getPromedio(). "\n"; 
            echo "Las notas de ". $this-> getNombre(). " son:  \n"; 
            print_r($this->getNotas()); //los array no se pueden mostrat con echo


        }


        

         // Método para verificar si el estudiante ha aprobado

        public function aprobados(){
            $contAprob = 0; 
            $contSuspensos = 0; 

            $notas = $this-> getNotas(); //devulve solo los valores...

            foreach($notas as $nota){

                echo $nota. "\n"; 

                $nota >= 5 ? $contAprob++ : $contSuspensos++; 
            }

            echo "La cantidad de aprobados de ".$this-> getNombre(). " es ".$contAprob. "\n";
            echo "La cantidad de suspensos de ".$this-> getNombre(). " es ".$contSuspensos. "\n";

            //NOTA MAXIMA Y NOTA MINIMA
            $notaMax = max($notas);  // en js , podemos añadir un array asi Math.max(...$array); 
            echo "La nota maxima es: ". $notaMax. "\n"; 
        }

        //Mejor estudiante en cada asignatura. 

        public function mejorEstudiante($clase) {



            if(is_array($clase)){

                $nombreAlumno = ""; 
                $mejorNota = 0; 

                $matematicas= [];
                $lengua = [];
                $ingles = []; 



              




            }else echo "NO se ha introducido un array por paramentro"; 


            
            
        }







    

            /**
             * Get the value of edad
             */ 
            public function getEdad()
            {
                        return $this->edad;
            }

            /**
             * Set the value of edad
             *
             * @return  self
             */ 
            public function setEdad($edad)
            {
                        $this->edad = $edad;

                        return $this;
            }

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
             * Get the value of promedio
             */ 
            public function getPromedio()
            {
                        return $this->promedio;
            }

            /**
             * Set the value of promedio
             *
             * @return  self
             */ 
            public function setPromedio($promedio)
            {
                        $this->promedio = $promedio;

                        return $this;
            }

            /**
             * Get the value of notas
             */ 
            public function getNotas()
            {
                        return $this->notas;
            }

            /**
             * Set the value of notas
             *
             * @return  self
             */ 
            public function setNotas($notas)
            {
                        $this->notas = $notas;

                        return $this;
            }
}

$clase = [

    $alumno1 = new Estudiante("Alejandro", 20, $notas= ["matematicas" => 3, "Lengua" => 10, "ingles" => 6]),
    $alumno2 = new Estudiante("Martin", 22, $notas= ["matematicas" => 5, "Lengua" => 7, "ingles" => 8])

]; 


$alumno1->mostrarInformacion(); 
$alumno1-> aprobados(); 









?>
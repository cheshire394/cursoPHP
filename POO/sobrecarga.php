<?php
class Ejemplo {


    //CONSTRUCTOR SOBRECARGADO es necesario que los parametros este incializados, 

    //de esta forma cuando intanciemos a los objetos nos permite dar los argumentos que queramos, porque los otros argumentos 
    //los toma por defecto

    public function __construct(
        
        private int $param1 = 0, 
        private int $param2 = 0, 
        private int $param3 = 0


    ) { }
   
   
   
    //PHP NO TIENE SOBRECARGA DE METODOS COMO JAVA EN SU LUGAR EXISTE ESTE METODO
   
        public function mostrar() {
            $args = func_get_args();
            $num_args = func_num_args();
            
            switch ($num_args) {
                case 1:
                    echo "Un argumento: {$args[0]}\n";
                    break;
                case 2:
                    echo "Dos argumentos: {$args[0]} y {$args[1]}\n";
                    break;
                default:
                    echo "Número de argumentos no soportado\n";
            }
        }

        /**
         * Get the value of param1
         */ 
        public function getParam1()
        {
                return $this->param1;
        }

        /**
         * Set the value of param1
         *
         * @return  self
         */ 
        public function setParam1($param1)
        {
                $this->param1 = $param1;

                return $this;
        }

        /**
         * Get the value of param2
         */ 
        public function getParam2()
        {
                return $this->param2;
        }

        /**
         * Set the value of param2
         *
         * @return  self
         */ 
        public function setParam2($param2)
        {
                $this->param2 = $param2;

                return $this;
        }

        /**
         * Get the value of param3
         */ 
        public function getParam3()
        {
                return $this->param3;
        }

        /**
         * Set the value of param3
         *
         * @return  self
         */ 
        public function setParam3($param3)
        {
                $this->param3 = $param3;

                return $this;
        }
    }
    
    $ejemplo = new Ejemplo();

    //metodo sobrecargado
    $ejemplo->mostrar(1); // Un argumento: 1
    $ejemplo->mostrar(1, 2); // Dos argumentos: 1 y 2


    $ejemplo2 = new Ejemplo(1, 2); 
    echo "Ejemplo 2: parametro 1--> ". $ejemplo2->getParam1(). " y parametro 2 --> ". $ejemplo2->getParam2(). " \n"; 
    


    


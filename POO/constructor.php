<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

class Persona {



    public function __construct(

        private string $nombre,
        private int $edad,
        private string $genero,
        private string $nacionalidad,
        private array $hijos = [] // array


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
         * Get the value of hijos
         */ 
        public function getHijos()
        {
                return $this->hijos;
        }

        /**
         * Set the value of hijos
         *
         * @return  self
         */ 
        public function setHijos($hijos)
        {
                $this->hijos = $hijos;

                return $this;
        }
}


//creacion de persona
// Ejemplo de uso
$persona = new Persona(nombre: "Juan",edad: 30,genero: "Masculino",nacionalidad: "Española",hijos: ["Ana" => 5, "Luis" => 3 ]);

echo "Nombre: " . $persona->getNombre() . "\n";

echo "Hijos:\n";
foreach ($persona->getHijos() as $nombre => $edad) {
    echo "  - $nombre: $edad años\n";
}

?>
    
</body>
</html>
<?php


/*9. Implementa una clase Consumo, la cual forma parte de la centralita
electrónica de un coche y tiene las siguientes características:
• Atributos:
o kms: kilómetros recorridos con el coche
o litros: litros de combustible consumido
o vmed: velocidad media
o pgas: importe gastado en la gasolina
• Métodos:
o getTiempo: indicará el tiempo empleado en realizar el viaje
o consumoMedio: consumo medio del vehículo (en litros
cada 100 km)
o consumoEuros: consumo medio del vehículo (en euros
cada 100 kilómetros)
No olvides crear un constructor para la clase que establezca el valor de
los atributos. Elige el tipo de datos más apropiado para cada atributo.
Implementa los getters y setters de los atributos de la clase.*/



class Consumo{


    public function __construct(

        private float $kms,
        private float $litros, 
        private float $promedioVel,
        private float $gastos

    ) {}


        //getter y setter
        /**
         * Get the value of kms
         */ 
        public function getKms()
        {
                return $this->kms;
        }

        /**
         * Set the value of kms
         *
         * @return  self
         */ 
        public function setKms($kms)
        {
                $this->kms = $kms;

                return $this;
        }

        /**
         * Get the value of litros
         */ 
        public function getLitros()
        {
                return $this->litros;
        }

        /**
         * Set the value of litros
         *
         * @return  self
         */ 
        public function setLitros($litros)
        {
                $this->litros = $litros;

                return $this;
        }

        /**
         * Get the value of promedioVel
         */ 
        public function getPromedioVel()
        {
                return $this->promedioVel;
        }

        /**
         * Set the value of promedioVel
         *
         * @return  self
         */ 
        public function setPromedioVel($promedioVel)
        {
                $this->promedioVel = $promedioVel;

                return $this;
        }

        /**
         * Get the value of gastos
         */ 
        public function getGastos()
        {
                return $this->gastos;
        }

        /**
         * Set the value of gastos
         *
         * @return  self
         */ 
        public function setGastos($gastos)
        {
                $this->gastos = $gastos;

                
        }



    //METODOS QUE OPERAN 

    //getTiempo: indicará el tiempo empleado en realizar el viaje

    public function getTiempo(){

        $km = $this-> getKms(); 
        $promedioVel = $this-> getPromedioVel(); 
        $tiempo=  $km / $promedioVel;  //promedio son km * hora 

        return round($tiempo); 

}


//consumoMedio: consumo medio del vehículo (en litros cada 100 km)

public function consumoMedio (){

    $litros = $this -> getLitros(); 
    $kms = $this -> getKms(); 
 
    return ceil((100 * $litros) / $kms); 

}





//consumoEuros: consumo medio del vehículo (en euro cada 100 kilómetros)

public function consumoEuros(){

    $pagas = $this-> getGastos(); 
    $kms = $this -> getKms(); 

   return  ceil(($pagas * 100) / $kms); 

}


}





$viaje = new Consumo(350, 40, 120, 40); 

echo "El tiempo en realizar el viaje a valencia es ". $viaje-> getTiempo(). " horas \n"; 
echo "El consumo medio de gasolina  en realizar el viaje a valencia es ". $viaje-> consumoMedio() ." litros \n";
echo "los  gastos de gasolina  ". $viaje-> consumoEuros() ." Euros  \n"; 



?>
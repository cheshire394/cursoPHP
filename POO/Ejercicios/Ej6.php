<?php


/*6. Realiza una clase Numero que almacene un número entero y tenga las
siguientes características:
a. Constructor por defecto que inicializa a 0 el número interno.
b. Constructor que inicializa el número interno
c. Método añade que permite sumarle un número al valor
interno. El número a sumar se pasa por parámetro.
d. Método resta que resta un número al valor interno.
e. Método getValor. Devuelve el valor interno.
f. Método getDoble. Devuelve el doble del valor interno.
g. Método getTriple. Devuelve el triple del valor interno
h. Método setNumero. Inicializa de nuevo el valor interno
Haz una clase de prueba para probar la clase.
Extra: crea un método que asigne un valor aleatorio al número. Para
ello, busca información de cómo crear un número aleatorio.*/


class Numero{
public function __construct(

    private int $num = 0,

   

    
) {}


public function aleatorio(){

   $aleatorio= rand(1, 10); 

   $this-> setNum($aleatorio); 

    return $aleatorio; 
}

public function restablecerValor ():int
{
     $restablecer = $this-> getNum(); 

    return $restablecer; 

}




   

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set the value of num
     *
     * @return  self
     */ 
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }
}

$num1 = new Numero(); 
$aleatorio = $num1->aleatorio(); 
 //echo "El número aleatorio es: ".$aleatorio. " \n"; 

 echo "El numero ha sido asignado correctamente: ".$num1-> getNum()."\n"; 


 $num2 = new Numero(5); 
 $num2 -> aleatorio(); 


 
?>
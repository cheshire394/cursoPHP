<?php

require "1establecerConn.php"; 

//NOTA* -> es importante utilices la herencia para acceder al attribute --> conn
class mostrarEmple extends Conexion {

    public function __construct() {
        
        require "../rutaConexion.php";
        parent::__construct($host, $db_usuarios, $db_contraseña, $db_nombre); //el constructor de esta clase tiene como parametros la ruta 

    }

    public function mostrarEmpleados() {

        //en esta linea...es importante que accedas a conn sin --> $ 
        $consulta = $this->conn->query("SELECT emp_no, apellido FROM EMPLE"); 

        if ($consulta === false) {
            die("Error en la consulta: " . $this->conn->error);
        }

        $empleados = $consulta->fetch_all(MYSQLI_ASSOC); //contiene un array con todos los resultados

        return $empleados; 
    }

}

?>

<?php


class Conexion {

    protected $conn; //atributo de clase que será un array...con la ruta a la conexion.


    
    public function __construct($host, $db_usuarios, $db_contraseña, $db_nombre) {

    
        $this->conn = new mysqli($host, $db_usuarios, $db_contraseña, $db_nombre); 

        if($this->conn->connect_error){
            die("Fallo al establecer conexión con la BBDD: " . $this->conn->connect_error); 
        }

        $this->conn->set_charset("utf8"); //No eliminamos acentos
    }

    public function cerrarConn() {
        $this->conn->close();
    }

}

?>

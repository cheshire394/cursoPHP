<?php

/*La finalidad de esta pagina es comprobar que login existe, para ello vamos a usar codigo de tipo PDO */

try{

        //PASO 1) CONECTAR A LA BBDD
        require ("rutaConexion.php");

        $conn = new PDO(
            "mysql:host=$host;dbname=$db_nombre", //host + nombre de la bbbd
            $db_usuarios, 
            $db_contraseña,
            array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8')
        ); 

        //recuerda: con PDO, SI LA CONEXION NO SE PUEDE LANZAR DE LANZA UN RAISE: 
        $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


        //PASO 2 RESCATAMOS LOS VALORES INTRODUCIDOS EN FORMULARIO:
        
         //recuerda que cuando trabajamos con PDO, no se puede USAR real_scape_string, aunque si es recomendable utilizar hrmlentities
         //lo que hace basicamente es que si se introduce una etiqueta html , como <p> lo convierte &gt y estas cosas....
   
        $username= htmlentities($_POST["username"]);
        $password=  htmlentities($_POST["password"]); 


        //PASO 3) REALIZAMOS LA CONSULTA
        $consulta = "SELECT USERNAME, PASSWORD FROM USUARIOS WHERE UPPER(USERNAME) = UPPER(?) AND PASSWORD = ?"; 

        //ejemplo con marcadores nombrados-> "SELECT USERNAME, PASSWORD FROM USUARIOS WHERE UPPER(USERNAME) = UPPER(:nombre) AND PASSWORD = :contraseña"; 


        //PASO 4) PREPARAMOS  LA CONEXION PARA LA CONSULTA
        $preparada = $conn-> prepare($consulta); 

        //PASO 5) VINCULAMOS CON LOS MARCADORES ?, En el mismo orden que están en la consulta
        //nota* -> usamos bindParam porque hemos usado marcadores posicionales, si hubieramos usado marcadores de nombre, habria que ustilizar bindvalue()
        $preparada-> bindParam(1,$username, PDO::PARAM_STR);
        $preparada-> bindParam(2, $password, PDO::PARAM_STR); 

        //con  marcadores de nombre: 
       // $preparada-> bindValue(':nombre', $username, PDO::PARAM_STR);
        //$preparada-> bindValue(':contraseña',$password,  PDO::PARAM_STR); 


        //PASO 6) EJECUTAR LA CONSULTA: 
         $preparada-> execute(); 

        //PASO 7) OBTENER EL RESULTADO (SI QUISIERAMOS VISUALIZARLOS, PERO NO ES EL CASO): 
        
        //$resultado = $preparada-> fetchAll(PDO::FETCH_ASSOC); 

        // NOTA*-> RECUERDA QUE EL OBJETIVO ES SABER SI EL USUARIO PERTENECE A LA BBDD, PARA ELLO, NECESITAMOS SABER SI SQL NOS HA DEVUELTO LA CONSULTA VACIA = 0 FILAS, 
        //O COMO MINIMO CON UNA FILA ....PARA ELLO VAMOS A USAR ROWCOUNT
        
        if($preparada-> rowCount() > 0){  

            //si el usuario existe... entramos en una zona privada, y por lo tanto, debemos amplificar las medidas de seguridad
            // ya que si lo hacemos como en else, cualquier usuario pdria entrar en la zona privada solo escribiendo la ruta el la url


            //PASO 1) INCIAMOS SESISION 
            session_start();

            //PASO 2) 
           /* $_SESSION es una superglobal de PHP que se utiliza para almacenar datos que persisten a lo largo de las diferentes páginas
             de un sitio web mientras el usuario esté navegando. Esto es útil para mantener la sesión de un usuario autenticado 
             Sin necesidad de que se vuelva a logear en cada página.*/
            $_SESSION["nombre"] = $_POST["username"]; 


            //PASO3 ) REDIRIGIMOS A LA PAGINA QUE ES PRIVADA
           header("location:2login.php"); 

        }else{ //si el usuario no existe...redirigimos a la pagina del formulario: 
            header("location:formLogin.html"); 

        }





}catch(Exception $e){
    echo $e->getMessage(); 
}


?>

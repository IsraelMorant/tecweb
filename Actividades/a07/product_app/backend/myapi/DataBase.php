<?php
namespace Products\POO;
//Clase abstracta

abstract class DataBase{

    protected $conexion;

     public function __construct($db, $user,$pass) {//Conexion a la base de datos

        $this->conexion = @mysqli_connect(
        'localhost',
        $user,
        $pass,
        $db
        );

        /**
        * NOTA: si la conexión falló $conexion contendrá false
         **/
        if(!$this->conexion) {
            die('¡Base de datos NO conextada!');
        }
    }
}
?>
<?php
namespace Products\POO;
//Clase abstracta

abstract class DataBase{

    protected $conexion;
    protected $data;
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


    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        echo json_encode($this->data, JSON_PRETTY_PRINT);
    }
}
?>
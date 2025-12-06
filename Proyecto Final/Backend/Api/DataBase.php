<?php
namespace TECWEB\MYAPI;
//Clase abstracta

abstract class DataBase{

    protected $conexion;

     public function __construct() {//Conexion a la base de datos

        $this->conexion = @mysqli_connect(
        'localhost',
        'root',
        '',
        'marketzone'
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
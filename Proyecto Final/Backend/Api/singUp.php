<?php

namespace TECWEB\MYAPI;

require_once __DIR__ . '/DataBase.php';


class usuario extends DataBase{


    public function add($jsonOBJ) {
        $this->data = array(
            'status' => 'error',
            'message' => 'Ya existe uns registro con ese usuario'
        );

        if (isset($jsonOBJ->nombre)) {
            $usuario = $this->conexion->real_escape_string($jsonOBJ->usuario);
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $result = $this->conexion->query($sql);

            if ($result && $result->num_rows == 0) {
                $this->conexion->set_charset("utf8");

                $password = $this->conexion->real_escape_string($jsonOBJ->password ?? '');
                $nombre = $this->conexion->real_escape_string($jsonOBJ->nombre ?? '');
                $apellidoP = $this->conexion->real_escape_string($jsonOBJ->nombre ?? '');
                $apellidoM = $this->conexion->real_escape_string($jsonOBJ->nombre ?? '');

                $sql = "INSERT INTO usuarios (usuario, password, nombre, apellidoP, apellidoM)
                        VALUES ('$usuario', '$password', '$nombre', '$apellidoP', '$apellidoM')";

                if ($this->conexion->query($sql)) {
                    $this->data['status'] = "success";
                    $this->data['message'] = "Usuario agregado correctamente";
                } else {
                    $this->data['message'] = "Error al agregar Usuario: " . $this->conexion->error;
                }
            }
        }

        return json_encode($this->data);
    }

}
    
?>
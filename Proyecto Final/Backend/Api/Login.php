<?php
namespace TECWEB\MYAPI;
use TECWEB\MYAPI\DataBase;

require_once __DIR__ . '/DataBase.php';

class Login extends DataBase {
    public function auth($jsonOBJ) {
        $user = $jsonOBJ->usuario ?? '';
        $pass = $jsonOBJ->password ?? '';

        $data = [ "status" => "error", "message" => "Usuario o contraseña incorrectos" ];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$user' AND password = '$pass' LIMIT 1";
        $result = $this->conexion->query($sql);

        if ($result && $result->num_rows == 1) {
            $data = [
                "status" => "success",
                "message" => "Login exitoso"
            ];
        }

        return json_encode($data);
    }
}

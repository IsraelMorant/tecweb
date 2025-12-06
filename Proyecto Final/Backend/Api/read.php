<?php
namespace TECWEB\MYAPI;
use TECWEB\MYAPI\DataBase;

require_once __DIR__ . '/DataBase.php';

class Read extends DataBase {
    public function getAll() {
        $data = [];
        $sql = "SELECT * FROM productos WHERE eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return json_encode($data);
    }
}

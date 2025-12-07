<?php
namespace TECWEB\MYAPI;
use TECWEB\MYAPI\DataBase;

require_once __DIR__ . '/DataBase.php';

class Dashboard extends DataBase {
    public function getStats() {
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

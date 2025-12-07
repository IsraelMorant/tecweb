<?php
namespace TECWEB\MYAPI;
use TECWEB\MYAPI\DataBasePanel;

require_once __DIR__ . '/DataBase.php';

class DashboardP extends DataBase {
    public function getStats() {
        $productos = $this->conexion->query("SELECT COUNT(*) AS total FROM productos WHERE eliminado = 0");
        $usuarios = $this->conexion->query("SELECT COUNT(*) AS total FROM usuarios");

        $data = [
            "productos" => $productos->fetch_assoc()['total'] ?? 0,
            "usuarios" => $usuarios->fetch_assoc()['total'] ?? 0
        ];

        return json_encode($data);
    }
}
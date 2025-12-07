<?php

require_once 'DataBase.php';
require_once 'Login.php';
require_once 'Read.php';
require_once 'Productos.php';
require_once 'Dashboard.php';

use TECWEB\MYAPI\Login;
use TECWEB\MYAPI\Read;
use TECWEB\MYAPI\Products;
use TECWEB\MYAPI\Dashboard;

$method = $_GET['method'] ?? '';
$json = json_decode(file_get_contents('php://input'));

switch ($method) {
    case 'login':
        $api = new Login('localhost', 'root', '', 'mi_base');
        echo $api->auth($json);
        break;

    case 'get_products':
        $api = new Read('localhost', 'root', '', 'mi_base');
        echo $api->getAll();
        break;

    case 'add_product':
        $api = new Products('localhost', 'root', '', 'mi_base');
        echo $api->add($json);
        break;

    case 'dashboard_data':
        $api = new Dashboard('localhost', 'root', '', 'mi_base');
        echo $api->getStats();
        break;

    case 'productos_por_rango':
        $api = new Dashboard('localhost', 'root', '', 'mi_base');
        echo $api->getStats();
        break;
        
    case 'update_product':
    $api = new Products('localhost', 'root', '', 'mi_base');
    echo $api->update($json);
    break;

    case 'delete_product':
    $api = new Products('localhost', 'root', '', 'mi_base');
    echo $api->delete($json);
    break;



    default:
        echo json_encode([
            "status" => "error",
            "message" => "Método no válido"
        ]);
        break;
}

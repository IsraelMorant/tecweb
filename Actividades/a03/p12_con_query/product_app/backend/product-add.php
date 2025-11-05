<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $detalles= $_POST['detalles'];
    $imagen = $_POST['imagen'];
    //$detalles = $_POST['detalles'];
    //$producto = $_POST['name'];
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );
    //echo $producto;
    if(!empty($nombre)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        //$jsonOBJ = json_decode($detalles);
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
	    $result = $conexion->query($sql);
        
        if ($result->num_rows == 0) {
            $conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";
            if($conexion->query($sql)){
                $data['status'] =  "success";
                $data['message'] =  "Producto agregado";
            } else {
                 $data['status'] =  "faild";
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            }
        }

        $result->free();
        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
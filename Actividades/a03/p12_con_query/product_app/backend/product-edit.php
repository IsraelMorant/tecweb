<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
   // $producto = $_POST['nombre'];
    //$detalles = $_POST['detalles'];
    $id = $_POST['id'];
    //


    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $detalles= $_POST['detalles'];
    $imagen = $_POST['imagen'];


     $data = array(
        'status'  => 'error',
        'message' => 'No se pudo actualizar el producto'
    );



        $result = mysqli_query($conexion,"SELECT * FROM `productos` WHERE `id` = '{$id}'");
     if (mysqli_num_rows($result) > 0  ) {
      
           
    if(!empty($nombre)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
      //  $jsonOBJ = json_decode($detalles);
      
            $conexion->set_charset("utf8");
            $sql = "UPDATE productos SET nombre = '{$nombre}', marca = '{$marca}', modelo = '{$modelo}', precio = {$precio}, detalles = '{$detalles}', unidades =  '{$unidades}', imagen=  '{$imagen}' WHERE id = '{$id}'";
            if($conexion->query($sql)){
                $data['status'] =  "Exito";
                $data['message'] =  "Producto actualizado";
            } else {
                $data['status'] =  "Error";
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            }
        

        
        // Cierra la conexion
        $conexion->close();
             }
    
        $result->free();
    }




    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
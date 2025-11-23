<?php 


namespace Products\POO;

//Clase abstracta
include_once __DIR__.'/../DataBase.php';


class Update extends DataBase{


    
    public function __construct($db, $user = 'root', $pass = '')
    {
       

        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($db, $user, $pass);
    }

    
    public function edit(){

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


     $this->data = array(
        'status'  => 'error',
        'message' => 'No se pudo actualizar el producto'
    );



        $result = mysqli_query($this->conexion,"SELECT * FROM `productos` WHERE `id` = '{$id}'");
    if (mysqli_num_rows($result) > 0  ) {
      
           
        if(!empty($nombre)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
      //  $jsonOBJ = json_decode($detalles);
      
            $this->conexion->set_charset("utf8");
            $sql = "UPDATE productos SET nombre = '{$nombre}', marca = '{$marca}', modelo = '{$modelo}', precio = {$precio}, detalles = '{$detalles}', unidades =  '{$unidades}', imagen=  '{$imagen}' WHERE id = '{$id}'";
            if($this->conexion->query($sql)){
                $this->data['status'] =  "Exito";
                $this->data['message'] =  "Producto actualizado";
            } else {
                $this->data['status'] =  "Error";
                $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
        

        
            // Cierra la conexion
            $this->conexion->close();
        }
    
        $result->free();
    }
    

    }

}

?>
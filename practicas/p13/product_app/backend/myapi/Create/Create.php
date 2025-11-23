<?php 

namespace Products\POO;


//Clase abstracta
include_once __DIR__.'/../DataBase.php';


class Create extends DataBase {

     public function __construct($db, $user = 'root', $pass = '')
    {
        

        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($db, $user, $pass);
    }


    public function add(){

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
    $this->data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );
    //echo $producto;
    if(!empty($nombre)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        //$jsonOBJ = json_decode($detalles);
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
	    $result = $this->conexion->query($sql);
        
        if ($result->num_rows == 0) {
            $this->conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";
            if($this->conexion->query($sql)){
                $this->data['status'] =  "success";
                $this->data['message'] =  "Producto agregado";
            } else {
                 $this->data['status'] =  "faild";
                $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
        }

        $result->free();
        // Cierra la conexion
        $this->conexion->close();
    }

    

    

    }



}
?>
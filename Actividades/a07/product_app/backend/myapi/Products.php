<?php

namespace Products\POO;


//Clase abstracta
include_once __DIR__.'/DataBase.php';


class Products_single extends DataBase
{

    protected $data;


    public function __construct($db, $user = 'root', $pass = '', $response='')
    {
        $this->data = $response;


        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($db, $user, $pass);
    }




    public function singleByName()
    {


        // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
        $this->data = array();
        $id = $_POST['id'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ($result = $this->conexion->query("SELECT * FROM productos WHERE id = $id")) {
            // SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA


                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->data[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($this->conexion));
        }
        $this->conexion->close();

        

    }




    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        echo json_encode($this->data, JSON_PRETTY_PRINT);
    }
}







//Clase para mostrara la consulta de lista de productos(product-list.php)



class Products_list extends DataBase
{

    protected $data;


    public function __construct($db, $user = 'root', $pass = '', $response='')
    {
        $this->data = $response;


        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($db, $user, $pass);
    }




    public function list()
    {


         // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $this->data = array();

    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    if ( $result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0") ) {
        // SE OBTIENEN LOS RESULTADOS
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        if(!is_null($rows)) {
            // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
            foreach($rows as $num => $row) {
                foreach($row as $key => $value) {
                    $this->data[$num][$key] = utf8_encode($value);
                }
            }
        }
        $result->free();
    } else {
        die('Query Error: '.mysqli_error($this->conexion));
    }
    $this->conexion->close();
    
    

    }


    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        $this->data =json_encode($this->data, JSON_PRETTY_PRINT);
        
        return $this->data;
    }
}




//Clase para agregar productos 

class Products_add extends DataBase{

    protected $data;


    public function __construct($db, $user = 'root', $pass = '', $response='')
    {
        $this->data = $response;


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


    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        $this->data =json_encode($this->data, JSON_PRETTY_PRINT);
        
        return $this->data;
    }



   
}




//Clase para eliminar un producto de la base de datos

class Products_delete extends DataBase{
        protected $data;


    public function __construct($db, $user = 'root', $pass = '', $response='')
    {
        $this->data = $response;


        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($db, $user, $pass);
    }




    public function delete(){

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $this->data = array(
        'status'  => 'error',
        'message' => 'No se elimino el producto'
    );
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
        if ( $this->conexion->query($sql) ) {
            $this->data['status'] =  "success";
            $this->data['message'] =  "Producto eliminado";
		} else {
            $this->data['status'] =  "error";
            $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
        }
		$this->conexion->close();
    } 
    
   

    

    }


    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        $this->data =json_encode($this->data, JSON_PRETTY_PRINT);
        
        return $this->data;
    }
}



//Clase para editar un producto eligito de la lista mostrada

class Products_edit extends DataBase {



    protected $data;


    public function __construct($db, $user = 'root', $pass = '', $response='')
    {
        $this->data = $response;


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


    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        $this->data =json_encode($this->data, JSON_PRETTY_PRINT);
        
        return $this->data;
    }

}

//Clase para buscar por nombre

class Products_search_name extends DataBase {

    
    protected $data;


    public function __construct($db, $user = 'root', $pass = '', $response='')
    {
        $this->data = $response;


        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($db, $user, $pass);
    }




    public function search_name(){

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $this->data = false;
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['search']) ) {
        $search = $_POST['search'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        

        $sql = "SELECT * FROM productos WHERE nombre = '{$search}' AND eliminado = 0";
	    $result = $this->conexion->query($sql);
        
       
        if ( $result->num_rows != 0 ) {
            // SE OBTIENEN LOS RESULTADOS
			$rows = $result->fetch_all(MYSQLI_ASSOC);
            $this->data=true;
            
			$result->free();
		} else {
            $this->data = false;
            die('Query Error: '.mysqli_error($this->conexion));
            
        }
		$this->conexion->close();
    } 
    
    

    }


    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        //$this->data =json_encode($this->data, JSON_PRETTY_PRINT);
        
        return $this->data;
    }

}



//Clase para realizar busqueda atravez del input de busqueda si

class Products_search extends DataBase {


    
    protected $data;


    public function __construct($db, $user = 'root', $pass = '', $response='')
    {
        $this->data = $response;


        // SE USA CONSTRUCTOR DE LA SUPERCLASE Operacion
        parent::__construct($db, $user, $pass);
    }




    public function search(){

   // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $this->data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['search']) ) {
        $search = $_POST['search'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
        if ( $result = $this->conexion->query($sql) ) {
            // SE OBTIENEN LOS RESULTADOS
			$rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $this->data[$num][$key] = utf8_encode($value);
                    }
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
		$this->conexion->close();
    } 
    
    
    
    

    }


    public function getData(){
        // SE HACE LA CONVERSIÓN DE ARRAY A JSON
        $this->data =json_encode($this->data, JSON_PRETTY_PRINT);
        
        return $this->data;
    }


}

?>
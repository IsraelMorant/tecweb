<?php 
 namespace Products\POO;

 //Clase abstracta
include_once __DIR__.'/../DataBase.php';

class Delete extends DataBase{

    public function __construct($db, $user = 'root', $pass = '')
    {
       

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
}
?>
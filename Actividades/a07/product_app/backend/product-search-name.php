<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = false;
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['search']) ) {
        $search = $_POST['search'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        

        $sql = "SELECT * FROM productos WHERE nombre = '{$search}' AND eliminado = 0";
	    $result = $conexion->query($sql);
        
       
        if ( $result->num_rows != 0 ) {
            // SE OBTIENEN LOS RESULTADOS
			$rows = $result->fetch_all(MYSQLI_ASSOC);
            $data=true;
            
			$result->free();
		} else {
            $data = false;
            die('Query Error: '.mysqli_error($conexion));
            
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo $data;
    
?>
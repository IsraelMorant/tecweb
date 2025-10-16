<?php
    include_once __DIR__.'/database.php';
@$link = new mysqli('localhost', 'root', '', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

/** Crear una tabla que no devuelve un conjunto de resultados */

//Validando que el nombre, modelo y la marca no exitan ya en BD

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        /**
         * SUSTITUYE LA SIGUIENTE LÍNEA POR EL CÓDIGO QUE REALICE
         * LA INSERCIÓN A LA BASE DE DATOS. COMO RESPUESTA REGRESA
         * UN MENSAJE DE ÉXITO O DE ERROR, SEGÚN SEA EL CASO.
         */

        //Validando que no exista otro producto con el mismo nombre
        
      // $query = mysqli_query($link,"SELECT * FROM productos WHERE nombre = {$jsonOBJ->nombre}");
        $result = mysqli_query($conexion,"SELECT * FROM `productos` WHERE `nombre`='$jsonOBJ->nombre' AND `eliminado`=0" );
        //$nr = mysqli_num_rows($query);
        //$aux=false;
         if (mysqli_num_rows($result) > 0) {
        
             echo 44444;
		} else {
             //die('Query Error: '.mysqli_error($conexion));

              // Inserta los datos
            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('{$jsonOBJ->nombre}','{$jsonOBJ->marca}','{$jsonOBJ->modelo}','{$jsonOBJ->precio}','{$jsonOBJ->detalles}','{$jsonOBJ->unidades}','{$jsonOBJ->imagen}')";
            if(mysqli_query($conexion, $sql)){
                echo 1;
            } else {
                echo 2;
            }
           
			//$result->free();
          //  $result->free();
           
                
           
             
        }
		$conexion->close();


       // echo '[SERVIDOR] Nombre: '.$jsonOBJ->nombre;//Comprobnado que los datos lleguen correctamentes

     
    }
?>
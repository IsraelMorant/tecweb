<?php
$nombre = $_POST['name'] ;
$marca  = $_POST['marca'];
$modelo =$_POST['modelo'] ;
$precio = $_POST['precio'];
$detalles =$_POST['detalles'];
$unidades =$_POST['unidades'];
$imagen   =$_POST['imagen'] ;

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '5024', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

/** Crear una tabla que no devuelve un conjunto de resultados */

//Validando que el nombre, modelo y la marca no exitan ya en BD
$query = mysqli_query($link,"SELECT * FROM productos WHERE nombre = '".$nombre."' OR marca = '".$marca."' OR modelo = '".$modelo."'");

$nr = mysqli_num_rows($query);

if($nr ==1){

    echo "<script>window.alert('Error producto ya existente');
    window.location.href = 'http://localhost/tecweb/practicas/p09/formulario_productos.html';
    </script>";

}elseif ($nr==0) {

     
    //header("Location: login.html");
    echo "<script>window.alert('Producto insertado');
    // window.location.href = 'http://localhost/tecweb/practicas/p09/formulario_productos.html';
    </script>";
   // $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}','{}')";
    $sql="INSERT INTO productos (nombre, marca) VALUES ('{$nombre}','{$marca}')"; 
   if ( $link->query($sql) ) 
{
    echo 'Producto insertado con ID: '.$link->insert_id."<br>Nombre:".$nombre."<br>Marca:".$marca."<br>Modelo:".$modelo."<br>Precio:".$precio."<br>Detalles:".$detalles."<br>Unidades:".$unidades."<br>Imagen:".$imagen;
}
else
{
	echo 'El Producto no pudo ser insertado =(';
}
}



$link->close();
?>
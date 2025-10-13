<?php

//Recibiendo los datos de los input

#$id = $_POST['id'];
$nombre = $_POST['name'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_POST['imagen'];
/* MySQL Conexion*/
$link = mysqli_connect("localhost", "root", "", "marketzone");
// Chequea coneccion
if($link === false){
die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
}
// Ejecuta la actualizacion del registro
$sql = "UPDATE productos SET nombre='$nombre', marca='$marca', modelo='$modelo', precio='$precio', detalles='$detalles', unidades='$unidades', imagen='$imagen'  WHERE id=5";
if(mysqli_query($link, $sql)){
echo "Registro actualizado.";
} else {
echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
}
// Cierra la conexion
mysqli_close($link);
?>
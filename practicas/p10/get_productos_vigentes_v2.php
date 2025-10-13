<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	

       
<?php
  //  header("Content-Type: application/json; charset=utf-8"); 
    $data = array();

	if(isset($_GET['eliminado']))
    {
		$eliminado = $_GET['eliminado'];
    }
    else
    {
        die('Parámetro "eliminado" no detectado...');
    }

	if (!empty($eliminado))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', '', 'marketzone');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			//exit();
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE eliminado != $eliminado") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

            /** Se crea un arreglo con la estructura deseada */
            foreach($row as $num => $registro) {            // Se recorren tuplas
                foreach($registro as $key => $value) {      // Se recorren campos
                    $data[$num][$key] = utf8_encode($value);
                }
            }

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();
      //  echo $data;
        /** Se devuelven los datos en formato JSON */
        $data2 = json_encode($data, JSON_PRETTY_PRINT);
       // echo json_encode($data, JSON_PRETTY_PRINT);
	}
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		 <link rel="stylesheet"
              href= "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
              integrity= "sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
              crossorigin="anonymous" />
	
	
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		
		<?php if( isset($row) ) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Actualizar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
                        foreach ($row as $row) {
                            
                        
                    ?>
                    <tr id=<?php  $row['id'] ?>>
                        <td><b><?php echo $row['id'] ?></b></td>
                        <td class="row-data"><?php echo $row['nombre'] ?></td>
                        <td class="row-data"><?php echo $row['marca'] ?></td>
                        <td class="row-data"><?php echo $row['modelo'] ?></td>
                        <td class="row-data"><?php echo $row['precio'] ?></td>    
                        <td class="row-data"><?php echo $row['unidades'] ?></td>  
                        <td class="row-data"><?php echo $row['detalles'] ?></td>  <!-- No es necesaria la funcion de encode para mostrar los caracters especiales !-->
                        <td class="row-data"><img src=<?= $row['imagen'] ?> ></td>  
					   <td><b><input type="button" 
                               value="Actualizar" 
                               onclick="send2form('<?php echo $row['nombre'] ?>','<?php echo $row['marca'] ?>','<?php echo $row['modelo'] ?>','<?php echo $row['precio'] ?>','<?php echo $row['unidades'] ?>','<?php echo $row['detalles'] ?>','<?php echo $row['imagen'] ?>')"/></b></td>

                            
                    </tr>
                    <?php 
                        }
                    ?>
				</tbody>
			</table>

		<?php elseif(!empty($id)) : ?>


			 <script>
                alert('El ID del producto no existe');
             </script>

		<?php endif; ?>
	</body>
	<script src="http://localhost:8080/tecweb/practicas/p10/scripts/formulario.js" ></script>


	 <script>
            function send2form(name,marca,modelo,precio,unidades,detalles,imagen) {
                var form = document.createElement("form");

                var nombreIn = document.createElement("input");
                nombreIn.type = 'text';
                nombreIn.name = 'name';
                nombreIn.value = name;
                form.appendChild(nombreIn);

                var edadIn = document.createElement("input");
                edadIn.type = 'text';
                edadIn.name = 'marca';
                edadIn.value = marca;
                form.appendChild(edadIn);

				var modeloIn = document.createElement("input");
                modeloIn.type = 'text';
                modeloIn.name = 'modelo';
                modeloIn.value = modelo;
                form.appendChild(modeloIn);

				var precioIn = document.createElement("input");
                precioIn.type = 'text';
                precioIn.name = 'precio';
                precioIn.value = precio;
                form.appendChild(precioIn);

				var detallesIn = document.createElement("input");
                detallesIn.type = 'text';
                detallesIn.name = 'detalles';
                detallesIn.value = detalles;
                form.appendChild(detallesIn);

				var unidadesIn = document.createElement("input");
                unidadesIn.type = 'text';
                unidadesIn.name = 'unidades';
                unidadesIn.value = unidades;
                form.appendChild(unidadesIn);

				var imagenIn = document.createElement("input");
                imagenIn.type = 'text';
                imagenIn.name = 'imagen';
                imagenIn.value = imagen;
                form.appendChild(imagenIn);

                console.log(form);

                form.method = 'POST';
                form.action = 'http://localhost:8080/tecweb/practicas/p10/formulario_productos_v2.php';  

                document.body.appendChild(form);
                form.submit();
            }
        </script>



</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

    

  
     <h1>Registro de productos</h1>

    <p>Ingrese la informacion requerida del producto<br><br></p>

    <form id="formularioProductos"  method="post">

    <h2>Información del productos</h2>

      <fieldset>
        <legend>Información Personal</legend>

        <ul>
          <li><label for="form-name">Nombre:</label> <input type="text" name="name" id="form-name" value="<?= !empty($_POST['name'])?$_POST['name']:$_GET['name'] ?>"></li>
          <li><label for="form-marca">Marca:</label> 
          <ul>
          <li><input type="radio" name="marca" id="marcaA" value="Apple" >Apple</li>
          <li><input type="radio" name="marca" id="marcaS" value="Samsung">Samsung</li>
          <li><input type="radio" name="marca" id="marcaL" value="LG">LG</li>
          <li><input type="radio" name="marca" id="marcaM" value="Motorola">Motorola</li>
          </ul>
          </li>
          <li><label for="form-modelo">Modelo:</label> <input type="text" name="modelo" id="form-modelo" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"></li>
          <li><label for="form-precio">Precio:</label> <input type="number" name="precio" id="form-precio" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"></li>
          <li><label for="form-detalles">Detalles Del Producto:</label><br><textarea name="detalles" rows="4" cols="60" id="form-detalles" placeholder="No más de 250 caracteres de longitud" value="<?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?>" value="dasdsa"><?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?></textarea></li>
          <li><label for="form-unidades">Unidades:</label> <input type="number" name="unidades" id="form-unidades" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"></li>
          <li><label for="form-imagen">Imagen:</label> <input type="text" name="imagen" id="form-imagen" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>"></li>
        </ul>
      </fieldset>

      
       

      <p>
        <input type="submit" value=" Actualizar producto" onclick="validar()">
        <input type="reset">
      </p>

    </form>

</body>

    <script src="http://localhost:8080/tecweb/practicas/p10/scripts/formulario.js" ></script>


    
</html>
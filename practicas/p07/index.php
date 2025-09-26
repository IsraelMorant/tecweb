<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 07</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <form method="GET">


    <div>
        <label for="numero">Numero</label>
        <input type="number" name="numero" id="numero" value="1">
    </div>

    <div>
        <input type="submit" value="Es multiplo?" name="enviarNum">
    </div>


    </form>
    <h2>
    <?php
    include("src/funciones.php");
    multiplo();

    tresAleatorios($matriz=[],$termino=false,$fila=0);


    encontrarNumero();

    arregloAscii();
    ?>

    </h2>
</body>
</html>
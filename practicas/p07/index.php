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
   // encontrarNumero();
    tresAleatorios($matriz=[],$termino=false,$fila=0);


   

    
    ?>

    </h2>





    <form method="GET">


    <div>
        <label for="numeroD">Numero</label>
        <input type="number" name="numeroD" id="numeroD" value="1">
    </div>


    
    <div>
        <input type="submit" value="Encontrar Numero" name="encotrarNum">
    </div>


    </form>





     <h2>
    <?php
   
   
    encontrarNumero();
    arregloAscii();

    ?>

    </h2>




    

     <form method="POST">


    <div>
        <label for="sexo">Sexo</label>
        <input type="text" name="sexo" id="sexo" value="masculino">
    </div>

    <div>
        <label for="edad">Edad</label>
        <input type="number" name="edad" id="edad" value="1">
    </div>

    <div>
        <input type="submit" value="Verificar" name="verificar">
    </div>


    </form>

    <?php
    
    verificarSE();
    ?>




  <form method="POST">


    <div>
        <label for="matricula">Matricula</label>
        <input type="text" name="matricula" id="matricula" value="00000">
    </div>

     <div>
        <label for="ver">Ver todo el regsitro</label>
		    <input id="ver" type="checkbox" name="ver"/>
		    
    </div>

    <div>
        <input type="submit" value="Consultar" name="buscar">
    </div>

    

    </form>


  
    <?php
    
    buscarAuto();
    ?>
</body>
</html>
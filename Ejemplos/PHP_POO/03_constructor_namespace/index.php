<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03 Constructor y namespace</title>
</head>
<body>
    <?php
 use EJEMPLOS\POO\Cabecera as Cabecera;
    require_once __DIR__.'/Cabecera.php';

    $cab1 = new Cabecera('El rincón del Programador', 'center');
    $cab1->graficar();

    /*$cab1 = new Cabecera('El rincón del Programador', 'center', 'https://www.cs.buap.mx');
    $cab1->graficar();*/
    

    ?>
</body>
</html>
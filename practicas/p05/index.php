<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2</h2>

    <?php
    
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    echo "<h4>Mostrando el cotenido de cada variable:</h4>";
    echo "<ul>";
    echo "<li>Variable a: $a </li> <br>";
    echo "<li>Variable b: $b </li> <br>";
    echo "<li>Variable c: $c </li> <br>";

    echo "</ul>";  
    $a = "PHP server";
    $b = &$a;

    echo "<h4>Actualizando y mostrando el cotenido de cada variable:</h4>";

    echo "<ul>";
    echo "<li>Variable a: $a </li> <br>";
    echo "<li>Variable b: $b </li> <br>";
    echo "</ul>";
    
    echo "<h4>Explicacion de lo ocurrido en la actualizacion de las variables</h4>";


    echo "<p>";
    echo 'Se les asigno un nuevo valor a las variables, en la variable "a" se le asigno una cadena y en la varible "b" el contenido de la variable "a"';
    echo "</p>";
    
    ?>

    <h2>Ejercicio 3</h2>

    <?php 
    
    
    echo "<ul>";
    $a = "PHP5";
    echo "<li>Mostando el contenido de la variable a: $a </li><br>";
    $z[] = &$a;
    echo "<li>Mostando el contenido de la variable z: $z[0] </li><br>";
    $b = "5a version de PHP";
    echo "<li>Mostando el contenido de la variable b: $b </li><br>";
    
    @$c = $b*10;
    echo "<li>Mostando el contenido de la variable c: $c </li><br>";
    
    $a .= $b;
    echo "<li>Mostando el contenido de la variable a: $a </li><br>";
    
    $b *= $c;
    echo "<li>Mostando el contenido de la variable b: $b </li><br>";
    
     $z[0] = "MySQL";
    echo "<li>Mostando el contenido de la variable z: $z[0] </li><br>";
    echo "</ul>";
    
    ?>

    <h2>Ejercicio 4</h2>


    

    <?php

    echo "<h2>Mostrando el contenido con ayuda de GLOBALS</h2>";


    
     echo "<ul>";
    $a = "PHP5";
    echo "<li>Mostando el contenido de la variable a: $GLOBALS[a] </li><br>";
    $z[] = &$a;
    $aux = $z[0];
    echo "<li>Mostando el contenido de la variable z:  $GLOBALS[aux] </li><br>";
    $b = "5a version de PHP";
    echo "<li>Mostando el contenido de la variable b:  $GLOBALS[b] </li><br>";
    
    @$c = $b*10;
    echo "<li>Mostando el contenido de la variable c:  $GLOBALS[c] </li><br>";
    
    $a .= $b;
    echo "<li>Mostando el contenido de la variable a:  $GLOBALS[a] </li><br>";
    
    $b *= $c;
    echo "<li>Mostando el contenido de la variable b:  $GLOBALS[b] </li><br>";
    
     $z[0] = "MySQL";
     $aux = $z[0];
    echo "<li>Mostando el contenido de la variable z:  $GLOBALS[aux] </li><br>";
    echo "</ul>";
    
    
    
   
    

    ?>

    <h2>Ejercicio 5</h2>

    <?php 

    
    
    
    

    echo "<h4>Mostrando las variables:</h4>";

    echo "<ul>";
    $a = "7 personas";
    echo "<li>Variable a: $a</li><br>";
    $b = (integer) $a;
    echo "<li>Variable b: $b</li><br>";
    $a = "9E3";
    echo "<li>Variable a: $a</li><br>";
    $c = (double) $a;
    echo "<li>Variable c: $c</li><br>";
    echo "</ul>";
    ?>

    <h2>Ejercicio 6</h2>


    <?php
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    echo "<h4>Comprobando el valor de las variables:</h4>";

    echo "<ul>";

    echo "<li> Variable a: ";
    var_dump($a);
    echo "</li><br>";

     echo "<li>Variable b: ";
    var_dump($b);
    echo "</li><br>";

     echo "<li> Variable c: ";
    var_dump($c);
    echo "</li><br>";

     echo "<li> Variable d: ";
    var_dump($d);
    echo "</li><br>";

     echo "<li> Variable e: ";
    var_dump($e);
    echo "</li><br>";

     echo "<li> Variable f: ";
    var_dump($f);
    echo "</li><br>";
    echo "</ul>";


    echo "<h4>Imprimiendo el valor booleano de c y e:</h4>";

    
    echo "<ul>";
    $c=var_export($c,true);//True es para regresar un resultado de la funcion, viene por defautl en false, y arroja directo el resultado en la pantalla en lugar de guardarlo en la variable
    echo "<li>Variable c: $c</li><br>";
    $e=var_export($e,true);
    echo "<li>Variable c: $e</li><br>";
    echo "</ul>";

    ?>
</body>
</html>
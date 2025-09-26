<?php 

function multiplo(){


if (isset($_GET['numero'])&&isset($_GET['enviarNum'])) {
    $num=$_GET['numero'];
    if( $num%5==0 && $num%7==0 ){
echo "El numero es multiplo de 5 y 7 <br>";
}else{

    echo "El numero NO es multiplo de 5 y 7 <br>";
}
}else{

    $num=0;
}

}


function tresAleatorios($matriz,$termino,$fila){

if ($termino==true) {
   $total = $fila*3;
echo  "Numeros obtenidos: ".$total."Numero de iteraciones: ".$fila;

return;
}
 $impar=0;
    $par=0;
  //  $col1=0;
   // $col2=0;
  // $col3=0;
    $matriz[$fila][1]=random_int(100,999);
    $matriz[$fila][2]=random_int(100,999);
    $matriz[$fila][3]=random_int(100,999);
  //  $col1= $matriz[$fila][1];
  //  $col2= $matriz[$fila][2];
   // $col3= $matriz[$fila][3];
  //  $mierda1 = $col1 % 2;
   // $mierda2 = $col2 % 2;
  //  $mierda3 = $col3 % 2;

   // echo "Evaluaciones:".($col1 % 2). ($col2 % 2). ($col3 % 2);
    if( ($matriz[$fila][1] % 2) != 0 ) $impar+=1;
    if( ($matriz[$fila][2] % 2) == 0) $par+=1;
    if( ($matriz[$fila][3] % 2)!= 0) $impar+=1;

    if($impar == 2 && $par == 1) $termino=true;
   // echo "Numero de impares:".$impar. "Numero de pares".$par."<br>";
    echo $matriz[$fila][1] . " " . $matriz[$fila][2] . " ". $matriz[$fila][3] ."<br>";
    tresAleatorios($matriz,$termino,$fila + 1);


 
}


?>
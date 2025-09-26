<?php 

function multiplo(){


if (isset($_GET['numero'])&&isset($_GET['enviarNum'])) {
    $num=$_GET['numero'];
    if( $num%5==0 && $num%7==0 ){
echo "El numero es multiplo de 5 y 7";
}else{

    echo "El numero NO es multiplo de 5 y 7";
}
}else{

    $num=0;
}

}


?>
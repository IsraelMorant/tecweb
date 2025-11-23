<?php
 use Products\POO\Update as Products; 
    include_once __DIR__.'/vendor/autoload.php';
    $products = new Products('marketzone');
    $products->edit();
    echo $products->getData();
?>
<?php
 use Products\POO\Delete as Products; 
    include_once __DIR__.'/vendor/autoload.php';
    $products = new Products('marketzone');
    $products->delete();
    echo $products->getData();
?>
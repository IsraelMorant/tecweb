<?php
    use Products\POO\Read as Products; 
    include_once __DIR__.'/vendor/autoload.php';
    $products = new Products('marketzone');
    $products->search();
    echo $products->getData();
?>
<?php
    use Products\POO\Create as Products; 
    include_once __DIR__.'/vendor/autoload.php';
    $products = new Products('marketzone');
    $products->add();
    echo $products->getData();
?>
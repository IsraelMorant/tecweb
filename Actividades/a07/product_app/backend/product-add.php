<?php
     use Products\POO\Products_add as Products; 
    include_once __DIR__.'/myapi/Products.php';
    $products = new Products('marketzone');
    $products->add();
    echo $products->getData();
?>
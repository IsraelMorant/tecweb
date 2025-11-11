<?php
 use Products\POO\Products_edit as Products; 
    include_once __DIR__.'/myapi/Products.php';
    $products = new Products('marketzone');
    $products->edit();
    echo $products->getData();
?>
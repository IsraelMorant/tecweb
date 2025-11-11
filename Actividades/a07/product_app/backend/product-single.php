<?php
 use Products\POO\Products_single as Products; 
    include_once __DIR__.'/myapi/Products.php';
    $products = new Products('marketzone');
    $products->singleByName();
    echo $products->getData();

?>
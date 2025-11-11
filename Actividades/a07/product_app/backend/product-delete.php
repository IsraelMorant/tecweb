<?php
 use Products\POO\Products_delete as Products; 
    include_once __DIR__.'/myapi/Products.php';
    $products = new Products('marketzone');
    $products->delete();
    echo $products->getData();
?>
<?php

 use Products\POO\Products_search_name as Products; 
    include_once __DIR__.'/myapi/Products.php';
    $products = new Products('marketzone');
    $products->search_name();
    echo $products->getData();

?>
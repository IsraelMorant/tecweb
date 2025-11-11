<?php
    use Products\POO\Products_search as Products; 
    include_once __DIR__.'/myapi/Products.php';
    $products = new Products('marketzone');
    $products->search();
    echo $products->getData();
?>
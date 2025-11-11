<?php
    use Products\POO\Products_list as Products; 
    include_once __DIR__.'/myapi/Products.php';
    $products = new Products('marketzone');
    $products->list();
    echo $products->getData();
?>
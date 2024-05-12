<?php
function getProducts(){
    $sql = "SELECT * FROM product";
    return get_all($sql);
}

function getProductsByIdCatalogy($idCatalogy){
    $sql = "SELECT * FROM `product` WHERE category_id = ".$idCatalogy;
    return get_all($sql);
}

function getProductDetail($idProduct){
    $sql = "SELECT * FROM `product` WHERE id = ".$idProduct;
    return get_one($sql);
}
<?php
function getCarts(){
    $sql = "SELECT * FROM cart";
    return get_all($sql);
}
function addToCart($userid ,$id, $name, $price, $quantity){
    $sql = 'INSERT INTO `cart` (`userid`, `productid`, `quantity`, `price`, `total`, `date_added`) VALUES 
    ('.$userid.', '.$id.', '.$quantity.', '.$price.', '.$price * $quantity.', CURRENT_TIMESTAMP());';
    return insert($sql); 
}

function deleteCart($id){
    $sql = "DELETE FROM cart WHERE id = $id;";
    return del($sql);   
}
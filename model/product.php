<?php
function getProducts(){
    $sql = "SELECT * FROM product";
    return get_all($sql);
}
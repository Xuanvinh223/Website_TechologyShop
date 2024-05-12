<?php
function getCatelogys() {
    $sql = "SELECT * FROM category";
    return get_all($sql);
}

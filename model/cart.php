<?php 

function insert_cart($order_id, $name, $price, $img, $quantity) {
    $sql = "INSERT INTO cart (order_id, name, price, img, quantity) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $order_id, $name, $price, $img, $quantity);
}





?>
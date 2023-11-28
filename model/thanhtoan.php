<?php 

function get_orders($username){
    $sql= "SELECT * FROM `order` WHERE user = '$username'";
    $orders = pdo_execute($sql);
    return $orders;
}
function get_order_details($order_id) {
    $sql = "SELECT * FROM `order_details` WHERE order_id = :order_id";
    $params = array(':order_id' => $order_id);
    
    // Thực hiện truy vấn SQL với tham số order_id
    $orderDetails = pdo_execute($sql, $params);

    return $orderDetails;
}

function load_order(){
    $sql = "SELECT * FROM `order` ORDER BY id desc";
    $listorder=pdo_query($sql);
    return $listorder;
}

function delete_dh($id){
    $sql = "DELETE FROM `order` WHERE id=".$id;
    pdo_execute($sql);
}


?>
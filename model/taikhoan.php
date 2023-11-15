<?php
function insert_taikhoan($email,$user,$pass){
    $sql = "INSERT INTO customer (email,user,pass) VALUES ('$email','$user','$pass')";
    pdo_execute($sql);
}

function check_user($user,$pass){
    $sql = "SELECT * FROM customer WHERE user='".$user."' AND pass='".$pass."'";
    $sp=pdo_query_one($sql);
    return $sp;
}

function check_email($email){
    $sql = "SELECT * FROM customer WHERE email='".$email."'";
    $sp=pdo_query_one($sql);
    return $sp;
}

function update_taikhoan($id,$user,$pass,$email,$address,$tel){

    $sql = "UPDATE customer SET user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' WHERE id=".$id;
    pdo_execute($sql);
}

function load_add_taikhoan(){
    $sql = "SELECT * FROM customer ORDER BY id desc";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}

function delete_xoatk($id){
    $sql = "DELETE FROM customer WHERE id=".$id;
    pdo_execute($sql);
}
?>
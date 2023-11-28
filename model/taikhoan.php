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

function check_usernew($user,$newpass){
    $sql = "SELECT * FROM customer WHERE user='".$user."' AND pass='".$newpass."'";
    $sp=pdo_query_one($sql);
    return $sp;
}

function check_email($email){
    $sql = "SELECT * FROM customer WHERE email='".$email."'";
    $sp=pdo_query_one($sql);
    return $sp;
}

function update_taikhoan($id,$user,$newpass,$email,$address,$address_other,$phone){

    $sql = "UPDATE customer SET user='".$user."',pass='".$newpass."',email='".$email."',address='".$address."',address_other='".$address_other."',phone='".$phone."' WHERE id=".$id;
    pdo_execute($sql);
}

function update_mk($email,$newpass){

    $sql = "UPDATE customer SET pass='".$newpass."' WHERE email='".$email."'";
    pdo_execute($sql);
}

function update_thongtin($id,$user,$email,$address,$address_other,$phone){

    $sql = "UPDATE customer SET user='".$user."',email='".$email."',address='".$address."',address_other='".$address_other."',phone='".$phone."' WHERE id=".$id;
    pdo_execute($sql);
}

function load_add_taikhoan(){
    $sql = "SELECT * FROM customer ORDER BY id desc";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}

function getUserEmail($email){
    $sql = "SELECT * FROM customer WHERE email ='.$email.'";
    $sp=pdo_query_one($sql);
    if ($sp) {
        return $sp;
    }else{
        $baoloi = "Email không tồn tại !";
    }
}

function delete_xoatk($id){
    $sql = "DELETE FROM customer WHERE id=".$id;
    pdo_execute($sql);
}
?>
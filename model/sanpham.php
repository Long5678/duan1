<?php 

function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm) {
    $sql="insert into product(name, price, img, description, category_id) values('$tensp', '$giasp', '$hinh', '$mota', '$iddm')";
    pdo_execute($sql);
} 

function delete_sanpham($id) {
    $sql = "delete from product where id=?";
    pdo_execute($sql, $_GET['id']);
} 

function loadall_sanpham_home() {
    $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_top10() {
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


function loadall_sanpham($kyw="",$iddm=0) {
    $sql = "select * from product where 1";
    if($kyw!="") {
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0) {
        $sql.=" and category_id='".$iddm."'";
    }

    $sql.=" order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadone_sanpham($id) {
    $sql = "select * from product where id =".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function load_ten_dm($iddm) {
    if($iddm>0){
    $sql = "select * from category where id =".$iddm;
    $dm = pdo_query_one($sql);
    extract($dm);
    return $name;
    }else {
        return "";
    }
}

function load_sanpham_cungloai($id, $iddm) {
    $sql = "select * from product where category_id=".$iddm." AND id <> " .$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh) {
    if ($hinh!="") {
        $sql = "update product set category_id = '". $iddm . "', name ='". $tensp . "', price = '". $giasp . "', description = '" . $mota . "', img = '" . $hinh . "' WHERE id = " . $id;
    } else {
        $sql = "update product set category_id = '". $iddm . "', name = '". $tensp . "', price = '" . $giasp . "', description = '" . $mota . "' WHERE id = " . $id;
    }
    pdo_execute($sql);
}


?>
<?php 

function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm, $nsx, $dd, $HSD, $kl) {
    $sql="INSERT INTO product(name, price, img, description, category_id, NSX, dacdiem, hsd, khoiluong) values('$tensp', '$giasp', '$hinh', '$mota', '$iddm', '$nsx', '$dd', '$HSD', '$kl')";
    pdo_execute($sql);
} 

function delete_sanpham($id) {
    $sql = "delete from product where id=?";
    pdo_execute($sql, $_GET['id']);
} 

function loadall_sanpham_home() {
    $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_top10() {
    $sql = "SELECT * FROM product ORDER BY view DESC LIMIT 0,3";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_discount() {
    $sql = "SELECT * FROM product ORDER BY discount DESC LIMIT 0,3";
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

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh, $nsx, $dd, $HSD, $kl) {
    if ($hinh!="") {
        $sql = "update product set category_id = '". $iddm . "', name ='". $tensp . "', price = '". $giasp . "', description = '" . $mota . "', img = '" . $hinh . "', NSX ='".$nsx."', dacdiem = '".$dd."', hsd = '".$HSD."', khoiluong = '".$kl."'  WHERE id = " . $id;
    } else {
        $sql = "update product set category_id = '". $iddm . "', name = '". $tensp . "', price = '" . $giasp . "', description = '" . $mota . "', NSX ='".$nsx."', dacdiem = '".$dd."', hsd = '".$HSD."', khoiluong = '".$kl."' WHERE id = " . $id;
    }
    pdo_execute($sql);
}

?>
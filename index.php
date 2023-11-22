<?php

session_start();
include './model/pdo.php';
include './model/taikhoan.php';
include './model/sanpham.php';
include './model/danhmuc.php';
include 'global.php';
$dsdm=loadall_danhmuc();
if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
    extract($_SESSION['user']);
    $role = $_SESSION['user']['role']; 
if ($role==0) {
    include './view/header-user.php';
}
}else{
include './view/header.php';
}
$spnew=loadall_sanpham_home();
$dstop10=loadall_sanpham_top10();
$dsdiscount=loadall_sanpham_discount();

if (isset($_GET['act'])&&($_GET['act']!="")) {
    $act=$_GET['act'];
    switch ($act) {
        case 'sanpham':
                  include "./view/sanpham/sanpham.php";
            break;
        case 'dmsp':

            if (isset($_POST['kyw']) && ($_POST['kyw']!="")) { 
                $kyw=$_POST['kyw'];
              }else {
                  $kyw="";
              }
              if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) { 
                  $iddm =($_GET['iddm']); 
                  
              } else {
                  $iddm=0;
              }
                  $dssp=loadall_sanpham($kyw,$iddm);
                  $tendm=load_ten_dm($iddm);
            include "./view/sanpham/dmsp.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) { 
                $onesp = loadone_sanpham($_GET['idsp']);
                extract($onesp);
                $sp_cung_loai=load_sanpham_cungloai($_GET['idsp'], $category_id);
                include "view/sanpham/spct.php";
            }
        break;
        case 'dangky':
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                if ($_POST['user']&&$_POST['pass']!="") {
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    insert_taikhoan($email,$user,$pass);
                    $thongbao="Đăng ký thành công !";
                }else{
                    $baoloi = "Mời nhập user hoặc pass !";
                };
            };
            include './view/TaiKhoan/dangky.php';
            break;
            case 'dangnhap':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $checkuser=check_user($user,$pass);
                    if (is_array($checkuser)) {
                        $_SESSION['user']=$checkuser;
                        header('location: index.php');
                    // session user tồn tại thì mới có role => role mới thực thi được !
                    }if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    if (is_array($checkuser)&&$role==1) {
                        $_SESSION['user']=$checkuser;
                        header('location: admin/index.php');
                    }
                }
                    else{
                        $baoloi="Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký !";
                    }
                }
                    include './view/TaiKhoan/dangnhap.php';
                    break;
        case 'thoat':
            session_unset();
            header('location: index.php');  
            break;
    }
}else {
    include './view/home.php';
}

include './view/footer.php'; 
?>
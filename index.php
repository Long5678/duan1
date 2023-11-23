<?php

session_start();
include './model/pdo.php';
include './model/taikhoan.php';
include './model/sanpham.php';
include './model/danhmuc.php';
include './mail/index.php';
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
        case 'edit-taikhoan':
            if (isset($_POST['capnhat']) && !empty($_POST['capnhat'])) {
                if (isset($_POST['user']) && !empty($_POST['user']) &&
                    isset($_POST['email']) && !empty($_POST['email']) &&
                    isset($_POST['address']) && !empty($_POST['address']) &&
                    isset($_POST['phone']) && !empty($_POST['phone'])) {

                    $user = $_POST['user'];
                    $newpass = $_POST['newpass'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $id = $_POST['id'];

                    // kiểm tra nếu tồn tại pass mới thì update
                    if (!empty($newpass)) {
                        if ($pass !== $_SESSION['user']['pass']) {
                            $baoloi = "Mật khẩu hiện tại sai";
                        } else {
                            update_taikhoan($id, $user, $newpass, $email, $address, $phone);
                            $_SESSION['user'] = check_usernew($user, $newpass);
                            header('location: index.php?act=edit-taikhoan');
                            $thongbao = "Cập nhật thành công";
                        }
                    } else {
                        update_thongtin($id, $user, $email, $address, $phone);
                        header('location: index.php?act=edit-taikhoan');
                        $thongbao = "Cập nhật thành công";
                    }
                } else {
                    $baoloi = "Mời nhập đầy đủ thông tin!";
                }
            }

            include './view/TaiKhoan/edit-taikhoan.php';
            break;
        case 'quenmk':
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                if($email == ''){
                    $baoloi = 'mời nhập thông tin !';
                }
                if (check_email($email)) {
                    getUserEmail($email);
                    $code = "http://localhost/duan1/index.php?act=dat-lai-mk";
                    $title = "Quên mật khẩu";
                    $content = "<a href='".$code."'>Ấn vào đây để đặt lại mật khẩu</a>";
                    $mail->sendMail($title,$content,$email);
    
                    $_SESSION['email'] = $email;
                    $_SESSION['code'] = $code;
                    header('location: index.php?act=xac-nhan-email');
                }else{
                    $baoloi = 'Email không tồn tại. mời đăng ký tài khoản !';
            } 
        }
            include './view/TaiKhoan/quenmk.php';
            break;

        case 'dat-lai-mk':
            if (isset($_POST['luu']) && !empty($_POST['luu'])) {
                if (isset($_POST['newpass']) && !empty($_POST['newpass']) &&
                    isset($_POST['repeatpass']) && !empty($_POST['repeatpass'])) {

                    $newpass = $_POST['newpass'];
                    $repeatpass = $_POST['repeatpass'];

                    // kiểm tra nếu tồn tại pass mới thì update
                        if ($newpass !== $repeatpass) {
                            $baoloi = "Mật khẩu nhập lại không khớp !";
                        } else {
                            $email = $_SESSION['email'];
                            update_mk($email,$newpass);
                            $_SESSION['user'] = check_usernew($user, $newpass);
                            header('location: index.php?act=dat-lai-mk');
                            $thongbao = "Cập nhật thành công";
                        }
            }else {
                $baoloi = "Mời nhập đầy đủ thông tin!";
            }
        }

            include './view/TaiKhoan/dat-lai-mk.php';
            break;

        case 'xac-nhan-email':
            include './view/TaiKhoan/xac-nhan-email.php';
            break;
        case 'thoat':
            session_unset();
            header('location: index.php');  
            break;
        case 'service':
            include './view/dichvu/service.php';
    }
}else {
    include './view/home.php';
}

include './view/footer.php'; 
?>
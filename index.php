<?php

include './view/header.php';
include './model/pdo.php';
include './model/taikhoan.php';

if (isset($_GET['act'])&&($_GET['act']!="")) {
    $act=$_GET['act'];
    switch ($act) {
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
    }
}else {
    include './view/home.php';
}

include './view/footer.php';

?>
<?php

session_start();
include './model/pdo.php';
include './model/taikhoan.php';
include './model/sanpham.php';
include './model/danhmuc.php';
include './model/thanhtoan.php';
include './model/cart.php';
include './mail/index.php';
include 'global.php';

if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

$dsdm = loadall_danhmuc();
if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    extract($_SESSION['user']);
    $role = $_SESSION['user']['role'];
    if ($role == 0) {
        include './view/header-user.php';
    }
} else {
    include './view/header.php';
}
$spnew = loadall_sanpham_home();
$dstop10 = loadall_sanpham_top10();
$dsdiscount = loadall_sanpham_discount();
$load_one = loadall_sanpham_one($id);




if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            include "./view/sanpham/sanpham.php";
            break;
        case 'dmsp':

            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = ($_GET['iddm']);

            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "./view/sanpham/dmsp.php";
            break;
        case 'tksp':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = ($_GET['iddm']);

            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "./view/sanpham/tksp.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $onesp = loadone_sanpham($_GET['idsp']);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($_GET['idsp'], $category_id);
                include "view/sanpham/spct.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                if ($_POST['user'] && $_POST['pass'] != "") {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "Đăng ký thành công !";
                } else {
                    $baoloi = "Mời nhập user hoặc pass !";
                }
                ;
            }
            ;
            include './view/TaiKhoan/dangky.php';
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php');
                    // session user tồn tại thì mới có role => role mới thực thi được !
                }
                if (isset($_SESSION['user'])) {
                    extract($_SESSION['user']);
                    if (is_array($checkuser) && $role == 1) {
                        $_SESSION['user'] = $checkuser;
                        header('location: admin/index.php');
                    }
                } else {
                    $baoloi = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký !";
                }
            }

            include './view/TaiKhoan/dangnhap.php';
            break;
        case 'edit-taikhoan':
            if (isset($_POST['capnhat']) && !empty($_POST['capnhat'])) {
                if (
                    isset($_POST['user']) && !empty($_POST['user']) &&
                    isset($_POST['email']) && !empty($_POST['email']) &&
                    isset($_POST['address']) && !empty($_POST['address']) &&
                    isset($_POST['phone']) && !empty($_POST['phone'])
                ) {

                    $user = $_POST['user'];
                    $newpass = $_POST['newpass'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $address_other = $_POST['address_other'];
                    $phone = $_POST['phone'];
                    $id = $_POST['id'];

                    // kiểm tra nếu tồn tại pass mới thì update
                    if (!empty($newpass)) {
                        if ($pass !== $_SESSION['user']['pass']) {
                            $baoloi = "Mật khẩu hiện tại sai";
                        } else {
                            update_taikhoan($id, $user, $newpass, $email, $address, $address_other, $phone);
                            $_SESSION['user'] = check_usernew($user, $newpass);
                            header('location: index.php?act=edit-taikhoan');
                            $thongbao = "Cập nhật thành công";
                        }
                    } else {
                        update_thongtin($id, $user, $email, $address, $address_other, $phone);
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
                if ($email == '') {
                    $baoloi = 'mời nhập thông tin !';
                }
                if (check_email($email)) {
                    getUserEmail($email);
                    $code = "http://localhost/duan1/index.php?act=dat-lai-mk";
                    $title = "POINT-Coffee";
                    $content = '<div style="margin: 0 auto; width: 40%; border: 1px #9999 solid;">
                        <h1 style="color: aliceblue; background: black; margin: 0px; padding: 15px; margin-top: -16px;">Yêu cầu khôi phục mật khẩu</h1><pr>
                        <div style="padding: 5px 15px; color: black;">
                            <p>Xin chào ' . $email . '</p><pr>
                            <p>Ai đó đã yêu cầu mật khẩu mới cho tài khoản sau trên POINT-Coffee.</p><pr>
                            <p>Nếu bạn không tạo yêu cầu này, hãy bỏ qua email. Nếu bạn muốn thực hiện:</p><pr>
                            <a href="' . $code . '">Ấn vào đây để đặt lại mật khẩu</a><pr>
                            <p>Cảm ơn đã đọc !</p>
                        </div>
                    </div>';
                    $mail->sendMail($title, $content, $email);

                    $_SESSION['email'] = $email;
                    $_SESSION['code'] = $code;
                    header('location: index.php?act=xac-nhan-email');
                } else {
                    $baoloi = 'Email không tồn tại. mời đăng ký tài khoản !';
                }
            }
            include './view/TaiKhoan/quenmk.php';
            break;


        case 'dat-lai-mk':
            if (isset($_POST['luu']) && !empty($_POST['luu'])) {
                if (
                    isset($_POST['newpass']) && !empty($_POST['newpass']) &&
                    isset($_POST['repeatpass']) && !empty($_POST['repeatpass'])
                ) {

                    $newpass = $_POST['newpass'];
                    $repeatpass = $_POST['repeatpass'];

                    // kiểm tra nếu tồn tại pass mới thì update
                    if ($newpass !== $repeatpass) {
                        $baoloi = "Mật khẩu nhập lại không khớp !";
                    } else {
                        $email = $_SESSION['email'];
                        update_mk($email, $newpass);
                        $_SESSION['user'] = check_usernew($user, $newpass);
                        header('location: index.php?act=dat-lai-mk');
                        $thongbao = "Cập nhật thành công";
                    }
                } else {
                    $baoloi = "Mời nhập đầy đủ thông tin!";
                }
            }

            include './view/TaiKhoan/dat-lai-mk.php';
            break;

        case 'xac-nhan-email':
            include './view/TaiKhoan/xac-nhan-email.php';
            break;
        case 'addtocart':
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['user'])) {
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = loadall_sanpham_one($id);
                    $name = $product['name'];
                    $img = $product['img'];
                    $price = $product['price'];
                    $soluong = 1;
                    $ttien = $soluong * $price;
                    $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                    if (!isset($_SESSION['mycart'])) {
                        $_SESSION['mycart'] = [];
                    }
                    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                    $found = false;
                    for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                        if ($_SESSION['mycart'][$i][0] == $id) {
                            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
                            $_SESSION['mycart'][$i][4]++;
                            $found = true;
                            break;
                        }
                    }
                    // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ hàng
                    if (!$found) {
                        array_push($_SESSION['mycart'], $spadd);
                    }
                }
            } else {
                echo "<script type='text/javascript'>alert('Vui lòng đăng nhập để vào giỏ hàng');</script>";
                include './view/TaiKhoan/dangnhap.php';
            }
            include "view/cart/viewcart.php";
            break;



        case 'thanhtoan':
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['user'])) {
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = loadall_sanpham_one($id);
                    $name = $product['name'];
                    $img = $product['img'];
                    $price = $product['price'];
                    $soluong = 1;
                    $ttien = $soluong * $price;
                    $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                    if (!isset($_SESSION['mycart'])) {
                        $_SESSION['mycart'] = [];
                    }
                    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                    $found = false;
                    for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                        if ($_SESSION['mycart'][$i][0] == $id) {
                            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên 1
                            $_SESSION['mycart'][$i][4]++;
                            $found = true;
                            break;
                        }
                    }
                    // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ hàng
                    if (!$found) {
                        array_push($_SESSION['mycart'], $spadd);
                    }
                }
            } else {
                echo "<script type='text/javascript'>alert('Vui lòng đăng nhập để vào giỏ hàng');</script>";
                include './view/TaiKhoan/dangnhap.php';
            }
            include "view/bill/thanhtoan.php";
            break;

        case 'delcart':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                foreach ($_SESSION['mycart'] as $key => $product) {
                    if ($product[0] == $id) {
                        unset($_SESSION['mycart'][$key]);
                        $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                        break;
                    }
                }
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=addtocart');
            break;

        case 'giohang':
            include './view/bill/giohang.php';
            break;
        case 'thanhtoan':
            $users = load_add_taikhoan();
            if (
                isset($_POST['user']) && !empty($_POST['user']) &&
                isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['address']) && !empty($_POST['address']) &&
                isset($_POST['phone']) && !empty($_POST['phone'])
            ) {

                $user = $_POST['user'];
                $newpass = $_POST['newpass'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $id = $_POST['id'];
            }
            // Lưu trữ thông tin đơn hàng
            $order = [
                'user' => $user,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'cart' => $_SESSION['mycart']
            ];
            $_SESSION['order'] = $order;


            include './view/bill/thanhtoan.php';
            break;


        case 'donhang':
            $users = load_add_taikhoan();
            $pdo = new PDO('mysql:host=localhost:3307;dbname=duan1', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['ttdh']) && isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
                $user = $_POST['user'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $address_other = $_POST['address_other'];
                $phone = $_POST['phone'];
                $status = 'suscess';
                $cart = $_SESSION['mycart'];
                $order_dates = date('Y-m-d H:i:s'); // Ngày đặt hàng
                $total = 0;

                foreach ($cart as $item) {
                    $price = $item[3];
                    $quantity = $item[4];
                    $subtotal = $price * $quantity;
                    $total += $subtotal;
                }

                $stmt = $pdo->prepare("INSERT INTO `order` (user, order_dates, email, address, address_other,phone, total, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$user, $order_dates, $email, $address, $address_other, $phone, $total, $status]);

                $order_id = $pdo->lastInsertId();

                foreach ($cart as $item) {
                    $product_id = $item[0];
                    $name = $item[1];
                    $img = $item[2];
                    $price = $item[3];
                    $quantity = $item[4];

                    $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$order_id, $product_id, $name, $price, $quantity]);

                    // Gọi hàm insert_cart
                    insert_cart($order_id, $name, $price, $img, $quantity);
                }
                unset($_SESSION['mycart']);
            } else {
                echo "<script type='text/javascript'>alert('Giỏ hàng của bạn đang trống. Vui lòng thêm một số sản phẩm trước khi đặt hàng.');</script>";
            }
            header('Location: index.php?act=addtocart');
            break;








        case 'donhang':
            $users = load_add_taikhoan();
            $pdo = new PDO('mysql:host=localhost:3308;dbname=duan1', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['ttdh']) && isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
                $user = $_POST['user'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $address_other = $_POST['address_other'];
                $phone = $_POST['phone'];
                $status = 'suscess';
                $cart = $_SESSION['mycart'];
                $total = 0;

                foreach ($cart as $item) {
                    $price = $item[3];
                    $quantity = $item[4];
                    $subtotal = $price * $quantity;
                    $total += $subtotal;
                }
                // kiểm tra có đặt sdt và địa chỉ chưa
                if (empty($phone) || empty($address)) {
                    echo "<script type='text/javascript'>alert('Bạn cần nhập số điện thoại và địa chỉ để đặt hàng.');</script>";
                } else {

                    if (empty($_POST['radio'])) {
                        // Thông báo lỗi
                        echo "<script type='text/javascript'>alert('Bạn cần chọn hình thức thanh toán để đặt hàng.');</script>";
                    } else {

                        // Kiểm tra xem checkbox đã được chọn hay chưa
                        if (isset($_POST['checkbox'])) {

                            // Nếu checkbox đã được chọn thì thực hiện đặt hàng
                            $stmt = $pdo->prepare("INSERT INTO `order` (user, email, address, address_other, phone, total, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                            $stmt->execute([$user, $email, $address, $address_other, $phone, $total, $status]);

                            $order_id = $pdo->lastInsertId();

                            foreach ($cart as $item) {
                                $product_id = $item[0];
                                $name = $item[1];
                                $price = $item[3];
                                $quantity = $item[4];

                                $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)");
                                $stmt->execute([$order_id, $product_id, $name, $price, $quantity]);
                            }

                            unset($_SESSION['mycart']);

                            // Thông báo đặt hàng thành công
                            echo "<script type='text/javascript'>alert('Đặt hàng thành công.');</script>";

                            // Redirect về trang danh sách sản phẩm
                            header('Location: index.php?act=sanpham');
                        } else {

                            // Nếu checkbox chưa được chọn thì thông báo lỗi
                            echo "<script type='text/javascript'>alert('Bạn phải đồng ý với điều khoản của website trước khi đặt hàng.');</script>";
                        }
                    }
                }
            } else {
                echo "<script type='text/javascript'>alert('Giỏ hàng của bạn đang trống. Vui lòng thêm một số sản phẩm trước khi đặt hàng.');</script>";
            }
            include './view/bill/thanhtoan.php';
            break;



        case 'vieworder':
            if (isset($_GET['order_id'])) {
                $order_id = $_GET['order_id'];
                $list_order_detail = load_orderdetail($order_id);
                if ($list_order_detail && count($list_order_detail) > 0) {
                    include './view/cart/vieworder.php';
                } else {
                    echo 'Không có sản phẩm nào trong đơn hàng này.';
                }
            } else {
                echo 'Không có mã đơn hàng được cung cấp.';
            }
            break;

        case 'thoat':
            session_unset();
            header('location: index.php');
            break;
        case 'service':
            include './view/dichvu/service.php';
    }
} else {
    include './view/home.php';
}

include './view/footer.php';
?>
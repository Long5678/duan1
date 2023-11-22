<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/CSS/style.css">
    <link rel="stylesheet" href="./view/CSS/banner.css">
    <link rel="stylesheet" href="./view/CSS/font.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Trang chủ</title>
</head>
<body>
    <div class="boxcenter">
        <header>
        <div class="row header">
            <img class="ml" src="./view/image/logo2.png" alt="" style="margin-bottom: 10px;" width="70px" height="70px">  
            <div class="boxsearch">
                <input style="font-family: Roboto-ThinItalic;" type="search" placeholder="Tìm kiếm">
                <button><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></button>
            </div>
                <ul class="boxr mr">
                    <li><a href="index.php?act=dangky">Đăng Ký</a></li>
                    <li><a href="index.php?act=dangnhap">Đăng Nhập</a></li>
                    <li><a href="giohang.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
        </div>
        </header>
        <nav>
            <ul>
                <li style="background-color: black;"><a class="nav1" href=""><i class="fa-solid fa-bars" style="margin-right: 5px;"></i>Danh Mục Sản Phẩm</a>
                    <!-- menu con sổ xuống cấp 1 -->
                    <ul>
                        <?php
                            foreach ($dsdm as $dm){
                                extract($dm);
                                $linkdm = "index.php?act=dmsp&iddm=".$id;
                                echo '<li><a href="'.$linkdm.'">'.$name.'</a></li>';
                            }
                        ?>
                        <!-- <li><a href="sanpham.html">Cà Phê Hạt</a></li>
                        <li><a href="#">Cà Phê Rang Xay</a></li>
                        <li><a href="#">Cà Phê Hòa Tan</a></li> -->
                    </ul>
                </li>
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="index.php?act=sanpham">Sản Phẩm</a></li>
                <li><a href="service.html">Dịch vụ</a></li>
                <li><a href="#footer">Liên hệ</a></li>
            </ul>
        </nav>


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
            <img  src="./view/image/logo2.png" alt=""  width="70px" height="70px">  
            <div class="boxsearch">
                <form action="index.php?act=tksp" method="post">
                <input style="font-family: Roboto-ThinItalic;" name="kyw" type="search" placeholder="Tìm kiếm">
                <button type="submit"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></button>
                </form>
                
            </div>
                <nav class="menu-con">
                    <ul>
                        <li class="tk_list" style="background-color: black;"><a class="nav1" style="margin-left: 0px;" href="dangnhap.html"><i class="fa-solid fa-user" style="margin-right: 5px; display: inline;"></i><?=$user?></a>
                            <ul>
                                <li><a href="index.php?act=edit-taikhoan">Tài khoản</a></li>
                                
                                <li><a href="index.php?act=vieworder&order_id=22">Đơn hàng</a></li>

                                <li><a href="index.php?act=thoat">Thoát</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <a href="index.php?act=addtocart&id"><i class="fa-solid fa-cart-shopping" style="color: black;"></i></a>
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
                <li><a href="index.php?act=service">Dịch vụ</a></li>
                <li><a href="#footer">Liên hệ</a></li>
            </ul>
        </nav>
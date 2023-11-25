<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/CSS/sanpham.css">
    <link rel="stylesheet" href="./view/CSS/banner.css">
    
</head>
<body>
<div class="box-banner">
            <div class="banner">
                <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                    <img src="./view/image/banner1.jpg" style="width:100%">
                <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <img src="./view/image/banner2.jpg" style="width:100%">
                    <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <img src="./view/image/banner3.jpg" style="width:100%">
                    <div class="text"></div>
                </div>
                <div class="mySlides fade">
                    <img src="./view/image/banner4.jpg" style="width:100%">
                    <div class="text"></div>
                </div>

                <!-- Next and previous buttons -->
                </div>

                <!-- The dots/circles -->
                <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                </div>
            </div>
        </div>
  <!-- <div  class="sanpham"> -->
    <div class="boxconten">
                <div class="danh muc">
                    <h1 style="font-size: 30px;">Sản Phẩm</h1>
                    
                </div>
                    <div class="boxconten-CT">
                    
                    <?php
                       $i = 0;
                       foreach ($dssp as $sp) {
                        extract($sp);
                           $linksp ="index.php?act=sanphamct&idsp=".$id;
                           $hinh = $img_path . $sp['img'];
                           
                           echo '<div class="boxsp fromcontent-sp">
                            <div class="img"><a href="'.$linksp.'"><img src="'.$hinh.'" alt="" style="width: 200px; height: 200px;"></a></div>
                            <a style="font-family: Roboto-Regular;" href="'.$linksp.'">'.$name.'</a>
                            <p>'.$price.'VNĐ</p>
                            <a href="index.php?act=giohang"><input type="button" value="Thêm vào giỏ hàng"></a>
                            </div>';
                           
                           $i += 1;
                        }
                    ?>
                    </div>
    </div>
        <script src="./view/JS/banner.js"></script>
</body>
</html>

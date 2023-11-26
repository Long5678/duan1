<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/CSS/style.css">
    <link rel="stylesheet" href="./view/CSS/ctsp.css">
    <link rel="stylesheet" href="./view/CSS/sanpham.css">
</head>
<body>
<div class="ctsp">
            <?php 
                if (!empty($onesp) && is_array($onesp)) {
                    // Biến $onesp chứa dữ liệu hợp lệ, bạn có thể sử dụng extract
                    extract($onesp);
                    $img = $img_path . $img;
                    echo '<div class="product">
                            <img style="width: 600px; height: 600px;" src="' . $img . '" alt="">
                            <div class="product-detail">
                                <h2>'. $name . '</h2>
                                <p style="color: red; font-size: 25px;">'.$price.' VNĐ</p>
                                <p style="color: black; font-size: 22px; font-family: "Roboto-Regular" ;">'.$description.'</p>
                            <td><a style="padding: 5px 8px 5px 8px; border: 1px #9999 solid; text-align: center; cursor: pointer; font-family: Roboto-Regular;" onclick="giamCT(this)"> - </a> <span type="text" style="border: 1px #9999 solid; padding: 5px 14px 5px 14px; text-align: center;">1</span> <a style="padding: 5px 8px 5px 8px; border: 1px #9999 solid; margin: -5px; text-align: center; cursor: pointer; font-family: Roboto-Regular;" onclick="tangCT(this)"> + </a></td>
                            <div class="fromcontent" style="margin-top: 20px;">
                            <a href="index.php?act=addtocart&id='.$id.'"><input type="button" value="Thêm vào giỏ hàng"></a>
                            <a href="index.php?act=thanhtoan"><input style="background-color:red;" type="button" value="Đặt hàng"></a>
                            </div>
                            </div>
                        </div>';
                } else {
                    // Xử lý khi dữ liệu không hợp lệ
                    echo "Dữ liệu sản phẩm không hợp lệ hoặc không tồn tại.";
                }
                ?>

            <!-- <div class="product">
                <img src="image/sp1.jpg" alt="">
                <div class="product-detail">
                    <h2>Trung Nguyên Legend Classic</h2>
                    <p style="color: red; font-size: 25px;">250.000 VND</p>
                    <p style="color: black; font-size: 22px; font-family:'Roboto-Regular' ;">Sản phẩm này được sản xuất bởi Công ty Cổ phần Tập đoàn Trung Nguyên, Việt Nam. Cà phê hòa tan Trung Nguyên Legend Classic được làm từ những hạt cà phê Robusta thượng hạng, được chế biến bằng công nghệ hiện đại, mang đến hương vị đậm đà, thơm ngon. Sản phẩm này đã được người tiêu dùng Việt Nam bình chọn là hàng Việt Nam chất lượng cao trong suốt 12 năm liên tục.</p>
                    <div class="soluong">
                        <input type="button" style="width: 30%; font-family: Roboto-Regular;"value="-">
                        <input type="text" style="width: 40%; text-align: center;" name="" id="" value="1">
                        <input type="button" style="width: 30%; font-family: Roboto-Regular;"value="+">
                    </div>
                    <div class="fromcontent">
                        <a href="giohang.html"><input type="button" value="Thêm vào giỏ hàng"></a>
                        <a href="thanhtoan.html"><input style="background-color:red;" type="button" value="Đặt hàng"></a>
                    </div>
                </div>
            </div> -->
            
            <div class="detail">
                <h3>Mô Tả</h3>
                <hr>
                <ul>
                    <?php
                        echo '<li>Nhà sản xuất: <p style="font-family: Roboto-Regular; font-size: 20px; margin-left: 7px;">'.$NSX.'</p></li>
                        <li>Đặc điểm: <p style="font-family: Roboto-Regular; font-size: 20px; margin-left: 7px;">'.$dacdiem.'</p></li>
                        <li>Hạn sử dụng: <p style="font-family: Roboto-Regular; font-size: 20px; margin-left: 7px;">'.$hsd.'</p></li>
                        <li>Khối lượng: <p style="font-family: Roboto-Regular; font-size: 20px; margin-left: 7px;">'.$khoiluong.'</p></li>';
                    
                    ?>
                    <!-- <li>Nhà sản xuất: <p style="font-family: Roboto-Regular; font-size: 15px; margin-left: 7px;">Trung Nguyên</p></li>
                    <li>Thành phần: <p style="font-family: Roboto-Regular; font-size: 15px; margin-left: 7px;">Cà phê hòa tan</p></li>
                    <li>Đặc điểm: <p style="font-family: Roboto-Regular; font-size: 15px; margin-left: 7px;">Trung Nguyên Legend Classic sở hữu lượng cà phê xay đặc trưng. Thể chất mạnh cùng vị đắng đậm pha lẫn chút ngọt bùi đầy bản sắc.</p></li>
                    <li>Hạn sử dụng: <p style="font-family: Roboto-Regular; font-size: 15px; margin-left: 7px;">2 năm</p></li>
                    <li>Khối lượng: <p style="font-family: Roboto-Regular; font-size: 15px; margin-left: 7px;">Bịch 50 x 17gr</p></li> -->
                </ul>
            </div>
            <div class="relative-product">
                <h3>Sản phẩm tương tự</h3>
                <hr>
                <div class="danh muc1">
                    <?php
                        foreach($sp_cung_loai as $sp_cung_loai) {
                            extract($sp_cung_loai);
                            $linksp="index.php?act=sanphamct&idsp=".$id;
                            echo '<div class="boxsp fromcontent-sp">
                                    <div class="img"><a href="'.$linksp.'"><img src="./upload/'.$img.'" alt="" style="width: 200px; height: 200px;"></a></div>
                                    <a style="font-family: Roboto-Regular;" href="'.$linksp.'">'.$name.'</a>
                                    <p>'.$price.' VNĐ</p>
                                    <a href="index.php?act=giohang"><input type="button" value="Thêm vào giỏ hàng"></a>
                                </div>';
                        }
                    ?>
                    <!-- <div class="boxsp fromcontent-sp">
                        <div class="img"><a href="ctsp.html"><img src="image/sp1.jpg" alt="" style="width: 200px; height: 200px;"></a></div>
                        <a style="font-family: Roboto-Regular;" href="ctsp.html">Legend Classic</a>
                        <p>30$</p>
                        <a href="giohang.html"><input type="button" value="Thêm vào giỏ hàng"></a>
                    </div>
                    <div class="boxsp fromcontent-sp">
                        <div class="img"><a href="ctsp.html"><img src="image/sp1.jpg" alt="" style="width: 200px; height: 200px;"></a></div>
                        <a style="font-family: Roboto-Regular;" href="ctsp.html">Legend Classic</a>
                        <p>30$</p>
                        <a href="giohang.html"><input type="button" value="Thêm vào giỏ hàng"></a>
                    </div>
                    <div class="boxsp fromcontent-sp">
                        <div class="img"><a href="ctsp.html"><img src="image/sp1.jpg" alt="" style="width: 200px; height: 200px;"></a></div>
                        <a style="font-family: Roboto-Regular;" href="ctsp.html">Legend Classic</a>
                        <p>30$</p>
                        <a href="giohang.html"><input type="button" value="Thêm vào giỏ hàng"></a>
                    </div>
                    <div class="boxsp fromcontent-sp">
                        <div class="img"><a href="ctsp.html"><img src="image/sp1.jpg" alt="" style="width: 200px; height: 200px;"></a></div>
                        <a style="font-family: Roboto-Regular;" href="ctsp.html">Legend Classic</a>
                        <p>30$</p>
                        <a href="giohang.html"><input type="button" value="Thêm vào giỏ hàng"></a>
                    </div> -->
                </div>
                
            </div>
        </div>
</body>
<script src="./view/JS/giohang.js"></script>
</html>
       
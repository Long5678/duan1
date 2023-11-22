
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
<div class="boxcontent">
        <div class="content">
              <hr>
            <h2>POINT Coffee</h2>
            <hr>
        </div>
<div class="content-text">
    <p>
        Một THẾ GIỚI CÀ PHÊ thu nhỏ...
        Một hệ thống F&B(Đồ ăn, thức uống), bán lẻ TOÀN DIỆN , VƯỢT TRỘI . Một môi trường HỢP TÁC tạo nên hệ sinh thái cà phê THỊNH VƯỢNG
        <br><br>
        Nơi KHỞI NGHIỆP CÀ PHÊ và cùng CHUNG TAY tạo giá trị gia tăng về LỢI ÍCH KINH TẾ, song song PHỤNG SỰ XÃ HỘI một cách THIẾT THỰC và BỀN VỮNG 
    </p>
</div>
<div class="content-img mb-50">
    <img src="./view/image/GT.png" alt="anh panner giua trang">
</div>
<div class="box-content-img">
    <hr><h2>Sản Phẩm Khuyến Mãi</h2><hr>
    <div class="children-box">
            <?php 
                foreach($dsdiscount as $sp) {
                    extract($sp);
                    $linksp ="index.php?act=sanphamct&idsp=".$id;
                    $img=$img_path.$img;
                    echo '<div class="box1">
                    <div class="box-box1">
                    <a href="'.$linksp.'"><img src="'.$img.'" alt="" width="250px"></a>
                    </div>
                    <a href="'.$linksp.'"><p>'.$name.'</p></a>
                   </div>';
                }
            ?>
        <!-- <div class="box1">
         <div class="box-box1">
          <img src="upload/sp1.jpg" alt="" width="250px">
         </div>
         <a href=""><p>Cà Phê G7 3in1 – Hộp 21 Gói</p></a>
        </div>
        <div class="box1">
             <div class="box-box1">
                <img src="upload/sp2.jpg" alt="" width="250px">
         </div>
         <p>Combo 2 Cà phê phin giấy – Americano</p>
        </div>
        <div class="box1">
            <div class="box-box1">
                <img src="upload/sp3.jpg" alt="" width="250px">
            </div>
            <p>Cà Phê Sáng Tạo 2</p>
        </div> -->
    </div>
</div>

<div class="box-content-img">
    <hr><h2>Top Sản Phẩm Yêu Thích</h2><hr>
    <div class="children-box mb-50">
            <?php 
                foreach($dstop10 as $sp) {
                    extract($sp);
                    $linksp ="index.php?act=sanphamct&idsp=".$id;
                    $img=$img_path.$img;
                    echo '<div class="box1">
                    <div class="box-box1">
                    <a href="'.$linksp.'"><img src="'.$img.'" alt="" width="250px"></a>
                    </div>
                    <a href="'.$linksp.'"><p>'.$name.'</p></a>
                   </div>';
                }
            ?>
        <!-- <div class="box1">
         <div class="box-box1">
            <img src="upload/legend roman.jpg" alt="" width="250px">
         </div>
         <p>Legend Special Edition – Lon 12 Gói</p>
        </div>
        <div class="box1">
             <div class="box-box1">
                <img src="upload/cà phê phin giấu.jpg" alt="" width="250px">
         </div>
         <p>Cà Phê Passiona Hòa Tan 4in1</p>
        </div>
        <div class="box1">
            <div class="box-box1">
                <img src="upload/cà phê viên nén decaffeinato.jpg" alt="" width="250px">
            </div>
            <p>Cà phê Sáng tạo 8 (250gr)</p>
        </div> -->
    </div>
</div>


    </div>
<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['mycart'])) {
    
}
?>
<div class="boxconten">
    <div class="all-show">
        <div class="show">
            <table>
                <tr>
                    <th></th>
                    <th>Sản Phẩm</th>
                    <th></th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tạm tính</th>
                </tr>

                <?php
$tong = 0;
$i = 0;
if (isset($_SESSION['mycart'])) {
    foreach ($_SESSION['mycart'] as $cart) {
        if (isset($cart[0]) && isset($cart[2]) && isset($cart[3]) && isset($cart[4]) && isset($cart[1])) {
            $product_id = $cart[0]; // ID của sản phẩm
            $hinh = $img_path . $cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
            $name = $cart[1];
            $price = $cart[3];
            $quantity = $cart[4]; // Số lượng của sản phẩm
            echo '
<tr>
    <td>
        <a href="index.php?act=delcart&id=' . $product_id . '" style="color: rgb(214, 9, 9);"><i class="fa-solid fa-trash-can"></i></a>
    </td>
    <td>
        <div class="img-cart">
            <img src="' . $hinh . '" alt="">
        </div>
    </td>
    <td>
        <p style="font-family: Roboto-Regular;">' . $name . '</p>
    </td>
    <td>
        <p>' . number_format($price, 0, ".", ".") . ' VND</p>
    </td>
    <td>
    <a style="padding: 5px 8px 5px 8px; border: 1px #9999 solid; text-align: center; cursor: pointer; font-family: Roboto-Regular;" onclick="giam(this)"> - </a> 
    <span type="text" style="border: 1px #9999 solid; padding: 5px 14px 5px 14px; text-align: center;">' . $quantity . '</span> 
    <a style="padding: 5px 8px 5px 8px; border: 1px #9999 solid; margin: -5px; text-align: center; cursor: pointer; font-family: Roboto-Regular;" onclick="tang(this)"> + </a>
    </td>
    <td>
        <p>' . number_format($ttien, 0, ".", ".") . ' VND</p>
    </td>
</tr>';
        }
    }
}
?>
                <!-- <tr>
                        <td>
                            <a href=""><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <td>
                            <div class="img-cart">
                            <img src="image/sp chinh.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <p style="font-family: Roboto-Regular;">Cà Phê G7 3in1 – Bịch 50 Sachets</p>
                        </td>
                        <td>
                            <p>150.000 VND</p>
                        </td>
                        <td>
                            <div class="soluong">
                                <input type="button" style="width: 30%;text-align: center; font-family: Roboto-Regular; "value="-">
                                <input type="text" style="width: 40%; text-align: center;" name="" id="" value="2">
                                <input type="button" style="width: 30%;text-align: center; font-family: Roboto-Regular; "value="+">
                            </div>
                        </td>
                        <td>
                            <p>150.000 VND</p>
                        </td>
                    </tr> -->

            </table>
        </div>
        <div class="cart fromcontent ml30">
            <table>
                <tr>
                    <th>Tổng giỏ hàng</th>
                    <th></th>
                </tr>
                
                <tr>
                    <td>Tạm tính</td>
                    <?php 
                    echo ' <td>'.number_format($tong, 0, ".", ".").' VND</td>'
                   
                    ?>
                </tr>
                
                <tr>
                    <td>Giao hàng</td>
                    <td style="font-family: Roboto-LightItalic;">Miễn phí giao hàng</td>
                </tr>
                <tr>
                    <td>Tổng</td>
                    <td style="color: red;"> <?php 
                    echo ' '.number_format($tong, 0, ".", ".").' VND'
                    ?></td>
                </tr>
            </table>
            <div class="row mb10 mt30 click-cart">
                <a href="index.php?act=thanhtoan"><input style="width: 90%; margin: 20px 0px;" type="submit" name="ttdh"
                        value="Tiếp tục đặt hàng"></a>
            </div>
        </div>
    </div>
</div>


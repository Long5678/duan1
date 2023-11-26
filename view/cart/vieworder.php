<div class="boxconten">
    <form action="" >
        <div class="all-show">
            <div class="show">
                <table>
                    <tr>
                        <th></th>
                        <th>Tên Sản Phẩm</th>
                        <th></th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tạm tính</th>
                    </tr>
                    <tr>

                    <?php
if ($orderDetails) {
    if (is_array($orderDetails) || is_object($orderDetails)) {
        foreach ($orderDetails as $order) {
            echo '<tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>' . $order['id'] . '</td>
                <td>' . $order['product_name'] . '</td>
                <td>' . $order['quantity'] . '</td>
                <td>Tạm tính của sản phẩm (cần tính toán)</td>
                <td><a href="index.php?act=xoatk&id=' . $order['id'] . '"><input type="button" value="Xóa"></a></td>
            </tr>';
        }
    } else {
        echo 'Không có dữ liệu đơn hàng nào!';
    }
} else {
    echo 'Không có dữ liệu đơn hàng nào!';
}
?>
                        <!-- <td>
                            <a href=""><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <td>
                            <div class="img-cart">
                            <img src="./view/image/sp chinh.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <p style="font-family: Roboto-Regular;">Cà Phê G7 3in1 – Bịch 50 Sachets</p>
                        </td>
                        <td>
                            <p>150.000 VND</p>
                        </td>
                        <td>
                            <a style="padding: 5px 8px 5px 8px; border: 1px #9999 solid; text-align: center; cursor: pointer; font-family: Roboto-Regular;" onclick="giam(this)"> - </a> 
                            <span type="text" style="border: 1px #9999 solid; padding: 5px 14px 5px 14px; text-align: center;">1</span> 
                            <a style="padding: 5px 8px 5px 8px; border: 1px #9999 solid; margin: -5px; text-align: center; cursor: pointer; font-family: Roboto-Regular;" onclick="tang(this)"> + </a>
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
                    <tr >
                        <td>Tạm tính</td>
                        <td>150.000VND</td>
                    </tr>
                    <tr>
                        <td>Giao hàng</td>
                        <td style="font-family: Roboto-LightItalic;">Miễn phí giao hàng</td>
                    </tr>
                    <tr>
                        <td>Tổng</td>
                        <td style="color: red;">150.000VND</td>
                    </tr>
                </table>
            </form>
            <form action="index.php?act=thanhtoan" method="post">
                <div class="row mb10 mt30 click-cart">
                    <a href="index.php?act=thanhtoan"><input style="width: 90%; margin: 20px 0px;" type="submit" name="thanhtoan" value="Tiếp tục đặt hàng"></a>
                </div>
            </form>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row fromtitle">
        <h1> Đơn Hàng Của Bạn</h1>
    </div>
    <div class="row fromcontent">
        <form action="">
            <div class="row mb10 mt20 formdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá </th>
                    </tr>
                    <?php
                    if (isset($list_order_detail) && count($list_order_detail) > 0) {
                        foreach ($list_order_detail as $orderdetail) {
                            extract($orderdetail);
                            $suatk='index.php?act=suatk&id='.$id;
                            $xoatk='index.php?act=xoadh&id='.$id;
                            $hinhpath = "../upload/".$img;
                            if(is_file($hinhpath)) {
                                $hinh = "<img src='".$hinhpath."' height='80'>";
                            }else {
                                $hinh = "no photo";
                            }
                            echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$hinh.'</td>
                            <td>'.number_format($price, 0, ".", ".").' VND</td>
                            </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Không có sản phẩm nào trong đơn hàng này.</td></tr>';
                    }
                    ?>
                </table>
            </div>
        </form>
    </div>
</div>


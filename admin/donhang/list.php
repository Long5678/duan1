<div class="container">
        <div class="row fromtitle">
            <h1>Danh sách Đơn Hàng</h1>
        </div>
        <div class="row fromcontent">
            <form action="" method="post">
                <div class="row mb10 mt20 formdsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>Mã Đơn Hàng</th>
                            <th>Người Đặt</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Địa chỉ khác</th>
                            <th>Điện thoại</th>
                            <th>Tổng Tiền </th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                            foreach ($list_order as $taikhoan) {
                                extract($taikhoan);
                                $suatk='index.php?act=suatk&id='.$id;
                                $xoatk='index.php?act=xoadh&id='.$id;

                                echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$user.'</td>
                                <td>'.$email.'</td>
                                <td>'.$address.'</td>
                                <td>'.$address_other.'</td>
                                <td>'.$phone.'</td>
                                <td>'.number_format($total, 0, ".", ".").' VND</td>
                                <td> <a href="'.$xoatk.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                            }
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </div>
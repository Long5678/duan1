<div class="container">
        <div class="row fromtitle">
            <h1>Danh sách tài khoản</h1>
        </div>
        <div class="row fromcontent">
            <form action="" method="post">
                <div class="row mb10 mt20 formdsloai">
                    <table>
                        <tr>
                            <th></th>
                            <th>Mã tk</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php
                            foreach ($listtaikhoan as $taikhoan) {
                                extract($taikhoan);
                                $suatk='index.php?act=suatk&id='.$id;
                                $xoatk='index.php?act=xoatk&id='.$id;

                                echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$user.'</td>
                                <td>'.$pass.'</td>
                                <td>'.$email.'</td>
                                <td>'.$address.'</td>
                                <td>'.$phone.'</td>
                                <td>'.$role.'</td>
                                <td> <a href="'.$xoatk.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                            }
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tẩt cả">
                    <input type="button" value="Xóa các mục chọn">
                </div>
            </form>
        </div>
    </div>
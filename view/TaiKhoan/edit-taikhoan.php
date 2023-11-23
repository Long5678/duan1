<div class="form-edit-tk fromtaikhoan">
                        <?php
                            if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                                extract($_SESSION['user']);
                            }
                        ?>
            <h1 style="font-size: 17px;margin-bottom: 25px; margin-top: 30px;">Thông tin khách hàng</h1>
            <form action="index.php?act=edit-taikhoan" method="post">
            <div class="row mb30">
                Họ và tên<br><br>
                <input style="width: 100%;" type="text" name="user" value="<?=$user?>">  
            </div>
            <div class="twoform-all">
                <div class="twoform-tk">
                    <div class="row mb30">
                        Số điện thoại<br><br>
                        <input style="width: 100%;" type="text" name="phone" value="<?=$phone?>"><br>
                    </div>
                    <div class="row mb30">
                        Địa chỉ<br><br>
                        <input style="width: 100%;" type="text" name="address" value="<?=$address?>"><br>
                    </div>
                </div>
                <div class="twoform-tk-lert">
                    <div class="row mb30">
                        Địa chỉ Email<br><br>
                        <input style="width: 100%;" type="email" name="email" value="<?=$email?>"><br>
                    </div>
                    <div class="row mb30">
                        Địa chỉ (khác)<br><br>
                        <input style="width: 100%;" type="text" name="address" value="<?=$address?>"><br>
                    </div>
                </div>
            </div>
            <h1 style="font-size: 17px;margin-bottom: 25px;">Thay đổi mật khẩu</h1>
                <div class="twoform-all">
                    <div class="twoform-tk">
                        <div class="row mb30">
                            Mật khẩu hiện tại (Bỏ trống nếu không thay đổi)<br><br>
                            <input style="width: 100%;" type="password" name="pass" id=""><br>
                        </div>
                    </div>
                    <div class="twoform-tk-lert">
                        <div class="row mb30">
                            Mật khẩu mới (Bỏ trống nếu không thay đổi)<br><br>
                            <input style="width: 100%;" type="password" name="newpass" id=""><br>
                        </div>
                    </div>
                </div>
                <div class="row mb30 mt30">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="capnhat" value="Lưu thông tin">
                </div>
                <h2 class="thongbao" style= "color: rgb(13, 0, 255);">
                        <?php
                            if (isset($thongbao)&&($thongbao)!="") {
                                echo $thongbao;
                            }
                        ?>
                        </h2>
            <h2 class="baoloi" style= "color: red;">
                        <?php
                            if (isset($baoloi)&&($baoloi)!="") {
                                echo $baoloi;
                            }
                        ?>
                        </h2>
            </form>
        </div>
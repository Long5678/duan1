<div class="form-edit-tk fromtaikhoan">
    <form action="index.php?act=dat-lai-mk" method="post">
            <p style="font-size: 16px; font-family: Roboto-Regular; margin: 40px 0px 25px 0px;">Nhập mật khẩu mới bên dưới.</p>
            <div class="twoform-all">
                <div class="twoform-tk">
                    <div class="row mb30">
                        Mật khẩu mới<br><br>
                        <input style="width: 100%;" type="password" name="newpass" id=""><br>
                    </div>
                </div>
                <div class="twoform-tk-lert">
                    <div class="row mb30">
                        Nhập lại mật khẩu<br><br>
                        <input style="width: 100%;" type="password" name="repeatpass" id=""><br>
                    </div>
                </div>
            </div>
            
                <div class="row mb30 mt30" style="margin-bottom: 150px;">
                    <input type="submit" name="luu" value="Lưu">
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
                </div>
            </form>
        </div>
<div class="form-edit-tk fromtaikhoan">
    <form action="index.php?act=quenmk" method="post">
            <p style="font-size: 16px; font-family: Roboto-Regular; margin: 40px 0px 25px 0px;">Quên mật khẩu? Vui lòng nhập tên đăng nhập hoặc địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật khẩu mới qua email.</p>
            <div class="row">
                Địa chỉ Email<br><br>
                <input style="width: 50%;" type="email" name="email" id="">  
            </div>
            
                <div class="row mb30 mt30" style="margin-bottom: 150px;">
                    <input type="submit" name="submit" value="Đặt lại mật khẩu">
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
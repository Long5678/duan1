<div class="boxconten fromtaikhoan">
        <h1 class="ml80 mt30" style="font-size: 20px; margin-bottom: 40px;">Đăng nhập</h1>
        <form class="fromtaikhoan-ct" action= "index.php?act=dangnhap" method = "post">
            <div class="row mb30">
                Tên đăng nhập<br><br>
                <input type="text" name="user" id="">  
            </div>
            <div class="row mb30">
                Mật khẩu<br><br>
                <input type="password" name="pass" id=""><br>
            </div>
            <div class="row mb10" style="display: flex; align-items: center;">
                <input type="checkbox" name="remember_me" id=""><p style="font-family: Roboto-Regular;">Ghi nhớ mật khẩu</p>
            </div>
            <div class="row mb10">
                <input type="submit" name="dangnhap" value="Đăng nhập">
            </div>
            <div class="row mt10 mb10 a-noline a" style="display: flex; align-items: center;">
                <a href="index.php?act=quenmk" style="font-family: Roboto-Regular; margin-bottom: 20px;">Quên mật khẩu ?</a>
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
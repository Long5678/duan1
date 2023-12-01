<div class="boxconten fromtaikhoan">
        <h1 class="ml80 mt30" style="font-size: 20px; margin-bottom: 40px;">Đăng Ký</h1>
        <form class="fromtaikhoan-ct" action="index.php?act=dangky" method="post" style="margin-bottom: 0px;">
            <div class="row mb30">
                Tên tài khoản<br><br>
                <input type="text" name="user" id="">  
            </div>
            <div class="row mb30">
                Email<br><br>
                <input type="email" name="email" id=""><br>
            </div>
            <div class="row mb30">
                Mật khẩu<br><br>
                <input type="password" name="pass" id="">  
            </div>
            <div class="row mb30">
                Nhập lại mật khẩu<br><br>
                <input type="password" name="repeatpass" id=""><br>
            </div>
            <div class="row mb10" style="margin-bottom: 60px;">
                <input type="submit" name="dangky" value="Đăng ký">
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
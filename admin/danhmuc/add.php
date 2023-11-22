<div class="container">
        <h1>Thêm Danh Mục Sản Phẩm</h1>
        <form action="index.php?act=adddm" method="post">
            <div class="input-group">
                <label for="product-description">Tên Danh Mục</label>
                <input type="text" id="product-name" name="tenloai">
            </div>
            <input type="submit" name="themmoi" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            <?php 
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                        
            ?>
        </form>
    </div>
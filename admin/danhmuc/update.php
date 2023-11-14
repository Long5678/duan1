<?php

    if(is_array($dm)){
        extract($dm);
    }
?>

<div class="container">
        <h1>Thêm Danh Mục Sản Phẩm</h1>
        <form action="index.php?act=updatedm" method="post">
            <div class="input-group">
                <label for="product-name">Mã Danh mục</label>
                <input type="text" id="product-name" name="maloai" disabled>
            </div>
            <div class="input-group">
                <label for="product-description">Tên Danh Mục</label>
                <input type="text" id="product-name" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name ; ?>">
            </div>
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id ; ?>">
            <input type="submit" name="capnhat" value="Cập Nhật">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
            <?php 
                if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                        
            ?>
        </form>
    </div>

<!-- -- -->
    <div class="container">
        <h1>Quản Lý Sản Phẩm</h1>
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
            <div class="row mb10">
                        Danh mục <br>
                        <select name="iddm" id="">
                            <?php 
                            foreach($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            } 
                            ?>  
                        </select>
                    </div>
            </div>
            <div class="input-group">
                <label for="product-name">Tên Sản Phẩm</label>
                <input type="text" id="product-name" name="tensp" required>
            </div>
            <div class="input-group">
                <label for="product-description">Mô tả</label>
                <textarea id="product-description" name="mota" required></textarea>
            </div>
            <div class="input-group">
                <label for="product-price">Giá</label>
                <input type="number" id="product-price" name="giasp" min="0" step="1" required>
            </div>
            <div class="input-group">
            <div class="row mb10"> 
                       Hình<br>
                       <input type="file" id="product-image" name="hinh" required>
                    </div>
            </div>  
            <div class="input-group">
                <label for="product-name">Nhà Sản Xuất</label>
                <input type="text" id="product-name" name="nsx" required>
            </div>
            <div class="input-group">
                <label for="product-name">Đặc điểm</label>
                <input type="text" id="product-name" name="dd" required>
            </div>
            <div class="input-group">
                <label for="product-name">Hạn Sử Dụng</label>
                <input type="text" id="product-name" name="HSD" required>
            </div>
            <div class="input-group">
                <label for="product-name">Khối Lượng</label>
                <input type="text" id="product-name" name="kl" required>
            </div>

            <input type="submit" name="themmoi" value="Thêm sản phẩm"></input>
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    <?php 
                    if(isset($thongbao) && ($thongbao != ""))  echo $thongbao;
                    ?>
        </form>
    </div>
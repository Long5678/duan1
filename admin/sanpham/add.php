

    <!-- -- -->
    <div class="container">
        <h1>Product Admin</h1>
        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">

            <div class="input-group">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="tensp" required>
            </div>
            <div class="input-group">
                <label for="product-description">Product Description</label>
                <textarea id="product-description" name="mota" required></textarea>
            </div>
            <div class="input-group">
                <label for="product-price">Product Price</label>
                <input type="number" id="product-price" name="giasp" min="0" step="1" required>
            </div>
            <div class="input-group">
            <div class="row mb10"> 
                       Hình<br>
                    <input type="file" name="hinh" id="">
                    </div>
            </div>  
         
            <div class="input-group">
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
                        <input type="text" name="masp" disabled>
                    </div>
            </div>
            <input type="submit" name="themmoi" value="Add Product"></input>
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    <?php 
                    if(isset($thongbao) && ($thongbao != ""))  echo $thongbao;
                    ?>
        </form>
    </div>
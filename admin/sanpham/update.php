<?php 
if(is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/".$img;
    if(is_file($hinhpath)) {
        $hinh = "<img src='".$hinhpath."' height='80'>";
                        }else {
        $hinh = "no photo";
     }
?>

<div class="container">
            <div class="row frmtitle"><h1>CẬP NHẬT LOẠI HÀNG</h1></div>
            <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                    <select name="iddm">
                                <option value="0" selected>Tất cả</option>
                             <?php 
                             foreach($listdanhmuc as $danhmuc) { 
                                if($iddm==$danhmuc['id']) $s="selected"; else $s="";
                                echo '<option value="'.$danhmuc['id'].'" '.$s.'>'.$danhmuc['name'].'</option>';
                            }
                              ?>
                            </select>
                    </div>
                    <div class="input-group"> 
                       Tên sản phẩm<br>
                    <input type="text" name="tensp" value="<?=$name?>">
                    </div>
                    <div class="input-group"> 
                       Giá sản phẩm<br>
                    <input type="text" name="giasp" value="<?=$price?>">
                    </div>
                    <div class="input-group"> 
                       Hình<br>
                    <input type="file" name="hinh">
                      <?=$hinh?>
                    </div>
                    <div class="input-group"> 
                       Mô tả<br>
                   <textarea name="mota" cols="30" rows="10"><?= $mota ?? '' ?></textarea>
                    </div>
                    <div class="input-group">
                        <label for="product-name">Nhà Sản Xuất</label>
                        <input type="text" id="product-name" name="nsx" value="<?=$NSX?>">
                    </div>
                    <div class="input-group">
                        <label for="product-name">Đặc điểm</label>
                        <input type="text" id="product-name" name="dd" value="<?=$dacdiem?>">
                    </div>
                    <div class="input-group">
                        <label for="product-name">Hạn Sử Dụng</label>
                        <input type="text" id="product-name" name="HSD" value="<?=$hsd?>">
                    </div>
                    <div class="input-group">
                        <label for="product-name">Khối Lượng</label>
                        <input type="text" id="product-name" name="kl" value="<?=$khoiluong?>">
                    </div>

                    <div class="input-group">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập Lại">
                        <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
                    </div>
                    <?php 
                    if(isset($thongbao) && ($thongbao != ""))  echo $thongbao;
                    ?>
                </form>
            </div>
        </div>
    </div>


    <!--  -->

    

    
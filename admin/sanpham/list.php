

        <!--  -->
    
<!-- <div class="container mt-4">
<form action="index.php?act=listsp" method="post">
                            <input type="text" name="kyw" placeholder="search">
                            <input type="submit" name="listok" value="Go" class="mr-6">
                            <select name="iddm">
                                <option value="0" selected>Tất cả</option>
                             <?php 
                             foreach($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                             }
                              ?>
                            </select>
                            
                        </form>
        <table class="table col-6">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">MÃ LOẠI</th>
      <th scope="col">TÊN SẢN PHẨM</th>
      <th scope="col">HÌNH</th>
      <th scope="col">GIÁ</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
                        foreach( $listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp= "index.php?act=suasp&id=".$id; // Loại bỏ khoảng trắng sau 'id'
                        $xoasp = "index.php?act=xoasp&id=".$id; // Loại bỏ khoảng trắng sau 'id'
                        $hinhpath = "../upload/".$img;
                        if(is_file($hinhpath)) {
                            $hinh = "<img src='".$hinhpath."' height='80'>";
                        }else {
                            $hinh = "no photo";
                        }
                        echo '<tr>
                        <td scope="row"><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$hinh.'</td>
                        <td>'.$price.'</td>
                        <td class="col-md-3">
                        <a href="'.$suasp.'"><button type="button" class="btn btn-warning me-2">Sửa</button></a> 
                        <a href="'.$xoasp.'"><button type="button" class="btn btn-danger me-2">Xóa</button></a> 
                        </td>
                        </tr>';
                        };
                        ?>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>
        <button>sua</button>
      
      <button>sua</button></td>
    </tr>
    
  </tbody>


</table>
       <a href="index.php?act=addsp"><button type="button" class="btn btn-primary mt-3">Nhập Thêm</button></a>
                    </div>
</div> -->
 
      

        <!-- ------- -->

        <div class="container">
        <h2>Quản lí danh mục</h2>
        <form action="index.php?act=listsp" method="post">
                            <input type="text" name="kyw" placeholder="search">
                            <input type="submit" name="listok" value="Go" class="mr-6">
                            <select name="iddm">
                                <option value="0" selected>Tất cả</option>
                             <?php 
                             foreach($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                             }
                              ?>
                            </select>
                            
                        </form>
        <table>
        <tr>
        <th scope="col">#</th>
      <th scope="col">MÃ LOẠI</th>
      <th scope="col">TÊN SẢN PHẨM</th>
      <th scope="col">HÌNH</th>
      <th scope="col">GIÁ</th>
      <th>Action</th>
        </tr>
        <tbody>
  <?php 
                        foreach( $listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp= "index.php?act=suasp&id=".$id; // Loại bỏ khoảng trắng sau 'id'
                        $xoasp = "index.php?act=xoasp&id=".$id; // Loại bỏ khoảng trắng sau 'id'
                        $hinhpath = "../upload/".$img;
                        if(is_file($hinhpath)) {
                            $hinh = "<img src='".$hinhpath."' height='80'>";
                        }else {
                            $hinh = "no photo";
                        }
                        echo '<tr>
                        <td scope="row"><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$hinh.'</td>
                        <td>'.$price.'</td>
                        <td class="col-md-3">
                        <a href="'.$suasp.'"><button type="button" class="btn btn-warning me-2">Sửa</button></a> 
                        <a href="'.$xoasp.'"><button type="button" class="btn btn-danger me-2">Xóa</button></a> 
                        </td>
                        </tr>';
                        };
                        ?>
                        </tbody>
        </table>

        <a href="index.php?act=addsp"><button type="button" class="btn btn-primary mt-3">Nhập Thêm</button></a>
                    </div>
    </div>


        
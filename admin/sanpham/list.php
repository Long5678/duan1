<!-- ------- -->

        <div class="container">
        <h2>Danh Sách Sản Phẩm</h2>
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
        <table style="margin-top: 15px">
        <tr>
        <th scope="col">#</th>
      <th scope="col">MÃ LOẠI</th>
      <th scope="col">TÊN SẢN PHẨM</th>
      <th scope="col">HÌNH</th>
      <th scope="col">GIÁ</th>
      <th>Action</th>
        </tr>
       
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
                        <td>
                        <a href="'.$suasp.'"><input type="button" value="Sửa" style="width: 60px; background-color: #ffc107;"></a>
                        <a href="'.$xoasp.'"><input type="button" value="Xóa" style="width: 60px; background-color: #dc3545; color: white;"></a> 
                        </td>
                        </tr>';
                        };
                        ?>
                      
        </table>

        <a href="index.php?act=addsp">
          <button type="button" style="margin-top: 10px;">Nhập Thêm</button>
        </a>
                    </div>
                    
    </div>


        
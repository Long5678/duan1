<div class="container">
        <h2>Quản lí danh mục</h2>

        <table>
        <tr>
            <th></th>
            <th>Mã danh mục</th>
            <th>Tên danh mục </th>
            <th></th>
        </tr>
        <?php 
            foreach($listdanhmuc as $danhmuc){
                extract($danhmuc);
                $suadm="index.php?act=suadm&id=".$id;
                $xoadm="index.php?act=xoadm&id=".$id;
                echo '<tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                    </tr>';
            }
        ?>
                        
        </table>
    </div>
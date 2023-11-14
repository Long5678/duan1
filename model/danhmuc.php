<?php
    function insert_danhmuc($tenloai){
        $sql= "insert into category(name) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql="delete from category where id=".$id;
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql="select * from category order by id desc";
        $listdanhmuc=pdo_query($sql);
        return $listdanhmuc;
    }
    function loadone_danhmuc($id){
        $sql="select * from category where id=".$id;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id,$tenloai){
        $sql= "update category set name='".$tenloai."' where id=".$id;
        pdo_execute($sql);
    }
?>
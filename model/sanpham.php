<?php
function loadall_sanpham_home(){
    $sql="SELECT * from san_pham where 1 order by id_san_pham desc limit 0,9"; //Sắp xếp từ dưới lên
    $listsanpham=pdo_query($sql);// thực hiện câu lệnh truy vấn (nhiều dl nên dùng pdo_query($sql))
    return  $listsanpham;
}
function loadall_sanpham($keyw="",$id_danh_muc=0){
    $sql="SELECT * from san_pham where 1";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($id_danh_muc>0){
        $sql.=" and id_danh_muc ='".$id_danh_muc."'";
    }
    $sql.=" order by id_san_pham desc";
    $listsanpham=pdo_query($sql);
    
    return  $listsanpham;
}

function loadone_sanpham($id){
    $sql = "select * from san_pham where id_san_pham = $id";
    $result = pdo_query_one($sql);
  
    return $result;
}


?>
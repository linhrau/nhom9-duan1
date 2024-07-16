<?php
function loadall_sanpham_home(){
    $sql="SELECT * from san_pham where 1 order by id_san_pham desc limit 0,9"; //Sắp xếp từ dưới lên
    $listsanpham=pdo_query($sql);// thực hiện câu lệnh truy vấn (nhiều dl nên dùng pdo_query($sql))
    return  $listsanpham;
}
function loadall_sanpham($keyw="",$iddm=0){
    $sql="SELECT * from san_pham where 1";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id_san_pham desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}

?>
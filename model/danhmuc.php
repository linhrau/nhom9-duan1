<?php
//hiển thị tất cả danh mục ra
function loadall_danhmuc(){
    $sql="SELECT * from danh_muc order by id_danh_muc desc";//load danh mục mới nhất từ dưới lên 
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function danhmuc(){
    $sql="SELECT * FROM danh_muc";
    $danhmuc=pdo_query($sql);
    return $danhmuc;

}
function load_ten_dm($id_danh_muc){
    if($id_danh_muc>0){
        $sql="SELECT * from danh_muc where id_danh_muc=".$id_danh_muc;
        $dm=pdo_query_one($sql);//lấy ra tên nó
        extract($dm);
        return $ten_danh_muc;
    }else{
        return "";
    }

}
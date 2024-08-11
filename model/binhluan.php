<?php
function loadall_binhluan($id_san_pham) {
    $sql = "SELECT binh_luan.*, tai_khoan.ten_dang_nhap
            FROM binh_luan
            INNER JOIN tai_khoan ON binh_luan.id_tai_khoan = tai_khoan.id_tai_khoan	
            WHERE 1";
    if ($id_san_pham > 0) {
        $sql .= " AND id_san_pham	 = '" . $id_san_pham . "'";
    }

    $sql .= " ORDER BY binh_luan.id_binh_luan DESC";

    $listbl = pdo_query($sql);
    return $listbl;
}
function insert_binhluan($id_san_pham, $noi_dung,$id_tai_khoan, $danh_gia){
    $date = date('Y-m-d');
    $sql = "
        INSERT INTO binh_luan(noi_dung, id_tai_khoan, id_san_pham, ngay_binh_luan, danh_gia) 
        VALUES ('$noi_dung','$id_tai_khoan','$danh_gia' ,'$id_san_pham','$date');
    ";
    pdo_execute($sql);
}

function delete_binhluan($id_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE id_binh_luan =" .$id_binh_luan;
    pdo_execute($sql);
}
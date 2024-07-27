<?php
//hiển thị 9 sản phẩm mới nhất
function loadall_sanpham_home()
{
    $sql = "select * from san_pham where 1 order by id_san_pham desc limit 0,9"; //Sắp xếp từ dưới lên
    $listsanpham = pdo_query($sql); // thực hiện câu lệnh truy vấn (nhiều dl nên dùng pdo_query($sql))
    return  $listsanpham;
}
function loadall_sanpham($keyw = "", $id_danh_muc = 0)
{
    $sql = "select * from san_pham where 1";
    // where 1 tức là nó đúng
    if ($keyw != "") {
        $sql .= " and ten_san_pham like '%" . $keyw . "%'";
    }
    if ($id_danh_muc > 0) {
        $sql .= " and id_danh_muc ='" . $id_danh_muc . "'";
    }
    $sql .= " order by id_san_pham desc";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}

// 
function loadone_sanpham($id_san_pham)
{
    $sql = "select * from san_pham where id_san_pham = $id_san_pham";
    $result = pdo_query_one($sql);

    return $result;
}
function load_sanpham_cungloai($id_san_pham, $id_danh_muc)
{
    $sql = "select * from san_pham where id_danh_muc = $id_danh_muc and id_san_pham <> $id_san_pham"; // khác với sản phẩm id hiện tại
    $result = pdo_query($sql);
    return $result;
}
function insert_sanpham($ten_san_pham, $gia, $so_luong, $img, $mo_ta_sp, $id_danh_muc)
{
    $sql = " INSERT INTO `san_pham`(`ten_san_pham`, `gia`,`so_luong`, `img`, `mo_ta_sp`,`id_danh_muc`) VALUES ('$ten_san_pham', '$gia', '$so_luong', '$img', '$mo_ta_sp',  '$id_danh_muc');";
    pdo_execute($sql);
}
function delete_sanpham($id_san_pham)
{
    $sql = "delete from san_pham where id_san_pham=" . $id_san_pham;
    pdo_execute($sql);
}

function update_sanpham($id_san_pham, $id_danh_muc, $ten_san_pham, $gia, $so_luong, $mo_ta_sp, $img)
{
    if ($img != "") {
        $sql =  "UPDATE `san_pham` SET `ten_san_pham` = '{$ten_san_pham}', `gia` = '{$gia}',`so_luong` ='{$so_luong}',`mo_ta_sp` = '{$mo_ta_sp}',`img` = '{$img}', `id_danh_muc` = '{$id_danh_muc}' WHERE `san_pham`.`id_san_pham` = $id_san_pham";
    } else {
        $sql =  "UPDATE `san_pham` SET `ten_san_pham` = '{$ten_san_pham}', `gia` = '{$gia}', `so_luong` ='{$so_luong}',   `mo_ta_sp` = '{$mo_ta_sp}', `id_danh_muc` = '{$id_danh_muc}' WHERE `san_pham`.`id_san_pham` = $id_san_pham,  `img` = $img";
    }
    pdo_execute($sql);
}

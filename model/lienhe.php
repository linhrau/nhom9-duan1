<?php
function loadall_lienhe($id_lien_he)
{
    $sql = "SELECT lien_he.*, tai_khoan.ten_dang_nhap
            FROM lien_he
            INNER JOIN tai_khoan ON lien_he.ho_ten = tai_khoan.ho_ten	
            WHERE 1";
    if ($id_lien_he > 0) {
        $sql .= " AND id_lien_he = '" . $id_lien_he . "'";
    }

    $sql .= " ORDER BY lien_he.id_lien_he DESC";

    $listlh = pdo_query($sql);
    return $listlh;
}
function insert_lienhe($ho_ten, $email, $sdt, $noi_dung)
{
    $sql = "
        INSERT INTO lien_he( ho_ten, email, sdt,noi_dung) 
        VALUES ('$ho_ten','$email','$sdt' ,'$noi_dung');
    ";
    pdo_execute($sql);
}

function delete_lienhe($id_lien_he)
{
    $sql = "DELETE FROM lien_he WHERE id_lien_he =" . $id_lien_he;
    pdo_execute($sql);
}

function get_ttlh($n)
{
    switch ($n) {
        case '0':
            $tt = "Chưa Phản Hồi";
            break;
        case '1':
            $tt = "Đã Phản Hồi";
            break;

            break;
    }
    return $tt;
}
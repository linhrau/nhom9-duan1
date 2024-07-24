<?php
include "global.php";
include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    include "model/sanpham.php";
    include "model/danhmuc.php";

    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $danhmuc = danhmuc();

    $act = $_GET['act'];
    switch ($act) {
        case 'listdanhmuc':
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $kyw = $_POST['keyword'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $id_danh_muc = $_GET['id_danh_muc'];
            } else {
                $id_danh_muc = 0;
            }
            $dssp = loadall_sanpham($kyw, $id_danh_muc);
            $tendm = load_ten_dm($id_danh_muc);
            include "view/sanpham/shop.php";
            break;


        case 'chitietsp':
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                $id = $_GET['id_san_pham'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                include "view/sanpham/chitietsp.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'danhmuc':
            $listdanhmuc = loadall_danhmuc();
            break;
        case 'search':
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
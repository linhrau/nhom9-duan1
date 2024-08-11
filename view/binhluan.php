<?php
require_once 'model/pdo.php';
session_start();

if (!isset($_SESSION['ten_tai_khoan'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_san_pham = intval($_POST['id_san_pham']);
    $id_tai_khoan = $_SESSION['ten_tai_khoan']['id_tai_khoan'];
    $danh_gia = intval($_POST['danh_gia']);
    $noi_dung = $_POST['noi_dung'];
    $ngay_binh_luan = date('Y-m-d H:i:s');

    $sql = "INSERT INTO binh_luan (ten_dang_nhap, danh_gia, noi_dung, ngay_binh_luan, id_tai_khoan, id_san_pham) 
            VALUES ((SELECT ten_dang_nhap FROM tai_khoan WHERE id_tai_khoan = :id_tai_khoan), :danh_gia, :noi_dung, :ngay_binh_luan, :id_tai_khoan, :id_san_pham)";
    pdo_execute($sql, [
        ':id_tai_khoan' => $id_tai_khoan,
        ':danh_gia' => $danh_gia,
        ':noi_dung' => $noi_dung,
        ':ngay_binh_luan' => $ngay_binh_luan,
        ':id_san_pham' => $id_san_pham
    ]);

    header("Location: index.php?act=chitietsp&id_san_pham=$id_san_pham");
}

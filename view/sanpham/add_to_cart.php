<?php
session_start();
require_once '../../model/pdo.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_san_pham = intval($_POST['id_san_pham']);
    $qty = intval($_POST['qty']);
    $id_tai_khoan = $_SESSION['user_id']; 

    $product = pdo_query_one("SELECT * FROM san_pham WHERE id_san_pham = :id_san_pham", [':id_san_pham' => $id_san_pham]);

    if ($product) {
        $img = $product['img'];
        $ten_san_pham = $product['ten_san_pham'];
        $gia = $product['gia'];
        $thanh_tien = $gia * $qty;

        $cartItem = pdo_query_one("SELECT * FROM cart WHERE id_san_pham = :id_san_pham AND id_tai_khoan = :id_tai_khoan", [
            ':id_san_pham' => $id_san_pham,
            ':id_tai_khoan' => $id_tai_khoan
        ]);

        if ($cartItem) {
            pdo_execute("UPDATE cart SET soluong = soluong + :qty, thanh_tien = thanh_tien + :thanh_tien WHERE id_san_pham = :id_san_pham AND id_tai_khoan = :id_tai_khoan", [
                ':qty' => $qty,
                ':thanh_tien' => $thanh_tien,
                ':id_san_pham' => $id_san_pham,
                ':id_tai_khoan' => $id_tai_khoan
            ]);
        } else {
            pdo_execute("INSERT INTO cart (id_tai_khoan, id_san_pham, img, ten_san_pham, gia, soluong, thanh_tien) VALUES (:id_tai_khoan, :id_san_pham, :img, :ten_san_pham, :gia, :soluong, :thanh_tien)", [
                ':id_tai_khoan' => $id_tai_khoan,
                ':id_san_pham' => $id_san_pham,
                ':img' => $img,
                ':ten_san_pham' => $ten_san_pham,
                ':gia' => $gia,
                ':soluong' => $qty,
                ':thanh_tien' => $thanh_tien
            ]);
        }

        header('Location: ../../cart.php');
        exit();
    } else {
        echo 'Product not found.';
    }
}
?>
<?php
require_once 'model/pdo.php';

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id_tai_khoan'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'update_quantity':
                if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
                    $product_id = intval($_POST['product_id']);
                    $quantity = intval($_POST['quantity']);
                    if ($quantity > 0) {
                        $sql = "UPDATE cart SET soluong = :soluong, thanh_tien = gia * :soluong WHERE id_tai_khoan = :user_id AND id_san_pham = :product_id";
                        pdo_execute($sql, [
                            ':soluong' => $quantity,
                            ':user_id' => $user_id,
                            ':product_id' => $product_id
                        ]);
                    }
                }
                break;

            case 'remove_item':
                if (isset($_POST['product_id'])) {
                    $product_id = intval($_POST['product_id']);
                    $sql = "DELETE FROM cart WHERE id_tai_khoan = :user_id AND id_san_pham = :product_id";
                    pdo_execute($sql, [
                        ':user_id' => $user_id,
                        ':product_id' => $product_id
                    ]);
                }
                break;
        }
        echo json_encode(['status' => 'success']);
    }
}
?>
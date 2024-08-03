<?php
session_start();
ob_start();
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}


include "model/pdo.php"; //gọi đến kết nối CSDL để đổ tất cả dữ liệu ra
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/taikhoan.php";
include "model/giohang.php";

//Những file này include trên header
include "view/header.php";
include "global.php";
//thực hiện truy vấn lấy ra toàn bộ dl 
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'chitietsp':
            if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
                $idpro = $_POST['id_san_pham'];
                $iduser = $_SESSION['ho_ten']['id_tai_khoan'];
                $noidung = $_POST['noi_dung'];
                $danh_gia = $_POST['danh_gia'];
                insert_binhluan($idpro, $noidung, $iduser, $danh_gia);
            }
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                $id = $_GET['id_san_pham'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $id_danh_muc);
                $binhluan = loadall_binhluan($_GET['id_san_pham']);
                include "view/sanpham/chitietsp.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'shop':
            if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
                $kyw = $_POST['keyword'];
            } else {
                $kyw = "";
            }

            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $iddm = $_GET['id_danh_muc'];
            } else {
                $iddm = 0;
            }

            // session_destroy();
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);

            include "view/sanpham/shop.php";
            break;

        case 'giohang':
            if (isset($_POST['addcart']) && ($_POST['addcart'])) {
                $id_san_pham = $_POST['id_san_pham'];
                $img = $_POST['img'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $thanh_tien = $soluong * $gia;
                if (isset($_POST['soluong']) && ($_POST['soluong'] > 0)) {
                    $soluong = $_POST['soluong'];
                } else {
                    $soluong = 1;
                }
                $ktr = 0;
                $i = 0;
                foreach ($_SESSION['mycart'] as $item) {
                    if ($item[2] == $ten_san_pham) {
                        $soluongmoi = $soluong + $item[5];
                        $_SESSION['mycart'][$i][5] = $soluongmoi;
                        $ktr = 1;
                        break;
                    }
                    $i++;
                }

                if ($ktr == 0) {
                    $spadd = [$id_san_pham, $img, $ten_san_pham, $gia, $soluong, $thanh_tien]; // mảng con chứa thông tin // Vị trí: [i]:hàng  [0]: cột
                    array_push($_SESSION['mycart'], $spadd);
                }
            }
            include "view/giohang/giohang.php";
            break;

        case 'update-quantity-cart':
            if (isset($_POST['updateCart']) && $_POST['updateCart']) {
                $quantities = $_POST['quantity'];
                $ids = $_POST['id'];

                foreach ($ids as $index => $id) {
                    if (isset($quantities[$index]) && isset($_SESSION['mycart'][$id])) {
                        $quantity = intval($quantities[$index]);
                        if ($quantity > 0) {
                            $_SESSION['mycart'][$id][4] = $quantity;
                            $_SESSION['mycart'][$id][5] = $_SESSION['mycart'][$id][3] * $quantity;
                        }
                    }
                }

                header('Location: index.php?act=giohang');
                exit();
            }
            break;
        case 'delcart':
            if (isset($_GET['id'])) {
                $idToRemove = $_GET['id'];
                foreach ($_SESSION['mycart'] as $key => $cart) {
                    if ($cart[0] == $idToRemove) {
                        unset($_SESSION['mycart'][$key]);
                        $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                        break;
                    }
                }
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=giohang');
            break;
        case 'dathang':
            include "view/giohang/thanhtoan.php";
            break;
        case 'donhang':
            if (isset($_POST['payUrl']) && ($_POST['payUrl'])) {

                if (isset($_SESSION['user'])) {
                    $id_tai_khoan = $_SESSION['user']['id_tai_khoan'];
                } else {
                    header("Location: index.php?act=login");
                }

                $ho_ten = $_POST['ho_ten'];
                $dia_chi = $_POST['dia_chi'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $pttt = $_POST['pttt'];
                $ngay_dat_hang = date('Y-m-d');
                $tong_tien = tongdonhang();


                if ($pttt == 1) {
                    if ($_POST['payUrl']) {

                        $pttt = 1;
                        $trang_thai = 1;
                        $order_id = uniqid();
                        $data = [
                            'id_tai_khoan' => $id_tai_khoan,
                            'ho_ten' => $ho_ten,
                            'dia_chi' => $dia_chi,
                            'sdt' => $sdt,
                            'email' => $email,
                            'pttt' => $pttt,
                            'ngay_dat_hang' => $ngay_dat_hang,
                            'tong_tien' => $tong_tien,
                            'trang_thai' => $trang_thai
                        ];

                        $_SESSION['data'] = $data;


                        $vnp_TmnCode = "7PYSBDFC";
                        $vnp_HashSecret = "EZMOKX7ZP0X6SB2J0SNXD6TN1KB6PSJ6";
                        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                        $vnp_Returnurl = "http://localhost/duan1/index.php?act=orderSuccess";
                        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
                        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
                        $startTime = date("YmdHis");
                        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
                        $vnp_TxnRef = rand(1, 10000);
                        $vnp_OrderInfo = 'Nội Dung Thanh Toán';
                        $vnp_OrderType = 'billpayment';
                        $vnp_Amount = 1000;
                        $vnp_Locale = 'vn';
                        $vnp_BankCode = 'NCB';
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount * 100,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
                            "vnp_OrderType" => "other",
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            "vnp_ExpireDate" => $expire,
                            // "order_id" => $order_id
                        );

                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }

                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array(
                            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                        );

                        // if (isset($_POST['payUrl'])) {
                        header('Location: ' . $vnp_Url);
                        die;
                        // } else {
                        //     echo json_encode($returnData);
                        // }
                    }
                } else {
                    $pttt = 0;
                    $trang_thai = 0;

                    $iddonhang = insert_donhang($id_tai_khoan, $ho_ten, $dia_chi, $sdt, $email, $pttt, $tong_tien, $ngay_dat_hang, $trang_thai);

                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_ctdonhang($id_tai_khoan, $iddonhang, $cart[0], $cart[1], $cart[2], $cart[3], $cart[4], $cart[5]);
                    }
                    $_SESSION['mycart'] = [];
                }

                echo '<script>alert("Đặt hàng thành công")</script>';
                echo '<script>window.location.href="index.php"</script>';
            }

            break;
        case 'listdonhang':
            $listdonhang = load_donhang($_SESSION['ho_ten']['id_tai_khoan']);

            include "view/giohang/listdonhang.php";
            break;


        case 'dangnhap':
            if (isset($_POST['dang_nhap']) && ($_POST['dang_nhap'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $checkuser = check_user($ten_dang_nhap, $mat_khau);

                if (is_array($checkuser)) {
                    $_SESSION['ten_dang_nhap'] = $checkuser;
                    // $thongbao = "Đăng nhập thành công";
                    header("Location: index.php?act=shop");
                } else {
                    $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $ho_ten = $_POST['ho_ten'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $sdt = $_POST['sdt'];


                insert_taikhoan($ho_ten, $ten_dang_nhap, $mat_khau, $email, $dia_chi, $sdt);
                $thongbao = "Đăng ký thành công, bạn có thể đăng nhập để sử dụng chức năng!";
                header("Location: index.php?act=dangnhap");
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'thoat':
            session_unset();
            header("Location: index.php");
            break;
        case 'edittaikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $ho_ten = $_POST['ho_ten'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $sdt = $_POST['sdt'];
                $id_tai_khoan = $_POST['id_tai_khoan'];
                update_taikhoan($ho_ten, $id_tai_khoan, $ten_dang_nhap, $mat_khau, $email, $dia_chi, $sdt);
                $_SESSION['ten_dang_nhap'] = check_user($ten_dang_nhap, $mat_khau);
                $thongbao = "Cập nhật tài khoản thành công!";
                header("Location: index.php?act=edittaikhoan");
            }
            include "view/taikhoan/edittaikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['mat_khau'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'thongtin':
            include "view/taikhoan/thongtin.php";
            break;
    }
} else {
    header("Location: index.php?act=shop");
}
include "view/footer.php";
ob_end_flush();

<?php
session_start();
ob_start();
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
} //kiểm tra k tồn tại thì khởi tạo giỏ hàng


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
            // if(isset($_POST['guibinhluan'])){
            //     extract($_POST);
            //     var_dump($_POST);
            //     insert_binhluan($idpro, $noidung);
            // }
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
        case 'delcart':


            // if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            if (isset($_GET['id'])) {
                array_splice($_SESSION['mycart'], $_GET['id'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }

            header('location: index.php?act=giohang');


            break;
        case 'dathang':
            include "view/giohang/thanhtoan.php";
            break;
        case 'donhang':

            if (isset($_POST['dathang']) && ($_POST['dathang'])) {

                if (isset($_SESSION['ho_ten'])) {
                    $id_tai_khoan = $_SESSION['ho_ten']['id_tai_khoan'];
                    // var_dump($_SESSION);
                } else {
                    include_once('view/taikhoan/dangnhap.php');
                }
                $ho_ten = $_POST['ho_ten'];
                $dia_chi = $_POST['dia_chi'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $pttt = $_POST['pttt'];
                $ngay_dat_hang = date('Y-m-d');
                $tong_tien = tongdonhang();
                //tạo đơn hàng
                $iddonhang = insert_donhang($id_tai_khoan, $user, $dia_chi, $sdt, $email, $pttt, $tong_tien, $ngay_dat_hang);
                // lấy dl từ session['mycart'] và iddonhang
                // var_dump($_SESSION['mycart']);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_ctdonhang($id_tai_khoan, $iddonhang, $cart[0], $cart[1], $cart[2], $cart[3], $cart[4], $cart[5], $cart[6]);
                }
                //xóa session 
                $_SESSION['mycart'] = [];
            }

            // var_dump($donhang);
            $donhang = loadone_donhang($iddonhang);

            $ctdonhang = loadall_ctdonhang($iddonhang);

            include "view/giohang/donhang.php";
            break;

        case 'listdonhang':
            $listdonhang = load_donhang($_SESSION['ho_ten']['id_tai_khoan']);

            include "view/giohang/listdonhang.php";
            break;
        case 'dangnhap':

            include "view/taikhoan/dangnhap.php";
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

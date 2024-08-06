<?php
session_start();
ob_start();

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/lienhe.php";
include "../model/giohang.php";



include "header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case "listsp":
            if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                $keyw = $_POST['keyw'];
                $id_danh_muc = $_POST['id_danh_muc'];
            } else {
                $keyw = "";
                $id_danh_muc = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($keyw, $id_danh_muc);
            include "sanpham/list.php";
            break;
        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $id_danh_muc = $_POST['id_danh_muc'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $so_luong = $_POST['so_luong'];
                $mo_ta_sp = $_POST['mo_ta_sp'];

                $hinh = $_FILES['hinh']['name']; //lấy ra tên hình
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    echo "Upload thành công!";
                } else {
                    echo "Upload không thành công!";
                }

                echo $id_danh_muc;
                insert_sanpham($ten_san_pham, $gia, $so_luong, $hinh, $mo_ta_sp, $id_danh_muc);


                $thanhcong = "Thêm thành công!";
            }
            $listdanhmuc = loadall_danhmuc();

            include "sanpham/add.php";
            break;
        case "xoasp":
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                delete_sanpham($_GET['id_san_pham']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case "suasp":
            if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {

                $san_pham = loadone_sanpham($_GET['id_san_pham']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case "updatesp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id_danh_muc = $_POST['id_danh_muc'];
                $id_san_pham = $_POST['id_san_pham'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $so_luong = $_POST['so_luong'];
                $mo_ta_sp = $_POST['mo_ta_sp'];
                //lỗi đoạn này
                $hinh = $_FILES['img']['name'];
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                update_sanpham($id_danh_muc, $id_san_pham, $ten_san_pham, $gia, $so_luong, $mo_ta_sp, $hinh);
                $thongbao = "cập nhật thành công!";
            }
            $listsanpham = loadall_sanpham("", 0);
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/list.php";
            break;

        case "adddm":
            $errtenloai = "";
            $tenloai = "";
            //kiểm tra xem người dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) { //kiểm tra xem nó có tồn tại hay k và có click vào hay k
                $tenloai = $_POST['tenloai']; //lấy tên loại về và insert vào database
                if (empty($_POST['tenloai'])) {
                    $errtenloai = "Bạn chưa nhập tên danh mục";
                }
                if ($errtenloai == "") {
                    $sql = "insert into danh_muc(ten_danh_muc) values('$tenloai')"; //câu lệnh sql
                    pdo_execute($sql); //thực thi câu lệnh
                    $thongbao = "Thêm thành công";
                }
            }
            include "danhmuc/add.php";
            break;
        case "listdm":
            $sql = "select * from danh_muc order by id_danh_muc desc";
            $listdanhmuc = pdo_query($sql); //gán cho 1 giá trị nào đó
            include "danhmuc/list.php";
            break;
        case "xoadm":
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $sql = "delete from danh_muc where id_danh_muc=" . $_GET['id_danh_muc'];
                pdo_execute($sql);
            }
            $sql = "select * from danh_muc order by id_danh_muc desc";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
        case "suadm":
            if (isset($_GET['id_danh_muc']) && ($_GET['id_danh_muc'] > 0)) {
                $sql = "select * from danh_muc where id_danh_muc=" . $_GET['id_danh_muc'];
                $dm = pdo_query_one($sql);
            }

            include "danhmuc/update.php";
            break;
        case "updatedm":

            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id_danh_muc = $_POST['id_danh_muc'];

                $sql = "update danh_muc set ten_danh_muc='" . $tenloai . "' where id_danh_muc=" . $id_danh_muc;
                pdo_execute($sql);
                $thongbao = "Thêm thành công";
            }

            $sql = "select * from danh_muc order by id_danh_muc desc";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case "thoat":
            session_unset();
            header('location: ../index.php?act=dangnhap');
            break;
        case "home":
            include "home.php";
            break;

        case "listtk":
            $listtaikhoan = loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case "xoatk":
            if (isset($_GET['id_tai_khoan']) && ($_GET['id_tai_khoan'] > 0)) {
                $sql = "delete from tai_khoan where id_tai_khoan=" . $_GET['id_tai_khoan'];
                pdo_execute($sql);
            }
            $sql = "select * from tai_khoan order by id_tai_khoan desc";
            $listtaikhoan = pdo_query($sql);
            include "taikhoan/list.php";
            break;

        case "addtk":

            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $ho_ten = $_POST['ho_ten'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $sdt = $_POST['sdt'];
                $role = $_POST['role'];

                insert_taikhoan($ho_ten, $ten_dang_nhap, $mat_khau, $email, $dia_chi, $sdt, $role);
                $thanhcong = "Thêm thành công!";
            }

            include "taikhoan/add.php";
            break;



        case "listbl":
            $sql = "select * from binh_luan order by id_binh_luan desc";
            $listbinhluan = pdo_query($sql);
            include "binhluan/list.php";
            break;
        case "xoabl":
            if (isset($_GET['id_binh_luan']) && ($_GET['id_binh_luan'] > 0)) {
                $sql = "delete from binh_luan where id_binh_luan=" . $_GET['id_binh_luan'];
                pdo_execute($sql);
            }
            $sql = "select * from binh_luan order by id_binh_luan desc";
            $listbinhluan = pdo_query($sql);
            include "binhluan/list.php";
            break;

        case "listbl":
            $sql = "select * from binh_luan order by id_binh_luan desc";
            $listbinhluan = pdo_query($sql);
            include "binhluan/list.php";
            break;
        case "xoabl":
            if (isset($_GET['id_binh_luan']) && ($_GET['id_binh_luan'] > 0)) {
                $sql = "delete from binh_luan where id_binh_luan=" . $_GET['id_binh_luan'];
                pdo_execute($sql);
            }
            $sql = "select * from binh_luan order by id_binh_luan desc";
            $listbinhluan = pdo_query($sql);
            include "binhluan/list.php";
            break;

        case "listlh":
            $sql = "select * from lien_he order by id_lien_he desc";
            $listlienhe = pdo_query($sql);
            include "binhluan/list.php";
            break;
        case "xoalh":
            if (isset($_GET['id_lien_he']) && ($_GET['id_lien_he'] > 0)) {
                $sql = "delete from lien_hen where id_lien_he=" . $_GET['id_lien_he'];
                pdo_execute($sql);
            }
            $sql = "select * from lien_he order by id_lien_he desc";
            $listlienhe = pdo_query($sql);
            include "lienhe/list.php";
            break;




        case "listdonhang":
            if (isset($_POST['key']) && ($_POST['key']) != "") {
                $key = $_POST['key'];
            } else {
                $key = "";
            }
            $listdonhang = loadall_donhang($key, 0);
            include "donhang/list.php";
            break;
        case 'suadh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $donhang = loadone_donhang($_GET['id']);
            }
            include "donhang/update.php";
            break;

        case "xoadh":
            if (isset($_GET['id_hoa_don']) && ($_GET['id_hoa_don'] > 0)) {
                xoa_donhang($_GET['id_hoa_don']);
            }
            $listdonhang = loadall_donhang("", 0);
            include "donhang/list.php";
            break;

        case 'updatedh':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $trang_thai = isset($_POST['trang_thai']) ? intval($_POST['trang_thai']) : 0;
                $id_hoa_don = $_POST['id_hoa_don'];
                // Kiểm tra nếu $bill_status không nằm trong khoảng từ 0 đến 3, đặt lại giá trị về 0
                if ($trang_thai < 0 || $trang_thai > 3) {
                    $trang_thai = 0;
                }
                suadonhang($id_hoa_don, $trang_thai);
            }
            $listdonhang = loadall_donhang("", 0);
            header('location:index.php?act=listdonhang');
            include "donhang/update.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";

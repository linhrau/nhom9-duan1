<?php
session_start();
ob_start();

    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";


    include "header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
         
            case "listsp":
                if(isset($_POST['clickOK'])&&($_POST['clickOK'])){
                    $keyw=$_POST['keyw'];
                    $id_danh_muc=$_POST['id_danh_muc'];

                }else{
                    $keyw="";
                    $id_danh_muc=0;
                }
                $listdanhmuc= loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw, $id_danh_muc);
                include "sanpham/list.php";
                break;
            case "addsp":
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $gia = $_POST['gia'];
                    $mo_ta_sp = $_POST['mo_ta_sp'];
                
                    $hinh = $_FILES['hinh']['name']; //lấy ra tên hình
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES['hinh']['name']);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
                        echo "Upload thành công!";
                    }else{
                        echo"Upload không thành công!";
                    }

                    echo $id_danh_muc;
                    insert_sanpham($ten_san_pham, $gia,  $hinh, $mo_ta_sp,$id_danh_muc);
                    
                    
                    $thanhcong = "Thêm thành công!";
                   
                }
                $listdanhmuc= loadall_danhmuc();

                include "sanpham/add.php";
                break;  
            case "xoasp":
                if(isset($_GET['id_san_pham'])&&($_GET['id_san_pham']>0)){
                    delete_sanpham($_GET['id_san_pham']);

                }
                $listsanpham = loadall_sanpham("",0);
                include "sanpham/list.php";
                break;
            case "suasp":
                if(isset($_GET['id_san_pham'])&&($_GET['id_san_pham']>0)){
                  
                    $sanpham=loadone_sanpham($_GET['id_san_pham']);
                }
                $listdanhmuc= loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case "updatesp":
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $id_san_pham = $_POST['id_san_pham'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $gia = $_POST['gia'];
                    $mo_ta_sp = $_POST['mo_ta_sp'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        
                    } else {
                        
                    }
                    update_sanpham( $id_danh_muc, $id_san_pham, $ten_san_pham, $gia, $mo_ta_sp, $hinh);
                    $thongbao = "cập nhật thành công!";
                }
                $listsanpham = loadall_sanpham("", 0);
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/list.php";
                break;
                         
            case "adddm":
                $errtenloai="";
                $tenloai="";
                //kiểm tra xem người dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){ //kiểm tra xem nó có tồn tại hay k và có click vào hay k
                    $tenloai=$_POST['tenloai']; //lấy tên loại về và insert vào database
                    if(empty($_POST['tenloai']))
                    {
                        $errtenloai="Bạn chưa nhập tên loại";
                    }
                    if($errtenloai==""){
                        $sql="insert into danh_muc(ten_danh_muc) values('$tenloai')";//câu lệnh sql
                        pdo_execute($sql);//thực thi câu lệnh
                        $thongbao="Thêm thành công";

                    }
                }
                include "danhmuc/add.php";
                break;  
            case "listdm":
                $sql="select * from danh_muc order by id_danh_muc desc";
                $listdanhmuc=pdo_query($sql); //gán cho 1 giá trị nào đó
                include "danhmuc/list.php";
                break;  
            case "xoadm":
                if(isset($_GET['id_danh_muc'])&&($_GET['id_danh_muc']>0)){
                    $sql="delete from danh_muc where id_danh_muc=".$_GET['id_danh_muc'];
                    pdo_execute($sql);
                }
                $sql="select * from danh_muc order by id_danh_muc desc";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/list.php";
                break;  
            case "suadm":
                if(isset($_GET['id_danh_muc'])&&($_GET['id_danh_muc']>0)){
                    $sql="select * from danh_muc where id_danh_muc=".$_GET['id_danh_muc'];
                    $dm=pdo_query_one($sql);
                }
             
                include "danhmuc/update.php";
                break; 
            case "updatedm":
                
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id_danh_muc=$_POST['id_danh_muc'];

                    $sql="update danh_muc set ten_danh_muc='".$tenloai."' where id_danh_muc=".$id_danh_muc;
                    pdo_execute($sql);
                    $thongbao="Thêm thành công";
                }

                $sql="select * from danh_muc order by id_danh_muc desc";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/list.php";
                break;   

            case "thoat":
                session_unset();
                header('location: ../index.php?act=dangnhap');
                break;
            case "home":
                include "home.php";
                break;
          
        }
    }else{
        include "home.php";
    }
    include "footer.php";


?>

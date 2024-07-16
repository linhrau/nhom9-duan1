<?php
 include "global.php";
include "view/header.php";
if(isset($_GET['act']) && ($_GET['act'] != "")){
    include "model/pdo.php"; 
    include "model/sanpham.php";
    include "model/danhmuc.php";
    
    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $act =$_GET['act'];
    switch ($act) {
        case 'shop':
            if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                $kyw = $_POST['keyword'];
            }else{
                $kyw = "";
            }
            if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                $iddm=$_GET['iddm'];
            }else{
                $iddm=0;
            }
            $dssp=loadall_sanpham($kyw,$iddm);
            $tendm= load_ten_dm($iddm);
            include "view/sanpham/shop.php";
            break;
        case 'danhmuc':
            $tendm= load_ten_dm($iddm);
        default:
        include "view/home.php";
            break;
    }
}else{
    include "view/home.php";
}
include "view/footer.php";
?>
<?php

function insert_taikhoan($ho_ten,$ten_dang_nhap, $mat_khau, $email,$dia_chi,$sdt)
{
    $sql = "INSERT INTO tai_khoan(ho_ten, ten_dang_nhap,mat_khau,email,dia_chi,sdt) values (?,?,?,?,?,?)";
    pdo_execute($sql,$ho_ten,$ten_dang_nhap, $mat_khau, $email,$dia_chi,$sdt);
}
function check_ten_dang_nhap($ten_dang_nhap, $mat_khau)
{
    $sql = "SELECT *FROM tai_khoan WHERE ten_dang_nhap='" . $ten_dang_nhap . "' AND mat_khau='" . $mat_khau . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function  update_taikhoan($id_tai_khoan,$ho_ten, $ten_dang_nhap, $mat_khau, $email, $dia_chi, $sdt)
{
    $sql = "UPDATE tai_khoan SET ho_ten ='".$ho_ten."' , ten_dang_nhap='" . $ten_dang_nhap . "' ,mat_khau='" . $mat_khau . "',email='" . $email . "',dia_chi='" . $dia_chi . "',sdt='" . $sdt . "' WHERE id_tai_khoan=" . $id_tai_khoan;
    pdo_execute($sql);
}
function checkemail($email)
{
    $sql = "SELECT *FROM tai_khoan WHERE email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_taikhoan()
{
    $sql = "SELECT * FROM tai_khoan order by id_tai_khoan desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

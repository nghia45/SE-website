<?php
include('../../config/config.php');
$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if(isset($_POST['themdanhmuc'])) {
    $sql_them = "INSERT INTO tb_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
    mysqli_query($mysqli,$sql_them); 
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} elseif(isset($_POST['suadanhmuc'])) {
    $sql_sua = "UPDATE tb_danhmuc SET tendanhmuc='".$tenloaisp."', thutu ='".$thutu."' WHERE id_danhmuc = '$_GET[iddanhmuc]'";
    mysqli_query($mysqli,$sql_sua); 
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} else {
    $id=$_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM tb_danhmuc WHERE id_danhmuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa); 
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
?>
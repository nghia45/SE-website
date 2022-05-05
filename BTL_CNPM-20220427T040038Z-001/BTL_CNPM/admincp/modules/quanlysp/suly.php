<?php
include('../../config/config.php');

$tensp = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = rand(1000,10000).'-'.$hinhanh;
$soluong = $_POST['soluong'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];

if(isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO tb_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang) VALUE('".$tensp."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."')";
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    mysqli_query($mysqli,$sql_them); 
    header('Location:../../index.php?action=quanlysanpham&query=them');
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
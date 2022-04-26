<?php
include("../../admin/config.php");
$tensp = $_POST['tensanpham'];
$anhsp = rand(1000,10000).'-'.$_FILES['anh']['name'];
$tempname = $_FILES['anh']['tmp_name'];    
$folder = "../../admin/".$anhsp;
$giasp = $_POST['giasanpham'];
$soluong = $_POST['soluong'];
$thutu = $_POST['thutu'];
$danhmuc = $_POST['danhmuc'];
if (isset($_POST['themsanpham'])) {
    $themsp = "INSERT INTO sanpham(tensanpham, anhsanpham, giasanpham,soluong, thutu, danhmucsanpham) VALUES('".$tensp."',
     '".$anhsp."','".$giasp."',
    '".$soluong."','".$thutu."', '".$danhmuc."')";
   move_uploaded_file($tempname, $folder);
    mysqli_query($mysqli, $themsp);
    header('Location:../../modules/index.php?action=sanpham');
    
}

?>
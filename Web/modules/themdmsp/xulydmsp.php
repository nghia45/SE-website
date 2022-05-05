<?php
include("../../admin/config.php");
$tensp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if (isset($_POST['themdanhmuc'])) {
    $themdm = "INSERT INTO danhmucsp(tendanhmuc, thutu) VALUE('".$tensp."', '".$thutu."')";
    mysqli_query($mysqli, $themdm);
    header('Location:../../modules/index.php?action=danhmucsanpham');
    
}

?>
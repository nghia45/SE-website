<?php
include('../../config/config.php');

$tensp = $_POST['tensanpham'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$file = 'uploads/'.$hinhanh;
//$hinhanh = rand(1000,10000).'-'.$hinhanh;
$soluong = $_POST['soluong'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];

if(isset($_POST['themsanpham'])) {
    $sql_them = "INSERT INTO tb_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) 
    VALUE('".$tensp."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
    move_uploaded_file($hinhanh_tmp, $file);
    mysqli_query($mysqli,$sql_them); 
    header('Location:../../index.php?action=quanlysp&query=them');
} elseif(isset($_POST['suasanpham'])) {
    if($hinhanh!='') {
        move_uploaded_file($hinhanh_tmp, $file);
        $id=$_GET['idsanpham'];
        $sql = "SELECT * FROM tb_sanpham WHERE id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)) {
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_sua = "UPDATE tb_sanpham SET tensanpham='".$tensp."', masp ='".$masp."', giasp ='".$giasp."', soluong ='".$soluong."', 
        tomtat ='".$tomtat."', noidung ='".$noidung."', hinhanh ='".$hinhanh."', tinhtrang ='".$tinhtrang."', id_danhmuc ='".$danhmuc."' WHERE id_sanpham = '$_GET[idsanpham]'";
    } else {
        $sql_sua = "UPDATE tb_sanpham SET tensanpham='".$tensp."', masp ='".$masp."', giasp ='".$giasp."', soluong ='".$soluong."', 
        tomtat ='".$tomtat."', noidung ='".$noidung."', tinhtrang ='".$tinhtrang."', id_danhmuc ='".$danhmuc."' WHERE id_sanpham = '$_GET[idsanpham]'";
    }
    mysqli_query($mysqli,$sql_sua); 
    header('Location:../../index.php?action=quanlysp&query=them');
} else {
    $id=$_GET['idsanpham'];
    $sql = "SELECT * FROM tb_sanpham WHERE id_sanpham = '$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)) {
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tb_sanpham WHERE id_sanpham='".$id."'";
    mysqli_query($mysqli,$sql_xoa); 
    header('Location:../../index.php?action=quanlysp&query=them');
}
?>
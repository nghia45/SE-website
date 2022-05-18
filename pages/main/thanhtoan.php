<?php
    session_start();
    include("../../admincp/config/config.php");
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0,10000);
    $insert_cart = "INSERT INTO tb_thanhtoan(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."','1')";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query) {
        foreach($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $size = $value['size'];
            $insert_order_details = "INSERT INTO tb_order_details(id_sanpham,code_cart,soluongmua,size) VALUE('".$id_sanpham."','".$code_order."','".$soluong."','".$size."')";
            mysqli_query($mysqli, $insert_order_details);
        }
    }
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=camon');
?>

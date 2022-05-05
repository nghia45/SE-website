<?php
    session_start();
    include('../../admincp/config/config.php');
    if(isset($_SESSION['cart']) && isset($_GET['cong'])) {
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_iteam) {
            if($cart_iteam['id'] != $id) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
            } else {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong']+1,'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    if(isset($_SESSION['cart']) && isset($_GET['tru'])) {
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_iteam) {
            if($cart_iteam['id'] != $id) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
            } else {
                if($cart_iteam['soluong'] > 1) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong']-1,'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
                } else {

                }
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_iteam) {
            if($cart_iteam['id'] != $id) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1) {
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
    if(isset($_POST['themgiohang'])) {
       //session_destroy();
       $id = $_GET['idsanpham'];
       $soluong = 1;
       $sql = "SELECT * FROM tb_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
       $query = mysqli_query($mysqli,$sql);
       $row = mysqli_fetch_array($query);
       if($row) {
           $newpro = array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
           if(isset($_SESSION['cart'])) {
               $found = false;
               foreach($_SESSION['cart'] as $cart_iteam) {
                   if($cart_iteam['id']==$id) {
                       $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$soluong+1,'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
                       $found = true;
                   } else {
                       $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
                   }
               }
               if($found == false) {
                   $_SESSION['cart'] = array_merge($product,$newpro);
               } else {
                   $_SESSION['cart'] = $product;
               }
           } else {
               $_SESSION['cart'] = $newpro;
           }
       }
       header('Location:../../index.php?quanly=giohang');
    }
?>
<?php
    session_start();
    include('../../admincp/config/config.php');
    if(isset($_SESSION['cart']) && isset($_GET['cong']) && isset($_GET['size'])) {
        $id = $_GET['cong'];
        $size = $_GET['size'];
        foreach($_SESSION['cart'] as $cart_iteam) {
            if($cart_iteam['id'] != $id || $cart_iteam['size'] != $size) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp'],'size'=>$cart_iteam['size']);
            } else {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong']+1,'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp'], 'size'=>$cart_iteam['size']);
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    if(isset($_SESSION['cart']) && isset($_GET['tru']) && isset($_GET['size'])) {
        $id = $_GET['tru'];
        $size = $_GET['size'];
        foreach($_SESSION['cart'] as $cart_iteam) {
            if($cart_iteam['id'] != $id || $cart_iteam['size'] != $size) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp'],'size'=>$cart_iteam['size']);
            } else {
                if($cart_iteam['soluong'] > 1) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong']-1,'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp'],'size'=>$cart_iteam['size']);
                } else {

                }
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    if(isset($_SESSION['cart']) && isset($_GET['xoa']) && isset($_GET['size'])) {
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_iteam) {
            if($cart_iteam['id'] != $id || $cart_iteam['size'] != $size) {
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp'],'size'=>$cart_iteam['size']);
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
       $size = $_POST['size'];
       $soluong = 1;
       $sql = "SELECT * FROM tb_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
       $query = mysqli_query($mysqli,$sql);
       $row = mysqli_fetch_array($query);
       if($row) {
           $newpro = array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp'],'size'=>$size));
           if(isset($_SESSION['cart'])) {
               $found = false;
               foreach($_SESSION['cart'] as $cart_iteam) {
                   if($cart_iteam['id']==$id && $cart_iteam['size'] == $size) {
                       $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$soluong+1,'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp'],'size'=>$cart_iteam['size']);
                       $found = true;
                   } else {
                       $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp'],'size'=>$cart_iteam['size']);
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

<?php
 include('admincp/config/config.php');
if(isset($_SESSION['dangki'])) {
    
    if(isset($_SESSION['cart']) ) {
       
        foreach($_SESSION['cart'] as $cart_iteam) {
                $dangkii = $_SESSION['dangki'];
                $product[] = array('tensanpham'=>$cart_iteam['tensanpham'],'id'=>$cart_iteam['id'],'soluong'=>$cart_iteam['soluong'],'giasp'=>$cart_iteam['giasp'],'hinhanh'=>$cart_iteam['hinhanh'],'masp'=>$cart_iteam['masp']);
            
                $tenkhachhang = $dangkii[0];
                $sodienthoai = $dangkii[1];
                $diachi = $dangkii[2];
                $tensanpham = $cart_iteam['tensanpham'];
                $soluong = $cart_iteam['soluong'];
                $sql = mysqli_query($mysqli,"INSERT INTO tb_dathang(tenkhachhang,sodienthoai,diachi,sanpham,soluong) VALUE('".$tenkhachhang."','".$sodienthoai."','".$diachi."','".$tensanpham."','".$soluong."')");

            $_SESSION['cart'] = $product;
          
        
    }
}
    unset($_SESSION['cart']);
   ?>
   <h1>MUA HÀNG THÀNH CÔNG<h1>
  
<?php

}else {
   include("dangki.php");
   
}

?>
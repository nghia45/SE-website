<?php
    session_start();
    include("../../admincp/config/config.php");
    require("../../mail/sendmail.php");
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
        $tieude = "Đặt hàng thành công!";
		$noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : ".$code_order."</p>";
		$noidung.="<h4>Đơn hàng đặt bao gồm :</h4p>";

		foreach($_SESSION['cart'] as $key => $val){
			$noidung.= "<ul style='border:1px solid blue;margin:10px;'>
				<li>Tên sản phẩm: ".$val['tensanpham']."</li>
				<li>Mã sp: ".$val['masp']."</li>
                <li>Size: ".$val['size']."</li>
				<li>Giá: ".number_format($val['giasp'],0,',','.')."đ</li>
				<li>Số lượng: ".$val['soluong']."</li>
				</ul>";
		}
		$maildathang = $_SESSION['email'];
		$mail = new Mailer();
		$mail->dathang($tieude,$noidung,$maildathang);
    }
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=camon');
?>

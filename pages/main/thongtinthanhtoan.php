<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
  <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
  </div>
  
  <form action="pages/main/xulithanhtoan.php" method="POST">
	<div class="row">
  <?php
    $id_khachhang = $_SESSION['id_khachhang'];
    $sql_sua = "SELECT * FROM tb_dangki WHERE id_dangki = '".$id_khachhang."' LIMIT 1";
    $query_sua = mysqli_query($mysqli,$sql_sua);
    $row = mysqli_fetch_array($query_sua);
    $tenkhachhang = $row['tenkhachhang'];
    $dienthoai = $row['dienthoai'];
    $diachi = $row['diachi'];
   ?>
  	<div class="col-md-8">
  		<h4>Thông tin vận chuyển và giỏ hàng</h4>
  		<ul>
  			<li>Họ và tên vận chuyển : <b><?php echo $tenkhachhang ?></b></li>
  			<li>Số điện thoại : <b><?php echo $dienthoai ?></b></li>
  			<li>Địa chỉ : <b><?php echo $diachi ?></b></li>
  		</ul>
  		<h5>Giỏ hàng của bạn</h5>
  		<table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
		  <tr>
		    <th>Id</th>
		    <th>Mã sp</th>
		    <th>Tên sản phẩm</th>
		    <th>Hình ảnh</th>
		    <th>Số lượng</th>
		    <th>Giá sản phẩm</th>
		    <th>Thành tiền</th>
		 
		   
		  </tr>
		  <?php
		  if(isset($_SESSION['cart'])){
		  	$i = 0;
		  	$tongtien = 0;
		  	foreach($_SESSION['cart'] as $cart_item){
		  		$thanhtien = $cart_item['soluong']*$cart_item['giasp'];
		  		$tongtien+=$thanhtien;
		  		$i++;
		  ?>
		  <tr>
		    <td><?php echo $i; ?></td>
		    <td><?php echo $cart_item['masp']; ?></td>
		    <td><?php echo $cart_item['tensanpham']; ?></td>
		    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
		    <td>
		    	<?php echo $cart_item['soluong']; ?>

		    </td>
		    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
		    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
		   
		  </tr>
		  <?php
		  	}
		  ?>
		   <tr>
		    <td colspan="8">
		    	<p style="float: left;">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br/>
		    
		      <div style="clear: both;"></div>
		    
		      
		     


		    </td>

		   
		  </tr>
		  <?php	
		  }else{ 
		  ?>
		   <tr>
		    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
		   
		  </tr>
		  <?php
		  } 
		  ?>
		 
		</table>
  	
	
	
    </div>
  	<style type="text/css">
  		.col-md-4.hinhthucthanhtoan .form-check {
		    margin: 11px;
		}
  	</style>
    <form action="pages/main/xulithanhtoan.php" method="post">
  	<div class="col-md-4 hinhthucthanhtoan">
  		<h4>Phương thức thanh toán</h4>
  		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
		  <label class="form-check-label" for="exampleRadios1">
		    Thanh toán khi nhận hàng
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay">
		  <img src="img/vnpay.png" height="50" width="64">
		  <label class="form-check-label" for="exampleRadios4">
		    Vnpay
		  </label>
		</div>
    <div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="momo">
		  <img src="img/momo.png" height="50" width="64">
		  <label class="form-check-label" for="exampleRadios4">
		    Momo
		  </label>
		</div>
		<input type="submit" value="Thanh toán ngay" name="thanhtoan" class="btn btn-danger">
		</div>
    </form>
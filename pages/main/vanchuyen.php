<h3>Thông tin vận chuyển</h3>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=ttthanhtoan" >Thanh toán</a><span> </div>
  </div>
 <?php
    $id_khachhang = $_SESSION['id_khachhang'];
    $sql_sua = "SELECT * FROM tb_dangki WHERE id_dangki = '".$id_khachhang."' LIMIT 1";
    $query_sua = mysqli_query($mysqli,$sql_sua);
    $row = mysqli_fetch_array($query_sua);
    $tenkhachhang = $row['tenkhachhang'];
    $dienthoai = $row['dienthoai'];
    $diachi = $row['diachi'];
    if(isset($_POST['capnhatvanchuyen'])) {
    $tenkhachhang = $_POST['name'];
    $dienthoai = $_POST['phone'];
    $diachi = $_POST['address'];
    $sql = mysqli_query($mysqli,"UPDATE tb_dangki SET tenkhachhang='".$tenkhachhang."', diachi ='".$diachi."',dienthoai = '".$dienthoai."' WHERE id_dangki = '".$id_khachhang."'");
    }
?>
 	<div class="col-md-12">
	 <form action="" autocomplete="off" method="POST">
	  <div class="form-group">
	    <label for="email">Họ và tên : </label>
	    <input type="text" name="name" value="<?php echo $tenkhachhang ?>" class="form-control" placeholder="..." >
	  </div>
		<div class="form-group">
	    <label for="email">Phone     : </label>
	    <input type="text" name="phone" value="<?php echo $dienthoai ?>" class="form-control"  placeholder="...">
	  </div>
	  <div class="form-group">
	    <label for="email">Địa chỉ   : </label>
	    <input type="text" name="address" value="<?php echo $diachi ?>" class="form-control"  placeholder="...">
	  </div>
	  <button type="submit" name="capnhatvanchuyen" class="btn btn-primary">Cập nhật thông tin giao hàng</button>
	</form>
	</div>

	
	<table style="width: 100%; text-align: center;border-collapse: collapse;" border="1">
  <tr>
    <th>ID</th>
    <th>Mã sp</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Size</th>
    <th>Giá sp</th>
    <th>Thành tiền</th>
  </tr>
  <?php
   if(isset($_SESSION['cart'])) {
      $i = 0;
      $tongtien = 0;
      foreach($_SESSION['cart'] as $cart_iteam) {
         $i++;
         $thanhtien = $cart_iteam['soluong']*$cart_iteam['giasp'];
         $tongtien += $thanhtien;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_iteam['masp']; ?></td>
    <td><?php echo $cart_iteam['tensanpham']; ?></td>
    <td><img width="40%" src="admincp/modules/quanlysp/uploads/<?php echo $cart_iteam['hinhanh']; ?>"></td>
    <td>
       <?php echo $cart_iteam['soluong']; ?>
    </td>
    <td><?php echo $cart_iteam['size']; ?></td>
    <td><?php echo number_format($cart_iteam['giasp']).'đ'; ?></td>
    <td><?php echo number_format($thanhtien).'đ'; ?></td>
  </tr>
  <?php 
      }
  ?>
   <tr>
     <td colspan="8">
        <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien).'đ' ?></p>
        <div style="clear: both;"></div>
        <?php
        if(isset($_SESSION['dangki'])) {
        ?>
        <p><a href="index.php?quanly=ttthanhtoan">Thanh toán</a></p>
        <?php
        } else {
        ?>
        <p><a href="index.php?quanly=dangki">Đăng kí và đặt hàng</a></p>
        <?php
        }
        ?>
      </td>
  </tr>
  <?php
    } else {
  ?>
  <tr>
     <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
  </tr>
  <?php 
      }
   ?>
</table>
</div>
</div>

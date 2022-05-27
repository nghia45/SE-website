<h3>Giỏ hàng
   <?php
   if(isset($_SESSION['dangki'])) {
      echo 'của:  '.$_SESSION['dangki'];
   }
   ?>

</h3>
<!-- new -->
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step current"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=ttthanhtoan" >Thanh toán</a><span> </div>
  </div>
</div>
<?php
if(isset($_SESSION['cart'])) {
$i = 0;
$tongtien = 0;
foreach($_SESSION['cart'] as $cart_iteam) {
$i++;
$thanhtien = $cart_iteam['soluong']*$cart_iteam['giasp'];
$tongtien += $thanhtien;
?>
<h3 class="col-8">
Giỏ hàng
<?php
if(isset($_SESSION['dangki'])) {
echo 'của:  '.$_SESSION['dangki'];
}
?>
</h3>
<div class="row container-fluid">
  <div class="col-8">
    <header class="row col-s-12">
      <?php
      if(isset($_SESSION['cart'])) {
      }
      ?>
      <p>Tổng tiền: <?php echo number_format($tongtien).'đ' ?></p>
      <p>Các mặt hàng trong giỏ hàng của bạn không được bảo lưu — hãy kiểm tra ngay để đặt hàng.</p>
    </header>
    <main class="col-12 row border border-dark">
      <div class="col-3">
        <img class="img-fluid" src="admincp/modules/quanlysp/uploads/<?php echo $cart_iteam['hinhanh']; ?>">
      </div>
      <div class="col-6">
        <br>
        <div>Mã sản phẩm: <?php echo $cart_iteam['masp']; ?></div>
        <div><?php echo $cart_iteam['tensanpham']; ?></div>
        <div>Size: <?php echo $cart_iteam['size']; ?></div>
        <div>
          <a href="pages/main/themgiohang.php?cong=<?php echo $cart_iteam['id'] ?>&size=<?php echo $cart_iteam['size']; ?>">
            <i class="fa-solid fa-plus" style="color: black;"></i>
          </a>
          <?php echo $cart_iteam['soluong']; ?>
          <a href="pages/main/themgiohang.php?tru=<?php echo $cart_iteam['id'] ?>&size=<?php echo $cart_iteam['size']; ?>">
            <i class="fa-solid fa-minus" style="color: black;"></i>
          </a>
        </div>
      </div>
      <div class="col-2">
        <br><br>
        <?php echo number_format($cart_iteam['giasp']).'đ'; ?>
      </div>
      <div class="col-1">
        <br>
        <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_iteam['id'] ?>&size=<?php echo $cart_iteam['size']; ?>">
          <i class="fa-solid fa-trash-can"  style="color: black;"></i>
        </a>
      </div>
    </main>
  </div>
  <div class="row col-4 align-items-center align-content-center row justify-content-center">
    <?php
    if(isset($_SESSION['dangki'])) {
    ?>
    <button class="btn btn-primary col-auto row-cols-6"><a href="index.php?quanly=vanchuyen">Đặt hàng</a></button>
    <?php
    } else {
    ?>
    <button class="btn btn-primary col-auto row-cols-6"><a href="index.php?quanly=dangki">Đăng kí và đặt hàng</a></button>
    <?php
    }
    ?>
    <div class="flex-row">Tổng tiền: <?php echo number_format($tongtien).'đ' ?></div>
    <div class="flex-row"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></div>
  </div>
</div>
<?php
}
}
?>

<p>Giỏ hàng
   <?php
   
   if(isset($_SESSION['dangki'])) {
      $a = $_SESSION['dangki'] ;
      echo 'của '.$a[0];
      
   if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
         unset($_SESSION['dangki']);
        
     }
   ?>

    
   <?php  
   }
   ?>

<?php
    if(isset($_SESSION['cart'])) {

    }
?>

<table class = "table table-sm table-light" >
  <tr>
    <th class = "col-sm-1">ID</th>
    <th class = "col-sm-1 ">Mã sp</th>
    <th class = "col-sm-2 ">Tên sản phẩm</th>
    <th class = "col-sm-2 ">Hình ảnh</th>
    <th class = "col-sm-2 ">Số lượng</th>
    <th class = "col-sm-2 ">Giá sp</th>
    <th class = "col">Thành tiền</th>
    <th class = "col ">Quản lý</th>
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
       <h4>
       <a  class="btn btn-secondary" href="pages/main/themgiohang.php?cong=<?php echo $cart_iteam['id'] ?>">+</a>
       <?php echo $cart_iteam['soluong']; ?>
       <a class="btn btn-secondary" href="pages/main/themgiohang.php?tru=<?php echo $cart_iteam['id'] ?>">-</a>
      </h4>
      </td>
    <td><?php echo number_format($cart_iteam['giasp']).'vnd'; ?></td>
    <td><?php echo number_format($thanhtien).'vnd'; ?></td>
   <td><button><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_iteam['id'] ?>">Xóa</a></button></td>
  </tr>
  <?php 
      }
  ?>
   <tr>
     <td colspan="8">
        <h2 class = "badge badge-secondary" style="float: left;font-size: 30px;">Tổng tiền: <?php echo number_format($tongtien).'.000 vnd' ?></h2>
        <p style="float: right;"><button class = "btn btn-danger"><a href="pages/main/themgiohang.php?xoatatca=1" style = "color: black;">Xóa tất cả</a></button></p>
        <p style="float: center;"><button class = "btn btn-danger" style = "margin-left: 10px;"><a href="index.php?quanly=muahang" style = "color: black;">Mua hàng</a></button></p>
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
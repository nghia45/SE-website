<h3>Giỏ hàng
   <?php
   if(isset($_SESSION['dangki'])) {
      echo 'của:  '.$_SESSION['dangki'];
   }
   ?>

</h3>
<?php
    if(isset($_SESSION['cart'])) {

    }
?>

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
    <th>Quản lý</th>
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
       <a href="pages/main/themgiohang.php?cong=<?php echo $cart_iteam['id'] ?>&size=<?php echo $cart_iteam['size']; ?>">
         <i class="fa-solid fa-plus" style="color: black;"></i> 
      </a>
       <?php echo $cart_iteam['soluong']; ?>
       <a href="pages/main/themgiohang.php?tru=<?php echo $cart_iteam['id'] ?>&size=<?php echo $cart_iteam['size']; ?>">
         <i class="fa-solid fa-minus" style="color: black;"></i>
      </a>
    </td>
    <td><?php echo $cart_iteam['size']; ?></td>
    <td><?php echo number_format($cart_iteam['giasp']).'đ'; ?></td>
    <td><?php echo number_format($thanhtien).'đ'; ?></td>
    <td>
       <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_iteam['id'] ?>&size=<?php echo $cart_iteam['size']; ?>">
            <i class="fa-solid fa-trash-can"  style="color: black;"></i>
       </a>
    </td>
  </tr>
  <?php 
      }
  ?>
   <tr>
     <td colspan="8">
        <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien).'đ' ?></p>
        <p style="float: right;"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>
        <div style="clear: both;"></div>
        <?php
        if(isset($_SESSION['dangki'])) {
        ?>
        <p><a href="pages/main/thanhtoan.php">Đặt hàng</a></p>
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
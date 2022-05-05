<?php
$code = $_GET['code'];
$sql_lietke = "SELECT * FROM tb_order_details,tb_sanpham WHERE tb_order_details.id_sanpham = tb_sanpham.id_sanpham 
  AND tb_order_details.code_cart = '".$code."' ORDER BY tb_order_details.id_order_details DESC";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>
<p>Liệt kê đơn hàng</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>ĐƠn giá</th>
    <th>Thành tiền</th>
  </tr>
  <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke)){
      $i++;
      $tongtien += $row['giasp']*$row['soluongmua'];
  ?>
   <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['code_cart']?></td>
       <td><?php echo $row['tensanpham']?></td>
       <td><?php echo $row['soluongmua']?></td>
       <td><?php echo number_format($row['giasp']).'vnd'?></td>
       <td><?php echo number_format($row['giasp']*$row['soluongmua']).'vnd' ?></td>
   </tr>
   <?php
  }
   ?>
   <tr>
       <td colspan="6">
            <p>Tổng tiền : <?php echo number_format($tongtien).'vnd' ?></p>
       </td>
   </tr>

</table>
<?php
$sql_lietke = "SELECT * FROM tb_thanhtoan,tb_dangki WHERE tb_thanhtoan.id_khachhang = tb_dangki.id_dangki ORDER BY tb_thanhtoan.id_thanhtoan DESC";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>
<p>Liệt kê đơn hàng</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>SĐT</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke)){
      $i++;
  ?>
   <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['code_cart']?></td>
       <td><?php echo $row['tenkhachhang']?></td>
       <td><?php echo $row['diachi']?></td>
       <td><?php echo $row['email']?></td>
       <td><?php echo $row['dienthoai']?></td>
       <td>
           <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
       </td>
   </tr>
   <?php
  }
   ?>

</table>
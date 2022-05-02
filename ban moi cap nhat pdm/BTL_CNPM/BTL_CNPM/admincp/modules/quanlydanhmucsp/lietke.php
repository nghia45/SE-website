<?php
$sql_lietke = "SELECT * FROM tb_danhmuc ORDER BY thutu DESC";
$query_lietke = mysqli_query($mysqli,$sql_lietke);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table class = "table-sm" >
  <tr class="table-dark text-dark">
    <th>Id</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke)){
      $i++;
  ?>
   <tr>
       <td><?php echo $i ?></td>
       <td><?php echo $row['tendanhmuc']?></td>
       <td>
           <button type="button" class="btn btn-info" href="modules/quanlydanhmucsp/suly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>">Xóa</button> | <button type="button" class="btn btn-primary" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>">Sửa</button>
  </td>
   </tr>
   <?php
  }
   ?>
   

</table>
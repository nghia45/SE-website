<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$mysqli = new mysqli($servername, $username, $password,"aq");

    $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id DESC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<div>
<table>
      <form method = "POST" action = "sanpham/xulysanpham.php" enctype="multipart/form-data">
  <tr>
  <td>Tên sản phẩm</td>
    <td><input type="text" name = "tensanpham"></td>
  </tr>
  <tr>
    <td>Anh</td>
    <td><input type = 'file' name = 'anh'></td>
</tr>
  <tr>
  <td>Giá sản phẩm</td>
    <td><input type="double" name = "giasanpham"></td>
  </tr>
  <td>Số lượng</td>
    <td><input type="number" name = "soluong"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type = "text" name = "thutu"></td>
  </tr>
  <tr>
    <td>Danh mục sản phẩm</td>
    <td>
    <select name="danhmuc">
      <?php 
      while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
     ?>
    <option><?php echo $row_danhmuc['tendanhmuc'] ?></option>
    
    <?php 
      }
     ?>
</select>
  </td>
  </tr>
  <tr>
    <td><input type = "submit" name = "themsanpham" value ="Thêm" onclick=" alert('Thêm sản phẩm thành công')"></td>
  </tr>
</form>
</table>
    </div>
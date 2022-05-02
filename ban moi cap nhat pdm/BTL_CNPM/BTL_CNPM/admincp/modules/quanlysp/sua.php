<?php
$sql_sua = "SELECT * FROM tb_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
$query_sua = mysqli_query($mysqli,$sql_sua);
?>
<p>Sửa sản phẩm</p>
<table border="1" style="border-collapse: collapse;">
<?php
    while($dong = mysqli_fetch_array($query_sua)) {
?>
<form method="post" action="modules/quanlysp/suly.php?idsanpham=<?php echo $dong['id_sanpham']?>" enctype="multipart/form-data">
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" value="<?php echo $dong['tensanpham']?>" name="tensanpham"></td>
  </tr>
  <tr>
    <td>Mã sản phẩm</td>
    <td><input type="text" value="<?php echo $dong['masp']?>" name="masp"></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" value="<?php echo $dong['soluong']?>" name="soluong"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>Giá sản phẩm</td>
    <td><input type="text" value="<?php echo $dong['giasp']?>" name="giasp"></td>
  </tr>
  <tr>
    <td>Tóm tắt</td>
    <td><textarea rows="10" name="tomtat" style="resize: none"><?php echo $dong['tomtat']?></textarea></td>
  </tr> 
  <tr>
    <td>Nội dung</td>
    <td><textarea rows="10" name="noidung" style="resize: none"><?php echo $dong['noidung']?></textarea></td>
  </tr> 
  <tr>
    <td>Danh mục sản phẩm</td>
    <td>
    <select name="danhmuc">
      <?php 
      $sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
      $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
      while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
      ?>
      <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
      <?php 
      }
      ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td>
    <select name="tinhtrang">
      <option value="1">Kích hoạt</option>
      <option value="0">Ẩn</option>
    </select>
    </td>
  </tr>
  <tr>
      <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
  </tr>
</form>
<?php 
    }
?>
</table>
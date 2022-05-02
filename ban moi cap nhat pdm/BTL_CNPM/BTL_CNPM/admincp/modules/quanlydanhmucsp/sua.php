<?php
$sql_sua = "SELECT * FROM tb_danhmuc WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";
$query_sua = mysqli_query($mysqli,$sql_sua);
?>
<p>Sửa danh mục sản phẩm</p>
<table class = 'table'>
<form method="POST" action="modules/quanlydanhmucsp/suly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
    <?php
    while($dong = mysqli_fetch_array($query_sua)) {
    ?>

  <tr>
    <th>Điền danh mục sản phẩm</th>
  </tr>
  <tr>
    <td>Tên danh mục</td>
    <td><input type="text" value="<?php echo $dong['tendanhmuc']?>" name="tendanhmuc"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" value="<?php echo $dong['thutu']?>" name="thutu"></td>
  </tr>
  <tr>
      <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục"></td>
  </tr>
  <?php 
    }
  ?>
</form>
</table>
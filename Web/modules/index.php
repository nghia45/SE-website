<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p1>Quản lý danh mục sản phẩm<br></p1>
    <?php
    include("menu.php");
    include("main.php");
    ?>
    <table>
  
  <tr>
  <td>Tên danh mục</td>
    <td><input type="text" name = "Them danh muc sp"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type = "text" name = "Thứ tự danh mục"></td>
  </tr>
  <tr>
    <td><input type = "submit" value ="Thêm"></td>
  </tr>
</table>
</body>
</html>
<?php
    include("../admin/config.php");


$lietkesp = "SELECT * FROM sanpham ORDER BY id DESC";
$query = mysqli_query($mysqli, $lietkesp);
?>
<p>Liệt kê sản phẩm</p>

<table style = "width:100%" border = '1'>
    <tr>
        <th>Id</th>
        <th>Tên sản phâm</th>
        <th>Ảnh sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng</th>
        <th>Thứ tự</th>
        <th>Danh mục sản phẩm</th>

</tr>
<?php   
$i = 0;
    while($row = mysqli_fetch_array($query)) {
        $i++;
   
    ?>

 <tr>

 <td><?php echo $i ?></td>
 <td><?php echo $row['tensanpham'] ?></td>
 <td><?php echo $row['anhsanpham'] ?></td>
 <td><?php echo $row['giasanpham'] ?></td>
 <td><?php echo $row['soluong'] ?></td>
 <td><?php echo $row['thutu'] ?></td>
 <td><?php echo $row['danhmucsanpham'] ?></td>


</tr>
<?php
    }

    ?>
</table>
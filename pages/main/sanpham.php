<h1>Chi tiết sản phẩm</h1>
<?php 
   $sql_chitiet = "SELECT * FROM tb_sanpham,tb_danhmuc WHERE tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc AND tb_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
   $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
   while($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
<div class="product-container">
  <div class="hinhanhsp">
    <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" />
  </div>
  <form method="post" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
    <p class="pick">chọn size</p>
    <div class="sizes">
      <div class="size">5</div>
      <div class="size">6</div>
      <div class="size">7</div>
      <div class="size">8</div>
      <div class="size">9</div>
      <div class="size">10</div>
      <div class="size">11</div>
      <div class="size">12</div>
    </div>
    <div class="product">
      <p class = "loaisp"></p>
      <p class = "tensp"><?php echo $row_chitiet['tensanpham']?></p>
      <p class = "giasp"><?php echo number_format($row_chitiet['giasp']).'vnd'?></p>
      <p class="desc"></p>
      <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
    </div>
  </form>
</div>
<?php 
   }
?>
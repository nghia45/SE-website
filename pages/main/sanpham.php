
<?php 
   $sql_chitiet = "SELECT * FROM tb_sanpham,tb_danhmuc WHERE tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc AND tb_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
   $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
   while($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
<h3>Chi tiết sản phẩm</h3>
        <div class="product-container">
          <form method="post" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
          <div class="hinhanhsp">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" style="width: 472px; height: 472px" />
          </div>
          <div class="product">
            <p class = "loaisp"><?php echo $row_chitiet['tomtat']?></p>
            <p class = "tensp"><?php echo $row_chitiet['tensanpham']?></p>
            <p class = "giasp"><?php echo number_format($row_chitiet['giasp']).'đ'?></p>
            <p class="desc"></p>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm vào giỏ hàng"></p>
            <div class = "sizes">
              <p class="pick">chọn size</p>
              <select name="size">
                <option value = "38">38</option>
                <option value = "39">39</option>
                <option value = "40">40</option>
                <option value = "41">41</option>
                <option value = "42">42</option>
                <option value = "43">43</option>
                <option value = "44">44</option>
                <option value = "45">45</option>
              </select>
          </div>
          </form>
        </div>
<?php 
   }
?>
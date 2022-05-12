<?php 
   if(isset($_POST['timkiem'])) {
       $tukhoa = $_POST['tukhoa'];
   } else {
       $tukhoa = '';
   }
   $sql_pro = "SELECT * FROM tb_sanpham WHERE tensanpham LIKE '%".$tukhoa."%'";
   $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Sản phẩm ứng với từ khóa: <?php echo $tukhoa ?></h3>
                <ul class="product_list">
                <?php 
                    while($row_pro = mysqli_fetch_array($query_pro)) {
                ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>">
                        <p class="title_product"><?php echo $row_pro['tensanpham']?></p>
                        <p class="price_product"><?php echo number_format($row_pro['giasp']).'vnd'?></p>
                        </a>
                    </li>
                <?php
                    }
                ?>
                </ul>
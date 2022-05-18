<?php 
   if(isset($_GET['trang'])) {
       $page = $_GET['trang'];
   } else {
       $page = '1';  
    }
   if($page == '1') {
       $begin = 0;
   } else {
       $begin = ($page*3) - 3;
   }
   $sql_pro = "SELECT * FROM tb_sanpham,tb_danhmuc WHERE tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc ORDER BY tb_sanpham.id_sanpham DESC LIMIT $begin,3";
   $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Sản phẩm mới nhất</h3>
                <ul class="product_list">
                    <?php 
                        while($row_pro = mysqli_fetch_array($query_pro)) {
                    ?>
                        <li>
                            <div class="product_info">
                                <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>">
                                <P class="cat_product"><?php echo $row_pro['tomtat']?></p>
                                <p class="title_product"><?php echo $row_pro['tensanpham']?></p>
                                <p class="price_product"><?php echo number_format($row_pro['giasp']).'đ'?></p>
                                </a>
                            </div>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
                <p>Trang: </p>
                <?php
                  $sql_trang = mysqli_query($mysqli,"SELECT * FROM tb_sanpham");
                  $row_count = mysqli_num_rows($sql_trang);
                  $trang = ceil($row_count/3);
                ?>
                <ul class="list_trang">
                    <?php 
                       for($i=1;$i<=$trang;$i++) {
                    ?>
                    <li <?php if($i==$page) {echo 'style="background: brown;"';}; ?>><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
                    <?php
                       }
                    ?>
                </ul>
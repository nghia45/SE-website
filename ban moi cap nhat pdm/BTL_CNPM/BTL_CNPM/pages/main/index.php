<?php 
   $sql_pro = "SELECT * FROM tb_sanpham,tb_danhmuc WHERE tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc ORDER BY tb_sanpham.id_sanpham DESC LIMIT 4";
   $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Sản phẩm mới nhất</h3>
                
                <?php 
                    while($row_pro = mysqli_fetch_array($query_pro)) {
                ?>
                    <ul class = "cards">
                <div class="card" style = "width: 300px; height: 400px;">
  <div class="img-dimension">
   <img class="card-img-top" src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>"  class="img-fluid rounded thumbnail-image" width = "400px" height = "170px">
   <h6> <span class="badge badge-secondary">New</span></h6>
   
</div>
  <div class="card-body">
    <h1 class="card-title">Tên sản phẩm: <?php echo $row_pro['tensanpham']?></h1> 
    <h4 class = "card-price" style = "color: red"> <?php echo $row_pro['giasp'] ?>.000 đ</h4>       
    <div class="card-text">
            <p>
               Giới thiệu: <?php echo $row_pro['tomtat'] ?>
            </p> 
    </div>
    
 </div>
</div>
<div class="text-center ">
    <button class = "btn btn-danger btn-lg"><a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" style = "color: white;" >Buy</a></button>
    </div>
                    </ul> 
                <?php
                    }
                ?>
                
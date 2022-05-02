<?php 
   $sql_pro = "SELECT * FROM tb_sanpham WHERE tb_sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
   $query_pro = mysqli_query($mysqli, $sql_pro);
   $sql_cate = "SELECT * FROM tb_danhmuc WHERE tb_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
   $query_cate = mysqli_query($mysqli, $sql_cate);
   $row_title = mysqli_fetch_array($query_cate);
?>

<h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc']?></h3>
                
                <?php 
                    while($row_pro = mysqli_fetch_array($query_pro)) {
                ?>
           <ul class = "cards">
                <div class="card" style = "width: 300px; height: 400px;">
  <div class="img-dimension">
   <img class="card-img-top" src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>"  class="img-fluid rounded thumbnail-image" width = "400px" height = "130px">
   <h6> <span class="badge badge-secondary">New</span></h6>
   <i class="fas fa-heart" style = "float: right;font-size:24px; color: red; "></i>
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
    <button class = "btn btn-danger btn-lg" ><a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" style = "color: white;" >Buy</a></button>
    </div>
                    </ul> 
                       
                <?php
                    }
                ?>
               
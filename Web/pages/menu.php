<?php
    $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id DESC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<div class="menu">

  
    <li><a href ="index.php?quanli=lienhe">LIÊN HỆ</a></li>
    <?php
    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
    ?>
    <li><a href ="index.php?quanli=danhmucsp&id=<?php echo $row_danhmuc['id']?>&tendanhmuc=<?php echo $row_danhmuc['tendanhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
    <?php
    }
    ?>
    <div class = 'other'>
    <li><input placeholder="TÌm kiếm " type ='text' ><i class = 'fas fa-search'></i></li>
    <li><a class="fa fa-user"></a></li>
  </div>
  

  </div>
  </div>
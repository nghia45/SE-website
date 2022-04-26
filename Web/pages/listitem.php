<?php
$sql = "SELECT * FROM sanpham WHERE sanpham.danhmucsanpham ='$_GET[tendanhmuc]' ORDER BY sanpham.id DESC";
   $sql_b = "SELECT * FROM danhmucsp WHERE danhmucsp.id = '$_GET[id]' LIMIT 1";
   
   $que = mysqli_query($mysqli, $sql_b);
   
   $query = mysqli_query($mysqli, $sql);
   
   $row_title = mysqli_fetch_array($que);
?>
<h1>Tất cả sản phẩm <?php echo $row_title['tendanhmuc']?></h1>


    
<ul>
    <?php
    while($row = mysqli_fetch_array($query)) {
    ?>
    <li>
        <a href = "">
            
        <img src = "../admin/<?php echo $row['anhsanpham'] ?>" style = "width:500px" >
            
        <p>TÊN<?php echo $row['tensanpham'] ?></p>
        <p> GIÁ <?php echo $row['giasanpham'] ?></p>
    </a>
    </li>
    <?php
    }
    ?>

</ul>


<?php 
session_start();
      $sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
      $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
      if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['dangki']);
    }
?>

<div class="menu">
    <div class="list-unstyled components">
            <ul class="navbar navbar-expand-sm bg-light navbar-dark justify-content-center">
                <li class= "navbar-brand"><a class = "text-muted"  href="index.php"><i class="fa fa-home" aria-hidden="true" style = "font-size: 30px;"></i></a></li>
                <?php 
                   while($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                <li class="navbar-brand"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                <?php 
                } 
                ?>

                <a href="index.php?quanly=giohang"><i class="fa fa-shopping-cart" style="font-size:36px; margin-right : 10px; color:black"></i></a>
                <li class="navbar-brand"><a href="index.php?quanly=tintuc">Tin tức</a></li>
                <li class="navbar-brand"><a href="index.php?quanly=lienhe">Liên hệ</a></li>
                
               
                <form class="form-inline" action="index.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit"  style = "float: right;margin-left: 20px;">Search</button>

               
  
    <?php
                if(isset($_SESSION['dangki'])) {
                ?>
                 <button class = "btn btn-primary" style = 'float:right;margin-left: 200px;'><a href="index.php?dangxuat=1" style = "color: white;">Sign out</a></button>
                <?php
                } else {
                ?>
                 <button class = "btn btn-primary" style = 'float:right;margin-left: 200px;'><a href="index.php?quanly=dangki" style = "color: white;">Login</a></button>
                <?php
                }
                ?>
  </form>
            </ul>
            </div>
 </div>
<?php
   if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
      unset($_SESSION['dangnhap']);
      header('Location: login.php');
   }
?>
<nav class="navbar navbar-expand-lg navbar-light justify-content-between">
   <div class="container-fluid">
      <ul class="admincp_list navbar-nav me-auto mb-2 mb-lg-0">
         <li><a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
         <li><a class="nav-link" href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a></li>
         <li><a class="nav-link" href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a></li>
         <li><a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a></li>
         <li><a class="nav-link" href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])) {
            echo $_SESSION['dangnhap'];
         } ?></a></li>
      </ul>
   </div>
</nav>
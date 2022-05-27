<?php
$sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangki']);
}
?>

<nav class="menu navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./asserts/img/logo.png" alt="">
                </a>
            </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bi-caret-down-fill"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <?php
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                <?php
                }
                ?>
                <?php

                if (isset($_SESSION['dangki'])) {
                ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=user">Thông tin cá nhân</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?dangxuat=1">Đăng xuất</a></li>
                <?php
                } else {
                ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                <?php
                }
                ?>
            </ul>

            <form class="d-flex ms-auto" action="index.php?quanly=timkiem" method="post">
                <input class="form-control me-2" type="text" placeholder="Tìm kiếm" aria-label="Search" name="tukhoa">
                <button class="btn-search" type="submit" name="timkiem" value="Tìm kiếm">
                    <i class="fas fa-search" style="color:black;"></i>
                </button>
            </form>
            <?php
            if (isset($_SESSION['cart'])) {
                $i = 0;

                foreach ($_SESSION['cart'] as $cart_iteam) {
                    $i++;
                }

            ?>
                <li class="nav-item"><a class="nav-link" href="index.php?quanly=giohang"><i class="fa fa-shopping-cart" style="font-size:20px;color: black;"></i><span class="w3-badge w3-red" style="color: red;"><?php echo $i ?></span></a></li>
            <?php

            } else {
            ?>
                <li class="nav-item" style="list-style: none;"><a class="nav-link" href="index.php?quanly=giohang"><i class="fa fa-shopping-cart" style="font-size:20px;color: black;"></i></a></li>
            <?php
            }
            ?>
        </div>
    </div>
</nav>
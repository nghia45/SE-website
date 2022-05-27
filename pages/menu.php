<?php
$sql_danhmuc = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangki']);
    unset($_SESSION['cart']);
}
?>
<nav class="menu navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="./asserts/img/logo.png" alt="">
                </a>
            </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-caret-down"></i>
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
            </ul>
                <?php
                if(isset($_SESSION['dangki'])) {
                ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form class="d-flex ms-auto" action="index.php?quanly=timkiem" method="post">
                            <input class="form-control me-2" type="text" placeholder="Tìm kiếm" aria-label="Search" name="tukhoa" id="search">
                            <button class="btn-search"  type="submit" name="timkiem" value="Tìm kiếm">
                            <i class="fas fa-search" style="color:black;"></i>
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user" style="color:black;"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="index.php?quanly=user">Thông tin</a></li>
                                <li><a class="dropdown-item" href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></li>
                                <li><a class="dropdown-item" href="index.php?dangxuat=1">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <?php
                } else {
                ?>
            <form class="d-flex ms-auto" action="index.php?quanly=timkiem" method="post">
                <input class="form-control me-2" type="text" placeholder="Tìm kiếm" aria-label="Search" name="tukhoa" id="search">
                <button class="btn-search"  type="submit" name="timkiem" value="Tìm kiếm">
                <i class="fas fa-search" style="color:black;"></i>
                </button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangki">Đăng kí</a></li>
                <?php
                }
                ?>
                <li class="nav-item" style="list-style-type:none;">
                    <a class="nav-link" href="index.php?quanly=giohang">
                        <i class="fas fa-shopping-cart" style="color:black; width: 2rem; height: auto;"></i>
                        
                        <?php
                        if(isset($_SESSION['cart'])) {
                        $i = 0;
                        foreach($_SESSION['cart'] as $cart_item) {
                        $i++;
                        }
                        ?>
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger">
                            <?php echo $i; ?>
                        </span>
                        <?php
                        }
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

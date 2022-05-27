<h3>Đăng nhập</h3>
<form action="" method="post" class="form-dangnhap">
    <div class="row align-items-center mb-3">
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="dangnhap">Đăng nhập</button>
        </div>
        <div class="col-auto">
            <a class="nav-link" href="index.php?quanly=dangki">Đăng kí</a>
        </div>
        <?php
            if (isset($_POST['dangnhap'])) {
                $tk = $_POST['email'];
                $mk = ($_POST['password']);
                $sql = "SELECT * FROM tb_dangki WHERE email = '" . $tk . "' AND matkhau = '" . $mk . "' LIMIT 1";
                $row = mysqli_query($mysqli, $sql);
                $count = mysqli_num_rows($row);
                if ($count > 0 && $tk != NULL && $mk != NULL) {
                    $row_data = mysqli_fetch_array($row);
                    $_SESSION['dangki'] = $row_data['tenkhachhang'];
                    $_SESSION['email'] = $row_data['email'];
                    $_SESSION['id_khachhang'] = $row_data['id_dangki'];
                    header('Location:index.php?quanly=giohang');
                } else {
                    echo '<p style="color: red">Mật khẩu hoặc email sai, vui lòng nhập lại</p>';
                }
            }
            ?>
    </div>
</form>
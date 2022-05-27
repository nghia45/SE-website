<?php
session_start();
include('config/config.php');
if(isset($_POST['dangnhap'])) {
$tk = $_POST['username'];
$mk = md5($_POST['password']);
$sql = "SELECT * FROM tb_admin WHERE username = '".$tk."' AND password = '".$mk."' LIMIT 1";
$row = mysqli_query($mysqli,$sql);
$count = mysqli_num_rows($row);
if($count > 0) {
$_SESSION['dangnhap'] = $tk;
header('Location:index.php');
} else {
echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng đăng nhập lại")</script>';
header('Locaion:login.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng nhập Admincp</title>
        <link rel="stylesheet" type="text/css" href="../asserts/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../asserts/css/style.css">
        <style type="text/css">
        body {
        background: #f2f2f2;
        }
        </style>
    </head>
    <body>
        <form action="" method="post" class="form-dangnhap">
            <div class="row align-items-center mb-3">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="align-items-center mb-3">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" name="dangnhap" value="Đăng nhập">Đăng nhập</button>
                    <?php
                    if(isset($_POST['dangnhap'])) {
                    $tk = $_POST['email'];
                    $mk = md5($_POST['password']);
                    $sql = "SELECT * FROM tb_dangki WHERE email = '".$tk."' AND matkhau = '".$mk."' LIMIT 1";
                    $row = mysqli_query($mysqli,$sql);
                    $count = mysqli_num_rows($row);
                    if($count > 0) {
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
            </div>
        </form>
        <script src=".\asserts\js\bootstrap.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>
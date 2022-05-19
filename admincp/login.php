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
        <style type="text/css">
        body {
        background: #f2f2f2;
        }
        .form-dangnhap{
        width: 50%;
        padding: 20px;
        margin: auto;
        border: 1px solid;
        border-color: black;
        border-radius: 10px;
        }
        </style>
    </head>
    <body>
        <form action="" method="post" class="form-dangnhap">
            <p>Đăng nhập admin</p>
            <div class="row align-items-center mb-3">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="align-items-center mb-3">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" name="dangnhap" value="Đăng nhập">Đăng nhập</button>
                </div>
            </div>
        </form>
        <script src="..\asserts\js\bootstrap.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>
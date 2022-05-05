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
    <style type="text/css">
        body {
            background: #f2f2f2;
        }
        .wrapper-login {
            width: 15%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
      <div class="wrapper-login">
    <form action="" method="post" autocomplete="off">
      <table class="table-login" border="1" style="text-align: center;border-collapse: collapse;">
          <tr>
              <td colspan="2"><h3>Đăng nhập Admin</h3></td>
          </tr>
          <tr>
              <td>Tài khoản</td>
              <td><input type="text" name="username"></td>
          </tr>
          <tr>
              <td>Mật khẩu</td>
              <td><input type="password" name="password"></td>
          </tr>
          <tr>
              <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
          </tr>
      </table>
      </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      </body>
</html>

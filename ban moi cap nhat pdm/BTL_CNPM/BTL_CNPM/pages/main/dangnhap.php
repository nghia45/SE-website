
<?php
    if(isset($_POST['dangnhap'])) {
        $tk = $_POST['email'];
        $mk = ($_POST['password']);
        $sql = "SELECT * FROM tb_dangki WHERE email = '".$tk."' AND matkhau = '".$mk."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count > 0) {
            $row_data = mysqli_fetch_array($row);
            $tenkhachhang = $row_data['tenkhachhang'];
            $dienthoai = $row_data['dienthoai'];
            $diachi = $row_data['diachi'];
              $_SESSION['dangki'] =array($tenkhachhang, $dienthoai, $diachi);
            header('Location:index.php?quanly=giohang');
        } else {
            echo '<p style="color: red">Mật khẩu hoặc email sai, vui lòng nhập lại</p>';
        }
    }
?>
<form action="" method="post" autocomplete="off">
      <table class="table-login" border="1" style="text-align: center;border-collapse: collapse;">
          <tr>
              <td colspan="2"><h3>Đăng nhập</h3></td>
          </tr>
          <tr>
              <td>Tài khoản</td>
              <td><input type="text" name="email" placeholder="Email..."></td>
          </tr>
          <tr>
              <td>Mật khẩu</td>
              <td><input type="password" name="password" placeholder="Mật khẩu..."></td>
          </tr>
          <tr>
              <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
          </tr>
      </table>
      </form>
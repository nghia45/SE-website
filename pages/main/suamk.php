<?php
    if(isset($_POST['doimk'])) {
        $id_khachhang = $_SESSION['id_khachhang'];
        $mkcu = md5($_POST['mkcu']);
        $mkmoi = md5($_POST['mkmoi']);
        $sql = "SELECT matkhau FROM tb_dangki WHERE id_dangki = '".$id_khachhang."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        if($mkcu = $row) {
            $sql = mysqli_query($mysqli,"UPDATE tb_dangki SET matkhau = '".$mkmoi."' WHERE id_dangki = '".$id_khachhang."'");
            echo '<p style="color: green">Đổi mật khẩu thành công</p>';
        } else {
            echo '<p style="color: red">Mật khẩu sai, vui lòng nhập lại</p>';
        }
    }
?>
<form action="" method="post" autocomplete="off">
      <table class="table-login" border="1" style="text-align: center;border-collapse: collapse;">
          <tr>
              <td colspan="2"><h3>Đổi mật khẩu</h3></td>
          </tr>
          <tr>
              <td>Mật khẩu cũ</td>
              <td><input type="password" name="mkcu"></td>
          </tr>
          <tr>
              <td>Mật khẩu mới</td>
              <td><input type="password" name="mkmoi"></td>
          </tr>
          <tr>
              <td colspan="2"><input type="submit" name="doimk" value="Xác nhận"></td>
          </tr>
      </table>
      </form>
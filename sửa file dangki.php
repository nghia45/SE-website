
<?php
  
   if(isset($_POST['dangki'])) {
       $tenkhachhang = $_POST['hovaten'];
       $email = $_POST['email'];
       $dienthoai = $_POST['dienthoai'];
       $diachi = $_POST['diachi'];
       $matkhau = ($_POST['matkhau']);
       if ( $tenkhachhang != NULL &&  $email != NULL &&  $email != NULL &&  $dienthoai != NULL && $matkhau != NUll ) {
       $sql = mysqli_query($mysqli,"INSERT INTO tb_dangki(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
       if($sql) {
           echo '<p style="color:green">Đăng kí thành công</p>';
           $_SESSION['dangki'] = array($tenkhachhang,$dienthoai,$diachi);
           
       }
    } else {
        echo'<p style = "color:red">Thiếu thông tin đăng kí</p>';
    }
    }
?>

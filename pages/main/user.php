<?php
$id_khachhang = $_SESSION['id_khachhang'];
if(isset($_POST['suathongtin'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $sql = mysqli_query($mysqli,"UPDATE tb_dangki SET tenkhachhang='".$tenkhachhang."', email='".$email."', diachi ='".$diachi."',dienthoai = '".$dienthoai."' WHERE id_dangki = '".$id_khachhang."'");
    if($sql) {
        echo '<p style="color:green">Sửa thông tin thành công</p>';
        $_SESSION['dangki'] = $tenkhachhang;
    }
 }

$sql_sua = "SELECT * FROM tb_dangki WHERE id_dangki = '".$id_khachhang."' LIMIT 1";
$query_sua = mysqli_query($mysqli,$sql_sua);
?>
<p>Cập nhật thông tin khách hàng</p>
<form action="" method="post">

<table class="suathongtin" border="1" style="border-collapse: collapse;">
    <?php 
        while($dong = mysqli_fetch_array($query_sua)) {
    ?>
    <tr>
        <td>Họ và tên</td>
        <td><input type="text" size="50" value="<?php echo $dong['tenkhachhang'] ?>" name="hovaten"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" size="50" value="<?php echo $dong['email']?>" name="email"></td>
    </tr>
    <tr>
        <td>Điện thoại</td>
        <td><input type="text" size="50" value="<?php echo $dong['dienthoai'] ?>" name="dienthoai"></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" size="50" value="<?php echo $dong['diachi'] ?>" name="diachi"></td>
    </tr>
    <tr>
        <td ><input type="submit"  name="suathongtin" value="Xác nhận"></td>
        <td><a href="index.php?quanly=suamk">Thay đổi mật khẩu</a></td>
    </tr>
    <?php
        }
    ?>
</table>
</form>
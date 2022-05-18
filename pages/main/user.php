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

<form action="" method="post" class="suathongtin">
    <p>Cập nhật thông tin khách hàng</p>
    <?php
        while($dong = mysqli_fetch_array($query_sua)) {
    ?>
    <div class="row g-5 align-items-center mb-3">
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
            <input type="text" size="50" nvalue="<?php echo $dong['tenkhachhang'] ?>" name="hovaten" class="form-control">
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
            <input type="text" size="50" value="<?php echo $dong['dienthoai'] ?>" name="dienthoai" class="form-control">
        </div>
    </div>
    <div class="row g-5 align-items-center mb-3">
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="text" size="50" value="<?php echo $dong['email']?>" name="email" class="form-control">
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
            <input type="text" size="50" value="<?php echo $dong['diachi'] ?>" name="diachi" class="form-control">
        </div>
    </div>
    <div class="row g-4 align-items-center mb-3">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="suathongtin" value="Xác nhận">Xác nhận</button>
        </div>
        <div class="col-auto">
            <a href="index.php?quanly=suamk" style="text-decoration: none;">Thay đổi mật khẩu</a>
        </div>
    </div>
</form>



<!-- <tr>
    <td ><input type="submit"  name="suathongtin" value="Xác nhận"></td>
    <td><a href="index.php?quanly=suamk">Thay đổi mật khẩu</a></td>
</tr>
<?php
}
?>
-->
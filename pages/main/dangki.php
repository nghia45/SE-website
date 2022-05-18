<?php
if(isset($_POST['dangki'])) {
$tenkhachhang = $_POST['hovaten'];
$email = $_POST['email'];
$dienthoai = $_POST['dienthoai'];
$diachi = $_POST['diachi'];
$matkhau = md5($_POST['matkhau']);
$sql = mysqli_query($mysqli,"INSERT INTO tb_dangki(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
if($sql) {
echo '<p style="color:green">Đăng kí thành công</p>';
$_SESSION['dangki'] = $tenkhachhang;
$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
header('Location:index.php?quanly=giohang');
}
}
?>

<form action="" method="post" class="form-dangky">
    <p>Đăng kí thành viên</p>
    <div class="row g-5 align-items-center mb-3">
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
            <input type="text" size="50" name="hovaten" class="form-control">
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
            <input type="text" size="50" name="dienthoai" class="form-control">
        </div>
    </div>
    <div class="row g-5 align-items-center mb-3">
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="text" size="50" name="email" class="form-control">
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label" autocomplete="off">Mật khẩu</label>
            <input type="text" size="50" name="matkhau" class="form-control">
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input type="text" size="50" name="diachi" class="form-control">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Tôi đồng ý với các điều khoản</label>
    </div>
    <div class="row g-4 align-items-center mb-3">
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" name="dangki">Đăng ký</button>
        </div>
        <div class="col-auto">
            <a href="index.php?quanly=dangnhap" style="text-decoration: none;">Đăng nhập nếu có tài khoản</a>
        </div>
    </div>

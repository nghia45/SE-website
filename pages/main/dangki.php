<?php
$trueemail = true;
$truename = true;
$truenumber = true;
$truepassword = true;
$trueaddress = true;
$checkprinciple = true;


$principleErr = $numberErr = $emailErr = $nameErr = $passwordErr = $addressErr = "";
if (isset($_POST['dangki'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = ($_POST['matkhau']);

    //checkvalidemail
    if (empty($_POST["email"])) {
        $trueemail = false;
        $emailErr = "Email is required";
    } else {
        $trueemail = true;
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $trueemail = false;
        }
    }

    //checkvalidname
    if (empty($_POST["hovaten"])) {
        $nameErr = "Name is required";
        $truename = false;
    } else {
        $truename = true;
        $name = test_input($_POST["hovaten"]);
        // check if name only contains letters and whitespace
        if (!preg_match('/^[\p{L} ]+$/u', $name)) {
            $truename = false;
            $nameErr = "Only letters and white space allowed";
        }
    }

    //checkvalidaddress
    if (empty($_POST["diachi"])) {
        $addressErr = "Address is required";
        $trueaddress = false;
    } else {
        $trueaddress = true;
    }

    if (empty($_POST["matkhau"])) {
        $passwordErr = "Password is required";
        $truepassword = false;
    } else {
        $truepassword = true;
    }

    //checkValidNumber
    if (empty($_POST["dienthoai"])) {
        $numberErr = "phone number is required";
        $truenumber = false;
    } else {
        $truenumber = true;
        $phonenumber = test_input($_POST["dienthoai"]);

        if (!is_numeric($phonenumber)) {
            $truenumber = false;
            $numberErr = "Must contain only numbers";
        }
    }

    //checkprinciple

    if (empty($_POST["check"])) {
        $checkprinciple = false;
        $principleErr = "Must accept !";
    } else {
        $checkprinciple = true;
    }



    if ($checkprinciple && $trueemail == true && $truename == true && $trueaddress && $truenumber && $truepassword) {
        $sql = mysqli_query($mysqli, "SELECT * FROM tb_dangki where email = '" . $email . "'");
        $count = 0;
        $count = mysqli_num_rows($sql);
        $a = $count;
        if ($a == 0) {
            $sql2 = mysqli_query($mysqli, "INSERT INTO tb_dangki(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('" . $tenkhachhang . "','" . $email . "','" . $diachi . "','" . $matkhau . "','" . $dienthoai . "')");
            if ($sql2) {
                echo '<p style="color:green">Đăng kí thành công</p>';
               
            } else {
                echo '<p style="color:green">Failed</p>';
            }
        } else if ($a > 0) {
            echo '<p style="color:green">The email is already in use.Please choose an other one</p>';
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form action="" method="post" class="form-dangky">
    <p>Đăng kí thành viên</p>
    <div class="row g-5 align-items-center mb-3">
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
            <input type="text" size="50" name="hovaten" class="form-control">
            <span class="error" style="color: red;"><?php echo $nameErr; ?></span>
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
            <input type="text" size="50" name="dienthoai" class="form-control">
            <span class="error" style="color: red;"><?php echo $numberErr; ?></span>
        </div>
    </div>
    <div class="row g-5 align-items-center mb-3">
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="text" size="50" name="email" class="form-control">
            <span class="error" style="color: red;"><?php echo $emailErr; ?></span>
        </div>
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
            <input type="text" size="50" name="matkhau" class="form-control">
            <span class="error" style="color: red;"><?php echo $passwordErr; ?></span>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input type="text" size="50" name="diachi" class="form-control">
        <span class="error" style="color: red;"><?php echo $addressErr; ?></span>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="check">
        <label class="form-check-label">Tôi đồng ý với các điều khoản</label>
        <span class="error" style="color: red;">*<?php echo $principleErr; ?></span>
    </div>
    <div class="row g-4 align-items-center mb-3">
        <div class="col-auto">
            <button type="submit" name="dangki" class="btn btn-primary">Đăng ký</button>
        </div>
        <div class="col-auto">
            <a href="index.php?quanly=dangnhap" style="text-decoration: none;">Đăng nhập nếu có tài khoản</a>
        </div>
    </div>
</form>

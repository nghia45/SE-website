<h3>THAY ĐỔI MẬT KHẨU</h3>
        <form action="" method="post" class="form-dangnhap" autocomplete="off">
            <div class="row align-items-center mb-3">
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ</label>
                    <input type="password" name="mkcu" class="form-control">
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Mật khẩu mới</label>
                    <input type="password" name="mkmoi" class="form-control">
                </div>
                <?php
                        if(isset($_POST['doimk'])) {
                            $id_khachhang = $_SESSION['id_khachhang'];
                            $mkcu = md5($_POST['mkcu']);
                            $mkmoi = md5($_POST['mkmoi']);
                            $sql = "SELECT matkhau FROM tb_dangki WHERE id_dangki = '".$id_khachhang."' LIMIT 1";
                            $row = mysqli_query($mysqli,$sql);
                            if($mkcu == $row) {
                                $sql = mysqli_query($mysqli,"UPDATE tb_dangki SET matkhau = '".$mkmoi."' WHERE id_dangki = '".$id_khachhang."'");
                                echo '<p style="color: green">Đổi mật khẩu thành công</p>';
                            } else {
                                echo '<p style="color: red">Mật khẩu sai, vui lòng nhập lại</p>';
                            }
                        }
                ?>
            </div>
            <div class="align-items-center mb-3">
                <div class="col-auto">
                    <input type="submit" name="doimk" value="Xác nhận"></input>
                </div>
            </div>
        </form>
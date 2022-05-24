<?php
    include('../../config/config.php');
    if(isset($_GET['code'])) {
      $code = $_GET['code'];
      $query = mysqli_query($mysqli,"UPDATE tb_thanhtoan SET cart_status = 0 WHERE code_cart = '".$code."' ");
      header('Location:../../index.php?action=quanlydonhang&query=lietke');
    }
?>
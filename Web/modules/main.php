<div class = "main">
   <div class = "maincontent">
       <?php
       if(isset($_GET['action'])) {
           $t = $_GET['action'];
       } else {
           $t = '';
       }
       if($t == 'danhmucsanpham') {
           include("header.php");
       }else if ($t == 'lienhe') {
           include("giohang.php");
           include("sidebar.php");
       }
       ?>
   </div>
    </div>
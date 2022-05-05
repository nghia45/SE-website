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
           include("themdmsp/them.php");
           
       }else if ($t == 'sanpham') {
           include("sanpham/themsanpham.php");
           include("sanpham/lietkesanpham.php");
       }
       ?>
   </div>
    </div>
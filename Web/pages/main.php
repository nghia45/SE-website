<div class = "main">
   <div class = "maincontent">
       <?php
       if(isset($_GET['quanli'])) {
           $t = $_GET['quanli'];
       } else {
           $t = '';
       }
       if($t == 'danhmucsp') {
           include("listitem.php");
       }else if ($t == 'lienhe') {
           include("giohang.php");
           include("sidebar.php");
       }
       ?>
   </div>
    </div>
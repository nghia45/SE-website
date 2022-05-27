<?php
session_start();
if(!isset($_SESSION['dangnhap'])) {
header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../asserts/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../asserts/css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Admincp</title>
    </head>
    <body>
        <h3 class="title_admincp">Welcome to AdminCP</h3>
        <div class="container-fluid">
            <?php
            include("config/config.php");
            include("modules/header.php");
            include("modules/menu.php");
            include("modules/main.php");
            include("modules/footer.php");
            ?>
        </div>
        <script src=".\asserts\js\bootstrap.js"></script>
    </body>
</html>
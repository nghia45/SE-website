<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web bán giày</title>
        <link rel="stylesheet" type="text/css" href="./asserts/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="./asserts/css/style.css">
        <link rel="stylesheet" type="text/css" href="./asserts/css/sanpham.css">
        <link rel="stylesheet" type="text/css" href="./asserts/css/danhsachsp.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://fontawesome.com/css/font-awesome.min.css">
    </head>
    <body>
        <div class="wrapper">
            <?php 
                session_start();
                include("admincp/config/config.php");
                include("pages/header.php");
                include("pages/main.php");
                include("pages/footer.php");
            ?>
        </div>
        <script src=".\asserts\js\bootstrap.js"></script>
    </body>
</html>
 
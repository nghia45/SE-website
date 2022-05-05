<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    
    <STYLE>A {text-decoration: none;} </STYLE>

    <title>Document</title>
</head>
<body>
    <div class = "wrap">
    <?php
    include("../admin/config.php");
     include("header.php");
     include("other.php");
     include("menu.php");
     include("main.php")
    ?>
    </div>
    
    <style>
        h1 {
   font-size: 20px;
}
p1 {
   font-size: 40px;
}
.right-item {
   font-family: Verdana, sans-serif;
   display: inline-block;
   border-color: rgb(208, 30, 30);
}
.logo {
   flex: 1;
}
li {
   list-style: none;
}
header {
   display: flex;
   justify-content:space-between ;
   padding: 0 50px;
   height: 70px;
}
.menu {
   display: flex;
   flex: 3;
   font-family:'Segoe UI';
   position: relative;
   font-size: 20px;
  
}
.menu >li:hover .sub-menu {
   display: block;
}
.sub-menu {
   position: relative;
   width: 150px;
   display: none;
}
.menu >li {
   padding: 0 14px;
}
.other {
   flex: 1;
   display: flex;
}
.other >li {
   padding: 0 14px;
}
.sidebar {
   height: 500px;
   width: 200px;
   border: 5px coral;
   float:left;
   margin-top: 5px;
   margin-left: 5px;
   background-color: rgb(236, 233, 240);
}
ul.list_sidebar {
   list-style: none;
   background-color: rgb(213, 213, 249);
   text-decoration: none;
}
    </style>
</body>
</html>
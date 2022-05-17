<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./logo-icon.png"/>
    <link rel="stylesheet" href="./Sass/Css/grid.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./Sass/Css/base.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="./Sass/Css/main.css?v=<?php echo time() ?>">;
    <title>DECATHLON</title>
</head>
<body>
  <?php 
           session_start();
           if(isset($_GET['dangxuat'])){
               unset($_SESSION['dangnhap']);
               unset($_SESSION['matk']);
               unset($_SESSION['cart']);
           }

           if(isset($_POST['admin'])){
               unset($_SESSION['admin']);
           }
   ?>

   <?php
     @include('Connect.php');
     @include('header.php');
     @include('HeroSlides.php');
     @include('Services.php');
     @include('Bestseller.php');
     @include('ProductList.php');
     @include('LocationStore.php');
     @include('Discovery.php');
     @include('footer.php');
   
   ?>

  
    
</body>
</html>
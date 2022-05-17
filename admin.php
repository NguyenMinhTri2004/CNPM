<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./admin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" type="image/x-icon" href="./logo-icon.png"/>
    <title>DECATHLON</title>
</head>
<body>
    <?php 
      session_start();
      if(!isset($_SESSION["admin"])){
              echo '<script type="text/javascript">
              location.href = "login.php"
             </script>';
              
        
  
    }
      
    ?>
    <div id="wrap">
        <!-- header -->
        <div id="menu-left">
            <div id="logo" class="active">
                <p>DE</p>
            </div>
            <img id="header-img" class="header-img" src="https://cdncontent.decathlon.vn/_next/static/images/logo-93d12d8cff484ab736d2a39f15bf66d8.svg" alt="Decathlon">
            <?php
                include 'menu-list.php';
            ?>
            <div id="mini-menu">
                <ul>
                    <li><a href="./admin.php?id=CV05&stcType=1">5 sản phẩm bán nhiều nhất</a></li>
                    <li><a href="./admin.php?id=CV05&stcType=2">5 sản phẩm được xem nhiều nhất</a></li>
                    <li><a href="./admin.php?id=CV05&stcType=3">% sản phẩm theo nhà sản xuất</a></li>
                    <li><a href="./admin.php?id=CV05&stcType=4">Doanh thu</a></li>
                </ul>
            </div>
        </div>
        <!-- content  -->
        <div style="position: relative;" id="content">
            <div id="content-btn">
                <div id="header">
                    <i id="menu-icon" class='header-menu-icon bx bx-menu-alt-left'></i>     
                    <form action="index.php" method="post">
                         <input hidden type="text" value="admin" name="admin">
                         <button type="submit" id="log-out-icon"><i class='header-menu-icon bx bx-log-out'></i></button>
                    </form>
                </div>
                <!-- menu left -->
                <!-- main content  -->
                <div id="search_add">
                        <?php
                            $id;
                            if(isset($_GET['id'])) {
                                if($_GET['id'] != "CV05") {
                                    $id = $_GET["id"];
                                    echo '<a href="?show=form&id='.$id.'&action=add"><button id="add-btn">Thêm mới</button></a>';
                                    include 'search.php';
                                }
                            }
                            else {
                                $id = "CV01";
                                echo '<a href="?show=form&id='.$id.'&action=add"><button id="add-btn">Thêm mới</button></a>';
                                include 'search.php';
                            }
                        ?>
                    </div>
                <div id="main-content">
                    <?php
                        if(isset($_GET['id']) && strcmp($_GET['id'],"CV05") == 0) {
                            include 'statistic.php';
                        }
                        include 'content.php';
                    ?>
                    <div id="stcContainer"></div>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="./admin.js"></script>
</html>
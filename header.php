<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/base.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./Sass/Css/reset.css?v= <?php echo time(); ?>">   
    <link rel="stylesheet" href="./Sass/Css/base.css?v= <?php echo time(); ?>">   
    <link rel="stylesheet" href="./Sass/Css/main.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/reponsive.css?v= <?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php 
        $input = "";
        session_start();
        include("Connect.php");
        if(isset($_SESSION['dangnhap'])){
            $taikhoan = $_SESSION['dangnhap'];
            $matk = $_SESSION['matk'];
          }

          
          if(isset($_GET['input'])){
             $input = $_GET['input'];
          }


    ?>

    <header>
        <div class="header">
            <div class="header__logo">
                <div class="header__logo__nav">
                    <div class="header__logo__nav__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <span class="header__logo__nav__title">DANH MỤC</br>SẢN PHẨM</span>
                </div>
                <div class="header__logo__img">
                    <a href="index.php" class="header__logo__img__link">
                        <img src="https://cdncontent.decathlon.vn/_next/static/images/logo-93d12d8cff484ab736d2a39f15bf66d8.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="header__search">
                <div class="header__search__icon">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMy4wODciIGhlaWdodD0iMjIuNzgxIiB2aWV3Qm94PSIwIDAgMjMuMDg3IDIyLjc4MSI+PGRlZnM+PHN0eWxlPi5he2ZpbGw6IzQyNDQ1MztzdHJva2U6IzQyNDQ1Mzt9PC9zdHlsZT48L2RlZnM+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC41IDAuNTAxKSI+PHBhdGggY2xhc3M9ImEiIGQ9Ik0yMS42MzYsMjAuMjQ3LDE0LjY5MywxMy4zYTguMzI3LDguMzI3LDAsMSwwLTEuMDM3LDEuMDk0TDIwLjU2OSwyMS4zYS43NTQuNzU0LDAsMSwwLDEuMDY3LTEuMDU2Wk0zLjM4NiwxMi45NjhhNi43ODksNi43ODksMCwxLDEsNC44LDIsNi43ODksNi43ODksMCwwLDEtNC44LTJaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjE3MSAwLjE5MSkiLz48L2c+PC9zdmc+" alt="">
                </div>
                <div class="header__search__input">
                        <form class="form-input" action="SearchProduct.php" method="get">

                            <input class="header__search__input__content" value="<?php echo $input?>" type="text" name = "input" placeholder="Tìm kiếm sản phẩm...">
                        </form>
      
                </div>
            </div>
            <div class="header__search__overlay"></div>
            <div class="header__users">
                <?php 
                            if(isset($_SESSION['dangnhap'])){

                                    echo '<a href="user.php" class="header__users--select header__users__acc">
                                            <div><img src="./img/user_logo.svg" alt=""></div>
                                            <span>Tài Khoản</span>
                                        </a>';
                            }else {
                                    echo '<a href="login.php" class="header__users--select header__users__acc">
                                    <div><img src="./img/user_logo.svg" alt=""></div>
                                    <span>Đăng Nhập</span>
                                    </a>';
                                }  
                ?>
                <!-- <a href="" class="header__users--select call">
                    <div><img src="./img/lienhe__logo.svg" alt=""></div>
                    <span>Liên hệ</span>
                </a> -->
                <a href="Cart.php" class="header__users--select">
                    <div style="position: relative"  >
                        <img src="./img/cart_logo.svg" alt="">
                        <span style="position: absolute ; top : -20px ; right : -25px ; padding : 5px 8px ; border-radius : 50% ; background-color : yellow "  ><?php 
                            if(isset($_SESSION['cart'])){
                                echo sizeof($_SESSION['cart']);
                            }else {
                                echo 0;
                            }
                        ?></span>
                    </div>
                    <span>Giỏ hàng</span>
                </a>
                <!-- <ul class="header__users__list">
                    <li class="header__users__item">
                        <a class="header__users__link">
                            <div>
                                <img src="./img/user_logo.svg" alt="">
                            </div>
                            <span>Thông tin</span>
                        </a>
                    </li>
                    <li class="header__users__item">
                        <a href="" class="header__users__link">
                            <div>
                                <img src="./img/cart_logo.svg" alt="">
                            </div>
                            <span>Đơn hàng</span>
                        </a>
                    </li>
                    <li class="header__users__item">
                        <a href="" class="header__users__link">
                            <div>
                                <img src="./img/thu.svg" alt="">
                            </div>
                            <span>Địa chỉ</span>
                        </a>
                    </li>
                    <li class="header__users__item">
                        <a href="" class="header__users__link">
                            <div>
                                <img src="./img/signUp.svg" alt="">
                            </div>
                            <span>Đăng xuất</span>
                        </a>
                    </li>
                </ul> -->
            </div>
        </div>
    </header>
    <!-- <div class="nav">
        <div class="nav__bgr">
        </div>
        <div class="nav__container">
            <div class="nav__container__left">
                <div class="nav__container__left__header">
                    <ul class="nav__container__header__list">
                        <li class="nav__container__header__item active">Môn thể thao <div></div></li>
                        <li class="nav__container__header__item">nam <div></div></li>
                        <li class="nav__container__header__item">nữ <div></div></li>
                        <li class="nav__container__header__item">trẻ em <div></div></li>
                        <li class="nav__container__header__item">phụ kiện <div></div></li>
                    </ul>
                </div>
                <div class="nav__container__left__content">
                    <div class="nav__container__content__pane">
                        <div class="nav__container__content__body active">
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav__container__content__body">
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav__container__content__body">
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav__container__content__body">
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav__container__content__body">
                            <div class="nav__container__body__col">
                                <h4>Thể Thao Dưới Nước</h4>
                                <ul class="nav__container__col__list">
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                    <li class="nav__container__col__item">
                                        <a href="" class="nav__container__col__link">
                                            Bơi lội
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav__container__right">
                <a href="" class="nav__container__header__img">
                    <img src="https://contents.mediadecathlon.com/s903791/k$f922fc8eb092a1b750dcee971f2d6904/hiking%20menu%20web.jpg&format=auto" alt="">
                    <div class="nav__container__header__img__cart">
                        <h5>Hiking Trekking</h5>
                        <p>khám phá ngay</p>
                    </div>
                </a>
                <div class="nav__container__right__container">
                    <a href="" class="nav__container__right__container__link">
                        Bán Chạy Nhất
                        <div class="nav__container__right__container__icon">
                            <img src="./img/btn-nexxt.svg" alt="">
                        </div>
                    </a>
                    <a href="" class="nav__container__right__container__link">
                        BST Thiết Kế Sinh Thái
                        <div class="nav__container__right__container__icon">
                            <img src="./img/btn-nexxt.svg" alt="">
                        </div>
                    </a>
                    <a href="" class="nav__container__right__container__link">
                        BST Sản Xuất Tại Việt Nam
                        <div class="nav__container__right__container__icon">
                            <img src="./img/btn-nexxt.svg" alt="">
                        </div>
                    </a>
                    <a href="" class="nav__container__right__container__link">
                        Khách Hàng Doanh Nghiệp
                        <div class="nav__container__right__container__icon">
                            <img src="./img/btn-nexxt.svg" alt="">
                        </div>
                    </a>
                    <a href="" class="nav__container__right__container__link">
                        Danh Sách Cửa Hàng
                        <div class="nav__container__right__container__icon">
                            <img src="./img/btn-nexxt.svg" alt="">
                        </div>
                    </a>
                    <a href="" class="nav__container__right__container__link">
                        Liên Hệ
                        <div class="nav__container__right__container__icon">
                            <img src="./img/btn-nexxt.svg" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
</body>
<script src="./header.js"></script>

    <script>
           
           $(".header__search__input__content").keyup(function(e){

               if (e.key === "Enter") {
                 console.log("Enter key pressed!!!!!");
                  }
              });

             
           
    </script>

   
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>   
    <link rel="stylesheet" href="./Sass/Css/reset.css?v= <?php echo time(); ?>">   
    <link rel="stylesheet" href="./Sass/Css/base.css?v= <?php echo time(); ?>">   
    <link rel="stylesheet" href="./Sass/Css/main.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/reponsive.css?v= <?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="login__header">
        <a href = "index.php" class="login__header__img">
            <img src="./img/logo.svg" alt="">
        </a>
        <a href="index.php" class="login__header__back">
            <i class='bx bx-chevron-left'></i>
            <span>Quay Lại</span>
        </a>
    </div>
    <div class="login__container">
        <div class="login__container__form">
            <h3>
                Đăng nhập
            </h3>
            <p
                >Một tài khoản kết nối tất cả ứng
                dụng trực tuyến của Decathlon và người chơi
                thể thao!
            </p>
            <form   method="post">
                <div class="form__right__input">
                    <input class="user"  name = "user"  type="text" placeholder=" ">
                    <label for="" >Tên Đăng Nhập</label>
                </div>
                <div class="form__right__input">
                    <input  class ="password" name = "password" type="password" placeholder=" ">
                    <label for="" >Mật Khẩu</label>
                </div>
                <div class="form__right__notification--error">
                    <i class='bx bx-error-circle'></i>
                    <span>Tài khoản sai cú pháp</span>
                </div>
                <input  type="submit" value="Đăng Nhập" class="form__right__submit">
            </form>

            <div class="signUp__right__line">
                <div></div>
                <span>HOẶC</span>
                <div></div>
            </div>

            <h6>Bạn chưa có tài khoản?   <a href="signUp.php">Đăng ký ngay!</a></h6>
            <a href="signUp.php" class="login__container__form__link">Tạo Tài Khoản</a>
        </div>
    </div>

    <script>
        $(".form__right__submit").on("click" ,  function (e){
            e.preventDefault();
            var user = $(".user").val();
            var password = $(".password").val();
           
        
                 $.ajax({
                     url : "Xulydangnhap.php",
                     type : "post",
                     data : {
                         user : user,
                         password : password
                     },

                     success: function (data) {
                         alter = JSON.parse(data) ;
                         console.log(alter);

                         if(alter.status === 0){
                             alert(alter.message);
                         }

                         if(alter.status === 1){
                             alert(alter.message);
                             location.href = "index.php";
                         }

                         if(alter.status === 2){
                             alert(alter.message);
                             location.href = "admin.php";
                         }

                         
                     }

                 })


                
            })
    </script>
</body>
</html>
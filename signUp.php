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
     <?php
        @include('Connect.php');
        $duplicatemail = false;
        $duplicateuser = false;
        $duplicatphone = false;
        if(isset($_POST["fullname"])){
              $fullname = $_POST["fullname"];
              $username = $_POST["username"];
              $email = $_POST["email"];
              $phone = $_POST["phone"];
              $password = $_POST["password"];
              $ho = $_POST["ho"];

              $sql_makh =  mysqli_query($con , " SELECT * FROM taikhoan WHERE MANGUOISUDUNG LIKE  '" . "%"  . "KH" . "%" ."' ");
              $length = mysqli_num_rows($sql_makh) + 1;
              if($length < 10){
                  $length = '0'.$length ;
              }else {
                  $length = $length ;
              }

              $sql_check_tk =  mysqli_query($con , " SELECT * FROM taikhoan ");
              $sql_check_kh =  mysqli_query($con , " SELECT * FROM khachhang ");
             
              while($sql_row_checkuser = mysqli_fetch_array($sql_check_tk)){
                  if($sql_row_checkuser["MATK"] == $username ) {
                      $duplicateuser = true;
                      break;
                  }
              }

              while($sql_row_check_kh = mysqli_fetch_array( $sql_check_kh )){
                if($sql_row_check_kh["EMAIL"] ==  $email || $sql_row_check_kh["DIENTHOAI"] ==  $phone) {
                    if( $sql_row_check_kh["EMAIL"] ==  $email){

                        $duplicatemail  = true;
                       
                    }
                    if( $sql_row_check_kh["DIENTHOAI"] ==  $phone){
                        $duplicatphone  = true;
                       
                    }
                }
             }

             if($duplicateuser == false && $duplicatemail == false && $duplicatphone == false) {

                $sql_taikhoan = mysqli_query($con , "INSERT INTO taikhoan(MATK , MAROLE , MATKHAU , MANGUOISUDUNG , NGAYTAOTK , TRANGTHAI ) 
                VALUES ('".$username."' , 'User' , '".$password."' , '".'KH'.$length."' , '".date('Y-m-d')."' , '1' )  ");
                $sql_khachhang = mysqli_query($con , "INSERT INTO khachhang(MAKH , HO , TEN  , DIENTHOAI , EMAIL) 
                VALUES ('".'KH'.$length."' , '$ho' , '$fullname' , '$phone' , '$email')");
                echo '<script type="text/javascript">alert("????ng k?? t??i kho???n th??nh c??ng!!")</script>';
                echo '<script type="text/javascript">
                            location.href = "login.php"
                      </script>';
              }
             }
              
        

      ?>


    <div class="signUp">
        <a href="index.php" class="signUp__back">
            <i class='bx bx-chevron-left'></i>
              Quay l???i
        </a>
        <div class="signUp__left">
            <div class="signUp__left__img">
                <img src="./img/logo.svg" alt="">
            </div>
            <h3>T???o t??i kho???n</h3>
            <span>
                T???o t??i kho???n m???t l???n v?? ????ng nh???p t???t c??? c??c
                 trang web v?? ?????i t??c c???a Decathlon ch??? b???ng m???t
                  c?? nh???p chu???t!
            </span>
        </div>
        <div class="signUp__right">
            <form action="signUp.php" method="post">
                <div class="form__right__input">
                    <input id="contact-name2" class = "hoten2" name = "ho"  type="text" placeholder=" ">
                    <label for="" >H???</label>
                    <span style="display : none ; color : red" id="errorName4">Vui l??ng nh???p h???</span>
                </div>
                <div class="form__right__input">
                    <input id="contact-name" class = "hoten" name = "fullname"  type="text" placeholder=" ">
                    <label for="" >T??n</label>
                    <span style="display : none ; color : red" id="errorName3">Vui l??ng nh???p t??n</span>
                </div>
                <div class="form__right__input">
                    <input id = "subject" class = "tendangnhap" name="username" type="text" placeholder=" ">
                    <label for="" >T??n ????ng Nh???p</label>
                    <span  style="display : none ; color : red"  id="errorAnswer">Vui l??ng nh???p t??n ????ng nh???p</span>
                    <?php 
                        if($duplicateuser){
                            echo '<span  style="display : block ; color : red"  id="errorAnswer">T??n ????ng nh???p ???? t???n t???i</span>';
                        }
                    ?>
                </div>
                <div class="form__right__input">
                    <input id="contact-email" class="email" name = "email" type="text" placeholder=" ">
                    <label for="" >Email</label>
                    <span  style="display : none ; color : red"  id="errorEmail3">Email sai ?????nh d???ng</span>
                    <?php 
                        if($duplicatemail){
                            echo '<span  style="display : block ; color : red"  id="errorAnswer">Email ???? t???n t???i</span>';
                        }
                    ?>
                </div>
                <div class="form__right__input">
                    <input id="contact-phone" class = "sdt" name = "phone" type="text" placeholder=" ">
                    <label for="" >S??? ??i???n Tho???i</label>
                     <span  style="display : none ; color : red" id = "errorPhone" >Sai ?????nh d???ng s??? ??i???n tho???i</span>
                     <?php 
                        if( $duplicatphone){
                            echo '<span  style="display : block ; color : red"  id="errorAnswer">S??? ??i???n tho???i ???? t???n t???i</span>';
                        }
                    ?>
                </div>
                <div class="form__right__input">
                    <input id = "password" class="password" name = "password" type="password" placeholder=" ">
                    <label for="" >M???t Kh???u</label>
                    <span  style="display : none ; color : red"  id="errorpassword" >M???t kh???u bao g???m t???i thi???u 1 ch??? , 1 s??? , 1 k?? t??? ?????c bi???t v?? c?? ????? d??i l???n h??n 8</span>
                </div>
                <div class="form__right__input">
                    <input id="password2" class="confirmpassword" name = "checkpassword" type="password" placeholder=" ">
                    <label  for="" >Nh???p L???i M???t Kh???u</label>
                    <span style="display : none ; color : red" id="errorpassword2" >Kh??ng tr??ng kh???p v???i m???t kh???u</span>
                </div>
                <!-- <div class="form__right__notification--error">
                    <i class='bx bx-error-circle'></i>
                    <span>T??i kho???n sai c?? ph??p</span>
                </div> -->
                <input  type="submit" value="????ng K??" class="form__right__submit">
            </form>
            <div class="signUp__right__line">
                <div></div>
                <span>HO???C</span>
                <div></div>
            </div>
            <h6>B???n ???? c?? t??i kho???n? <a href="login.php">????ng nh???p</a></h6>
            <p>
                Li??n h??? ?????i ng?? ch??m s??c kh??ch h??ng
                Th??? 2 - Th??? 7: t??? 9h ?????n 22h; Ch??? Nh???t: t??? 10h ?????n 19h
                18009044
            </p>
        </div>
    </div>

    <script>
        var mobilevld = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/
        var emailvld =  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
        var passwordvld = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
   
               $(".form__right__submit").on("click" , function (e) {
                                e.preventDefault();
                               var hoten =  $(".hoten").val();
                               var tendangnhap =  $(".tendangnhap").val();
                               var email =   $(".email").val();
                               var sdt = $(".sdt").val();
                               var password =   $(".password").val();
                               var ho = $(".hoten2").val();
                               var confirmpassword =   $(".confirmpassword").val();
                                if (hoten.length == 0 || tendangnhap.length == 0 || !sdt.match(mobilevld) || !password.match(passwordvld) || !email.match(emailvld) || confirmpassword !== password || ho.length == 0) {
                                if (ho.length == 0) {
                                    document.getElementById('errorName4').style.display = 'block';
                                    document.getElementById('contact-name2').style.border = '1px solid red';
                                }
                                if (ho.length != 0) {
                                    document.getElementById('errorName4').style.display = 'none';
                                    document.getElementById('contact-name2').style.border = '1px solid #ccc';   
                                }    

                                if (hoten.length == 0) {
                                    document.getElementById('errorName3').style.display = 'block';
                                    document.getElementById('contact-name').style.border = '1px solid red';
                                }
                                if (hoten.length != 0) {
                                    document.getElementById('errorName3').style.display = 'none';
                                    document.getElementById('contact-name').style.border = '1px solid #ccc';
                                }
                                if (!email.match(emailvld)) {
                                    document.getElementById('errorEmail3').style.display = 'block';
                                    document.getElementById('contact-email').style.border = '1px solid red';
                                }
                                if (email.match(emailvld)) {
                                    document.getElementById('errorEmail3').style.display = 'none';
                                    document.getElementById('contact-email').style.border = '1px solid #ccc';
                                }
                                if (!sdt.match(mobilevld)) {
                                    document.getElementById('errorPhone').style.display = 'block';
                                    document.getElementById('contact-phone').style.border = '1px solid red';
                                }
                                if (sdt.match(mobilevld)) {
                                    document.getElementById('errorPhone').style.display = 'none';
                                    document.getElementById('contact-phone').style.border = '1px solid #ccc';
                                }
                                if (tendangnhap.length == 0) {
                                    document.getElementById('errorAnswer').style.display = 'block';
                                    document.getElementById('subject').style.border = '1px solid red';
                                }
                                if (tendangnhap.length != 0) {
                                    document.getElementById('errorAnswer').style.display = 'none';
                                    document.getElementById('subject').style.border = '1px solid #ccc';
                                }


                                if (!password.match(passwordvld)) {
                                    document.getElementById('errorpassword').style.display = 'block';
                                    document.getElementById('password').style.border = '1px solid red';
                                }
                                if (password.match(passwordvld)) {
                                    document.getElementById('errorpassword').style.display = 'none';
                                    document.getElementById('password').style.border = '1px solid #ccc';
                                }


                                if (confirmpassword !== password ) {
                                    document.getElementById('errorpassword2').style.display = 'block';
                                    document.getElementById('password2').style.border = '1px solid red';
                                }

                                if (confirmpassword.length === password ) {
                                    document.getElementById('errorpassword2').style.display = 'none';
                                    document.getElementById('password2').style.border = '1px solid red';
                                }
                               
                                }else {
                                   
                                    $.ajax({
                                        url : "signUp.php",
                                        type : "POST",
                                        data : {
                                            fullname : hoten,
                                            username : tendangnhap,
                                            email : email,
                                            phone : sdt,
                                            password : password,
                                            ho : ho,
                                           
                                        },


                                        success: function (data) {
                                         $("body").html(data)
                                         
                                         
                                        }

                                    })
                                }

               })

    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css?v= <?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/base.css?v= <?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>   
    <link rel="stylesheet" href="./main.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="./reponsive.css?v= <?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php
       session_start();
        @include('./header.php');
        @include ('Connect.php');
        
         if(isset($_SESSION['dangnhap'])){
         $taikhoan = $_SESSION['dangnhap'];
         $matk = $_SESSION['matk'];
        }
        $ten = '';
        $ho = '';
        $sdt = '';
        $email = '';
        $gioitinh = '';
        $sql_donhang = mysqli_query($con , "SELECT * FROM donhang WHERE MAKH = '".$matk."'");

        $sql_khachhang =  mysqli_query($con , "SELECT * FROM khachhang WHERE MAKH = '".$matk."'" );
        $sql_row_khachhang = mysqli_fetch_array($sql_khachhang);
        if($sql_row_khachhang){
               $ten = $sql_row_khachhang["TEN"];
               $ho = $sql_row_khachhang["HO"];
               $sdt = $sql_row_khachhang["DIENTHOAI"];
               $email = $sql_row_khachhang["EMAIL"];
               $gioitinh = $sql_row_khachhang["GIOITINH"];
        }


        if(isset($_POST["Luu"])){
            $newten = $_POST['ten'];
            $newho = $_POST['ho'];
            $newsdt = $_POST['sdt'];
            $newemail = $_POST['email'];
            $newgioitinh = $_POST['gioitinh'];

            $sql_update =  mysqli_query($con , "UPDATE  khachhang SET HO =  '".$newho."' , TEN = '".$newten."' , DIENTHOAI = '".$newsdt."' , EMAIL = '".$newemail."' , GIOITINH = '".$newgioitinh."' WHERE MAKH = '".$matk."'");
            // echo '<script type="text/javascript">alert("Cập nhật thông tin tài khoản thành công!!")</script>';
        }
       
       
    ?>
    <div class="user__container">
        <div class="user__container__content">
            <div class="user__container__content__left">
                <h3 class="user__content__left__name">
                    <?php  echo  $sql_row_khachhang["HO"]." ".$sql_row_khachhang["TEN"] ?>
                </h3>
                <ul class="user__content__left__list">
                    <li class="user__content__left__item">
                        <span href="" class="user__content__left__link active">
                            <div>
                                <img src="./img/cart_logo.svg" alt="">
                            </div>
                            <span>Đơn hàng</span>
                        </span>
                    </li>
                    <li class="user__content__left__item">
                        <span href="#info" class="user__content__left__link">
                            <div>
                                <img src="./img/user_logo.svg" alt="">
                            </div>
                            <span>Thông tin</span>
                        </span>
                    </li>
                    <!-- <li class="user__content__left__item">
                        <span href="" class="user__content__left__link">
                            <div>
                                <img src="./img/thu.svg" alt="">
                            </div>
                            <span>Địa chỉ</span>
                        </span>
                    </li> -->
                    <li class="user__content__left__item">
                        <a href="index.php?dangxuat" class="user__content__left__link">
                            <div>
                                <img src="./img/signUp.svg" alt="">
                            </div>
                            <span>Đăng xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="user__container__content__right">
                <!-- đơn hàng -->
                
    <div class="user__right__cart user__right__content active">
                <?php
                      while ( $sql_row_donhang = mysqli_fetch_array($sql_donhang)){
                        $sql_chitietdonhang = mysqli_query($con , "SELECT * FROM chitietdonhang WHERE MADH = '".$sql_row_donhang['MADH']."'");
                        
                 ?>
                         
                                    <div class="user__right__cart__item">
                                        <div class="user__right__cart__info">
                                            <span class="user__right__cart__id">
                                                Mã đơn hàng : <span><?php echo $sql_row_donhang['MADH']?></span>
                                            </span>
                                            <span class="user__right__cart__day">
                                                 <?php echo $sql_row_donhang['THOIGIANDATHANG']?>
                                            </span>
                                        </div>
                                        <div class="user__right__cart__content">
                                            <div class="user__right__cart__content__header">
                                                <div class="user__right__cart__dayReceive">
                                                    <h3>Giao hàng tại cửa hàng</h3>
                                                    <span>Dự kiến giao hàng vào : <?php echo $sql_row_donhang['THOIGIANNHANHANG']?></span>
                                                </div>
                                                
                                            </div>
                                            <div class="user__right__cart__content__body">
                                                <?php 
                                                    
                                                    
                                                    while($sql_row_chitietdonhang = mysqli_fetch_array($sql_chitietdonhang)){
                                                          $sql_sanpham = mysqli_query($con , "SELECT * FROM sanpham WHERE MASP = '".$sql_row_chitietdonhang['MASP']."'");
                                                          $sql_row_sanpham = mysqli_fetch_array( $sql_sanpham);
                                                          
                                                ?>
                                                                

                                                                    <div class="user__right__cart__content__item">
                                                                        <div class="user__right__cart__item__img">
                                                                            <img src="./img/<?php echo $sql_row_sanpham["HINH"]?>.jpg" alt="">
                                                                        </div>
                                                                        <div class="user__right__cart__item__info">
                                                                            <span class="user__right__cart__item__info--name">
                                                                                <?php echo $sql_row_sanpham['TENSP']?>
                                                                            </span>
                                                                            <span class="user__right__cart__item__info_quantity">
                                                                                Số lượng : <?php echo $sql_row_chitietdonhang['SOLUONG']?>
                                                                            </span>
                                                                            <span class="user__right__cart__item__info--price">
                                                                            <?php echo number_format($sql_row_sanpham['GIA'], 0 ,',',',')?>
                                                                            </span>                                  

                                                                        </div>
                                                                    </div>
                                                  <?php 
                                                      }
                                                  ?>
                                               
                                                </div>
                                            </div>
                                        </div>


                                        <h4>Tổng tiền hóa đơn:  <?php echo number_format($sql_row_donhang["TONGTIEN"], 0 ,',',',') ?> VND</h4>
                                   
                                    
                 <?php
                      }
                      ?>
         </div>

                <!-- thông tin -->
                <div id="info" class="user__right__info user__right__content ">
                    <h3>Thông tin cá nhân</h3>

                    <form action="user.php" method="get" class="user__right__form">
                        <div class="user__right__input">
                            <label for="">Tên & tên đệm*</label>
                            <input class="ten" id="contact-name" name = "ten" class="ten"  type="text" placeholder="Tên & tên đệm"  value = "<?php echo $ten ?>">
                            <span style="display: none ; color : red" id="errorName3" >Tên không được để trống</span>
                        </div>
                        <div class="user__right__input">
                            <label for="">Họ*</label>
                            <input id="contact-name2" class = "ho" name = "ho" class = "ho"  type="text" placeholder="Họ" value = "<?php echo $ho ?>">
                            <span style="display: none ; color : red"  id = "errorName4">Họ không được để trống</span>
                        </div>
                        <div class="user__right__input">
                            <label for="">Số điện thoại*</label>
                            <input id="contact-phone" class="sdt" name = "sdt" class="sdt" type="text" placeholder="Số điện thoại" value = "<?php echo $sdt ?>">  
                            <span style="display: none ; color : red" id="errorPhone" >Số điện thoại sai định dạng</span>
                        </div>
                        <div class="user__right__input">
                            <label for="">Hộp thư*</label>
                            <input id="contact-email" class = "email" name = "email" class="email" type="text" value = "<?php echo  $email ?>"  >
                            <span style="display: none ; color : red" id="errorEmail3" >Email sai định dạng</span>
                        </div>
                        <div class="user__right__info__gender">
                            <h5>Giới tính</h5>
                            <div class="user__right__info__gender__check">
                                <?php 
                                    if($gioitinh == 'Nam'){
                                        echo '
                                        <div  class="user__right__info__check__radio">
                                            <input value = "Nam" checked style="background-color : #e7f3f9" type="radio"  name="gender">
                                            <div><span>Nam</span></div>
                                        </div>
                                             
                                        <div class="user__right__info__check__radio">
                                            <input value = "Nữ"  type="radio"  name="gender" >
                                            <div><span>Nữ</span></div>
                                        </div>
                                        ';
                                    }else{
                                        echo '
                                        <div class="user__right__info__check__radio">
                                            <input value = "Nam"  type="radio"  name="gender">
                                            <div><span>Nam</span></div>
                                        </div>
                                             
                                        <div  class="user__right__info__check__radio">
                                            <input value = "Nữ" style="background-color : #e7f3f9"  type="radio"  name="gender" checked>
                                            <div><span>Nữ</span></div>
                                        </div>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="user__right__info__update">
                           
                        </div>
                        <input name = "Luu"  type="submit" class = 'luu' type="button" value="Lưu">
                    </form>
                </div>

          
            </div>
        </div>
    </div>
    <?php 
        @include('./footer.php');
    ?>

   
 
<script src="./user__address.js?v= <?php echo time(); ?>"></script>
<script src="./user.js?v= <?php echo time(); ?>"></script>
</body>

<script> 
          
            
 
        var mobilevld = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/
        var emailvld =  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
        var passwordvld = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
   
                       $(".luu").on("click" , function (e) {
                                e.preventDefault();
                                var ho =  $(".ho").val();
                                var ten =  $(".ten").val();
                                var email = $(".email").val();
                                var sdt = $(".sdt").val();
                                var gioitinh =  $(".user__right__info__check__radio input:checked").val();
                             
                             
                                if (ho.length == 0 || ten.length == 0 || !sdt.match(mobilevld) || !email.match(emailvld)) {

                                if (ho.length == 0) {
                                    document.getElementById('errorName4').style.display = 'block';
                                    document.getElementById('contact-name2').style.border = '1px solid red';
                                }
                                if (ho.length != 0) {
                                    document.getElementById('errorName4').style.display = 'none';
                                    document.getElementById('contact-name2').style.border = '1px solid #ccc';   
                                }    

                                if (ten.length == 0) {
                                    document.getElementById('errorName3').style.display = 'block';
                                    document.getElementById('contact-name').style.border = '1px solid red';
                                }
                                if (ten.length != 0) {
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
                               
                               
                                }else {
                                   
                                    $.ajax({
                                        url : "user.php",
                                        type : "POST",
                                        data : {
                                            ten : ten,
                                            ho : ho,
                                            email : email,
                                            sdt : sdt,
                                            gioitinh : gioitinh,
                                            Luu : "true"
                                           
                                        },


                                        success: function (data) {
                                       
                                         alert("Cập nhật thông tin thành công!!")
                                         
                                        }

                                    })
                                }

               })


            
   
</script>
</html>
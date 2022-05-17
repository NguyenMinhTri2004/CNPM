<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
    font-family: Arial;
    font-size: 17px;
    padding: 8px;
}

* {
    box-sizing: border-box;
}

.row1,
.row2
 {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -16px;
}

.col-25 {
    flex: 25%;
}

.col-50 {
  flex: 50%;
}

.col-75 {
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  
  padding: 5px 20px 15px 20px;
 
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #000000;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}



a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
a:link {
  text-decoration: none;
  color:black
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

a:active {
  text-decoration: none;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
    .row1 {
        flex-direction: column-reverse;
    }
    .row2{
        flex-direction: column;
    }    
    .col-25 {
        margin-bottom: 20px;
    }
}
</style>
</head>
<body>

<?php 
    @include("Connect.php");
     session_start();
     if(isset($_SESSION['dangnhap'])){
      $taikhoan = $_SESSION['dangnhap'];
      $matk = $_SESSION['matk'];
     }
    if(isset($_POST['dathang'])){
      $tinhthanh = $_POST['tinhthanh'];
      $quanhuyen = $_POST['quanhuyen'];
      $phuong = $_POST['phuong'];
      $diachi = $_POST['diachi'];
      $sql_donhang =  mysqli_query($con , "SELECT * FROM donhang");
      $countdonhang =  mysqli_num_rows($sql_donhang) + 1;
      if($countdonhang < 10){
        $countdonhang = '0'.$countdonhang;
      }else {
        $countdonhang = $countdonhang;
      }

      $sql_ctdh = ' ';
      $tongtien = 0;
     foreach ($_SESSION['cart'] as $r){
          $sql_ctdh = "INSERT INTO chitietdonhang(MADH , SOLUONG , MASP , THANHTIEN) 
          VALUES('".'DH'.$countdonhang."','".$r['soluong']."','".$r['masanpham']."','".$r['giasanpham']."')";
          $tongtien += $r['giasanpham']*$r['soluong'];
          $sql_acthd =  mysqli_query($con , $sql_ctdh);
      }
      $sql_adddh = mysqli_query($con , "INSERT INTO donhang(MADH , MAKH , THOIGIANDATHANG , THOIGIANNHANHANG , TENNGUOINHAN , DIADIEMGIAOHANG , TONGTIEN , TRANGTHAI )
      VALUES('".'DH'.$countdonhang."', '".$matk."' , '".date('Y-m-d')."', '".date('Y-m-d')."' ,  '".$taikhoan."' , '$tinhthanh-$quanhuyen-$phuong-$diachi' , ' ".$tongtien." ' , '0')");
      unset($_SESSION['cart']);
      echo '<script type="text/javascript">alert("Thanh toán thành công!!")</script>';
      echo '<script type="text/javascript">
                  location.href = "user.php"
            </script>';
     
    }else {
      $tongtien = 0;
    }


    $sql_khachhang = mysqli_query($con ,"SELECT * FROM khachhang  WHERE MAKH = '".$matk."'" );
    $sql_row_khachhang = mysqli_fetch_array($sql_khachhang);


?>

<div class="row1">
    <div class="col-75">
        <div class="container">
      
            

            <div class="row2">
              <form style="width:100%; display: flex;" action="doan_thanhtoan.php"  method="post">
                <div class="col-50">
                    <h3>Địa chỉ</h3>
                    <label><i class="fa fa-user"></i> Họ và tên </label>
                    <input disabled id="contact-name" class="hoten"  value = <?php echo "'$sql_row_khachhang[HO] $sql_row_khachhang[TEN]'" ?>  type="text" placeholder="Nguyễn Văn A">
                    <span id="errorName3"  style="display : none ; color : red ; margin-bottom : 20px"  >Trường này không được để trống</span>
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input disabled id = "contact-email" class="email" value = <?php echo "'$sql_row_khachhang[EMAIL]'"?> type="text" placeholder="ngva@example.com">
                    <span id="errorEmail3" style="display: none">Sai định dạng email</span>
                    <label"><i class="fa fa-institution"></i>Tỉnh thành</label>
                    <input id="contact-phone" class = "tinhthanh" name = "tinhthanh" type="text" placeholder="Tp. Hồ Chí Minh">
                    <span id="errorPhone" style=" display : none ; color : red ; margin-bottom : 20px" >Trường này không được để trống</span>
                    <label><i class="fa fa-institution"></i>Quận huyện</label>
                    <input id="subject" class = "quanhuyen" name = "quanhuyen" type="text" placeholder="Quận 5">
                    <span  id="errorAnswer" style=" display : none ; color : red ; margin-bottom : 20px">Trường này không được để trống</span>
                    <label><i class="fa fa-institution"></i>Phường xã</label>
                    <input id="password" class="phuong" name = "phuong" type="text" placeholder="Phường 3">
                    <span id="errorpassword" style=" display : none ; color : red ; margin-bottom : 20px">Trường này không được để trống</span>
                    <label><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                    <input id="password2" class = "diachi" name = "diachi" value = <?php echo "'$sql_row_khachhang[DIACHI]'"?> type="text" placeholder="273 An Dương Vương">
                    <span id="errorpassword2" style=" display : none ; color : red ; margin-bottom : 20px" >Trường này không được để trống</span>
                </div>

                <div class="col-50">
                    <h3>Vận chuyển</h3>
                    <div> Phương thức vận chuyển </div>
                    <label style="border: 1px solid #ccc; ;background-color:white; display: block;padding:10px; ;margin-top: 10px;border-radius: 3px;">
                        <input type="radio" checked >
                        <p style="display: inline;" id="transport" >Giao hàng tận nơi</p>  
                        <span style="float:right">40.000</span>
                    </label>    
                
                    <h3  >Thanh toán</h3>
                    <div>
                        <div>
                            <label style="border: 1px solid #ccc; ;background-color:white; display: block;padding:10px; ;margin-top: 10px;border-radius: 3px;">
                                <input type="radio" checked >
                            Thanh toán khi giao hàng (COD)
                            </label> 
                        </div>
                        <div>
                            Bạn chỉ phải thanh toán khi nhận được hàng
                        </div>
                    </div>
                    <input type="hidden" name="dathang"/>
                    <button type="submit" style="text-align:center"  value="Đặt hàng" class="btn">Đặt Hàng</button>
                </div>
             </form>
            </div>           
      
    </div>
</div>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
      
        var emailvld =  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        
   
               $(".btn").on("click" , function (e) {
                              e.preventDefault();
                               var hoten =  $(".hoten").val();
                               var email =   $(".email").val();
                               var tinhthanh = $(".tinhthanh").val();
                               var quanhuyen =   $(".quanhuyen").val();
                               var phuong =   $(".phuong").val();
                               var diachi =   $(".diachi").val();
                             
                                if (hoten.length == 0 || tinhthanh.length == 0 || quanhuyen.length == 0 || phuong.length == 0 || !email.match(emailvld) || diachi.length == 0) {
                              

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
                                if (tinhthanh.length == 0) {
                                    document.getElementById('errorPhone').style.display = 'block';
                                    document.getElementById('contact-phone').style.border = '1px solid red';
                                }
                                if (tinhthanh.length != 0) {
                                    document.getElementById('errorPhone').style.display = 'none';
                                    document.getElementById('contact-phone').style.border = '1px solid #ccc';
                                }
                                if (quanhuyen.length == 0) {
                                    document.getElementById('errorAnswer').style.display = 'block';
                                    document.getElementById('subject').style.border = '1px solid red';
                                }
                                if (quanhuyen.length != 0) {
                                    document.getElementById('errorAnswer').style.display = 'none';
                                    document.getElementById('subject').style.border = '1px solid #ccc';
                                }


                                if (phuong.length == 0) {
                                    document.getElementById('errorpassword').style.display = 'block';
                                    document.getElementById('password').style.border = '1px solid red';
                                }
                                if (phuong.length != 0) {
                                    document.getElementById('errorpassword').style.display = 'none';
                                    document.getElementById('password').style.border = '1px solid #ccc';
                                }


                                if (diachi.length == 0 ) {
                                    document.getElementById('errorpassword2').style.display = 'block';
                                    document.getElementById('password2').style.border = '1px solid red';
                                }

                                if (diachi.length != 0 ) {
                                    document.getElementById('errorpassword2').style.display = 'none';
                                    document.getElementById('password2').style.border = '1px solid red';
                                }
                               
                                }else {
                                   
                                    $.ajax({
                                        url : "doan_thanhtoan.php",
                                        type : "POST",
                                        data : {
                                            tinhthanh : tinhthanh,
                                            quanhuyen : quanhuyen,
                                            phuong : phuong,
                                            diachi : diachi,
                                            dathang : 'dathang',
                                           
                                           
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

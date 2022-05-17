<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Sass/Css/productdetail.css?v = <?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/reponsive.css?v= <?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

   <?php 
      session_start();
       @include ("Connect.php");
       if(isset($_POST['masp'])){

         $Masp = $_POST['masp'];
         $sql_productdetail = mysqli_query($con ,"SELECT MASP , REPLACE(TENSP,' ','-') as 'TENSP' , GIA , HINH FROM sanpham");
       }
      //  $quantity = 1;
     


   ?>

    <?php 
      @include ("header.php");
    ?>

   <div class="productdetail">

       <?php 
          while($row_productdetail = mysqli_fetch_array($sql_productdetail)){
            if($row_productdetail["MASP"] == $Masp ){
          
       ?>

       <div class="productdetail__left">
           <div class="productdetail__left__img">

                <div class="productdetail__left__img__main">
                    <img src="./img/<?php echo $row_productdetail["HINH"] ?>.jpg" alt="">
                </div>

               

           </div>
       </div>

       <div class="productdetail__right">

            <div class="productdetail__right__item">
              <div class="productdetail__right__item__name">
                  <div class="productdetail__right__item__name__company">
                      <p>NABAIJI</p>
                  </div>

                  <div class="productdetail__right__item__name__nameproduct">
                       <h4><?php echo $row_productdetail["TENSP"] ?></h4>
                  </div>

                  <div class="productdetail__right__item__name__code">
                        <p>Mã sản phẩm: <?php echo $row_productdetail["MASP"] ?></p>
                  </div>
              </div>
            </div>

             <div class="productdetail__right__item">
                  <div class="productdetail__right__item__rating">
                   <span  class="productdetail__right__item__rating__price" ><?php echo number_format($row_productdetail["GIA"],0,',',',') ?> VNĐ</span> 
                   <span class="productdetail__right__item__rating__chev" ></span>
                   <span class="productdetail__right__item__rating__start" >
                       <p>4/5 </p>
                       <img src= "./assets/Img/start.png" alt="" />
                       11
                   </span>

                   <span> 
                       <p>XEM TẤT CẢ ĐÁNH GIÁ
                         
                       </p>
                       <div class="productdetail__right__item__rating__start__img__more">
                               <img src= "./assets/Img/startbrown.png" alt="" />
                       </div>
                      
                   </span>

                  </div>

             </div>

              <div class="productdetail__right__item">
                <div class="productdetail__right__item__maintenance">
                  <div class="productdetail__right__item__maintenance__img">
                    <img src= "./assets/Img/maintain.png" alt="" />

                  </div>

                  <div class="productdetail__right__item__maintenance__text">
                      <p><span class="color-blue" >BẢO HÀNH </span>
                        <br></br> 
                        <span class="color-orange" >TỐI THIỂU 2 NĂM</span>
                      </p>
                  </div>

                </div>

              </div>
<!-- 
               <div class="productdetail__right__item">

                  <div class="productdetail__right__item__size">
                   <div class="productdetail__right__item__size__select"  >
                       <h5>KÍCH CỠ</h5>
                       <select placeholder="Chọn cỡ" name="" id="">
                         <option value="">L</option>
                      </select>
                  </div> 

                 
                  <div class="productdetail__right__item__size__chart">
                       <div class="productdetail__right__item__size__chart__img">
                           <img src= "./assets/Img/chartsizeproduct.png" alt="" />
                       </div>
                       <p class = "color-blue" >HƯỚNG DẪN CHỌN CỠ </p>
                       <i class='bx bxs-chevron-right color-blue'></i>
                  </div>
                  </div>
               </div> -->

              <div class="productdetail__right__item">

                 <div class="productdetail__right__item__button">
                      <!-- {/* <div class="productdetail__right__item__button__procesing">
                           <div></div>
                      </div> */} -->

                      <div class="productdetail__right__item__button__list">
                           
                             <div class="productdetail__right__item__button__child">
                               <form action="Cart.php" method="post" >
                                 <input  class="nameproduct"  value = <?php echo $row_productdetail['TENSP']?> name = "nameproduct" hidden type="text">
                                 <input class ="priceproduct" value = <?php echo $row_productdetail['GIA']?> name = "priceproduct" hidden type="text">
                                 <input class="imageproduct" value = <?php echo $row_productdetail['HINH']?> name = "imageproduct" hidden type="text">
                                 <input class="idproduct" value = <?php echo $row_productdetail['MASP']?> name = "idproduct" hidden type="text">
                                 <input class="quantityproduct" value = '1' name = "quantityproduct" hidden type="text">
                                 <?php 
                                     if(isset($_SESSION['dangnhap'])){
                                       echo ' <button type="submit"  class = "addcart"  value = "addcart" name = "addcart"  >Thêm vào giỏ hàng</button>';
                                     }else {

                                      echo ' 
                                     
                                           <a href = "login.php" class = "addcart"  value = "addcart" name = "addcart"  >Đăng nhập để mua hàng</a>
                                       ';
                                     }
                                 ?>
                                
                               </form>
                             
                               
                             </div>
                          

                         <!-- <div class="productdetail__right__item__button__child">
                            
                            <button>Mua tại cửa hàng</button>
                         </div> -->

                      </div>
                 </div>
              </div>

              <div class="productdetail__right__item">
                   <div class="productdetail__right__item__delivery">
                         <div class="productdetail__right__item__delivery__address">
                             <div class="productdetail__right__item__delivery__address__left">
                                  <h4>GIAO HÀNG</h4>
                                  <p>Hình thức giao hàng có sẵn cho tỉnh & quận</p>
                                  <span>
                                     <span>
                                         Hồ Chí Minh Quận 1 
                                         <img src= "./assets/Img/check.png" alt="" />
                                     </span>

                                     <p>Thay Đổi</p> 
                                    
                                  </span>
                             </div>

                             <div class="productdetail__right__item__delivery__address__right">
                                   <div class="productdetail__right__item__delivery__address__right__item">
                                          <div class="productdetail__right__item__delivery__address__right__item__img">
                                              <img src= './assets/Img/service-icon-3.png' alt="" />
                                          </div>
                                              <p>Freeship tối đa 100k <br></br> cho đơn trên 899k</p>
                                   </div>

                                   <div class="productdetail__right__item__delivery__address__right__item">
                                            <div class="productdetail__right__item__delivery__address__right__item__img pb-20">
                                              <img  src= './assets/Img/service-icon-4.png' alt="" />
                                            </div>
                                              <p>30 ngày trả hàng</p>

                                   </div>
                             </div>

                         </div>

                         <div class="productdetail__right__item__delivery__date">
                             <div class="productdetail__right__item__delivery__date__icon">
                                  <img src= './assets/Img/detaildelivery.png' alt="" />
                             </div>

                             <div class="productdetail__right__item__delivery__date__text">
                                  <p>GIAO HÀNG TẠI NHÀ Từ Thứ sáu, 18/03</p>
                             </div>
                         </div>

                         <div class="productdetail__right__item__delivery__receive">
                             <div class="productdetail__right__item__delivery__receive__icon">
                                 <img src= "./assets/Img/receive.png" alt="" />
                             </div>

                              <div class="productdetail__right__item__delivery__receive__text">
                                    NHẬN HÀNG TẠI ĐIỂM CLICK & COLLECT Từ Ngày mai, <br></br> 16/03 <br></br>
                                    <p>Vui lòng chọn khi thanh toán</p> 
                              </div>

                              <div class="productdetail__right__item__delivery__receive__address">
                                <span class="productdetail__right__item__delivery__receive__address__wrapper">
                                         <p>TẤT CẢ ĐIỂM LẤY HÀNG</p>
                                         <i class='bx bxs-chevron-right'></i>
                                </span>
                                  
                              </div>
                         </div>
                   </div>

              </div>

              <div class="productdetail__right__item">
                  <div class="productdetail__right__item__purpose">
                      <h5>MỤC ĐÍCH SẢN PHẨM</h5>
                      <p>Dành cho người bơi ở trình độ trung bình cần kính ổn định và 
                        có tầm nhìn rộng để tập luyện hoặc giữ dáng. Tính năng chống đọng 
                        sương Kính bơi SPIRIT có tầm nhìn rộng. Rất thoải mái nhờ thiết kế mềm 
                        dẻo, nhỏ gọn, đảm bảo khả năng kín nước tuyệt vời. Tròng kính tráng gương.
                      </p>
                  </div>
              </div>

       </div>

       <?php 
           } }
       ?>
   </div>

       
        
       </div>
   <?php 
      @include('footer.php');
   ?>

   

   
</body>
</html>
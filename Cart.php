<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Sass/Css/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/cartitem.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/reponsive.css?v= <?php echo time(); ?>">
  </head>
<body>
 <?php 
     session_start();
     
     @include("Connect.php");
     if(isset($_SESSION['dangnhap'])){
        $taikhoan = $_SESSION['dangnhap'];
     }

     if(isset($_POST["addcart"])){

      $productname = $_POST["nameproduct"];
      $productprice = $_POST["priceproduct"];
      $productimage = $_POST["imageproduct"];
      $productid = $_POST["idproduct"];
      $quantity = $_POST["quantityproduct"]; // 1

      $sql_select_giohang = mysqli_query($con , "SELECT * FROM  sanpham WHERE MASP = '$productid'");
      $row = mysqli_fetch_array($sql_select_giohang);
      if($row){
        
        $new_product = array(array('tensanpham' => $productname, 'giasanpham' => $productprice , 'hinhsanpham' => $productimage , 'soluong' => $quantity , 'masanpham' => $productid));

        if(isset($_SESSION['cart'])){
          $found = false;
          foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['tensanpham'] == $productname){
              $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' =>  $cart_item['soluong'] + 1 , 'masanpham' => $cart_item['masanpham']);
              $found = true;
            }else {
              $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' => $cart_item['soluong'], 'masanpham' =>$cart_item['masanpham']);
            }
          }
          
          if($found == false){
            $_SESSION['cart'] = array_merge($product , $new_product);
          }else {
            $_SESSION['cart'] = $product;
          }
        }else {
          $_SESSION['cart'] = $new_product;
        }
       
         
      }



      // if($count > 0){
      //     $row_sanpham = mysqli_fetch_array($sql_select_giohang);
      //     $flag = "Bi trung";
      //     $soluong = $row_sanpham['soluong'] + 1;
      //     $sql_addgiohang = mysqli_query($con ,"UPDATE giohang SET soluong = '$soluong' WHERE tensanpham = '$productname'");
      // }else {
      //     $flag = "Ko Bi trung";
      //     $soluong = $quantity;
      //     $sql_addgiohang = mysqli_query($con ,"INSERT INTO giohang(tensanpham , sanpham_id , giasanpham , hinhanh , soluong , matk)
      //     VALUES ('$productname' , '$productid' , '$productprice' , '$productimage' , ' $soluong' , '$taikhoan') ");

      // }

     
      };
      
    
           
    
    
    if(isset($_GET['cong'])){
      $tensp = $_GET['tensp'];
      foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['tensanpham'] != $tensp){
           $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' => $cart_item['soluong'] , 'masanpham' => $cart_item['masanpham']);
           $_SESSION['cart'] = $product;
        }else {
           $tangsoluong =  $cart_item['soluong'] + 1;
             $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' => $tangsoluong ,  'masanpham' => $cart_item['masanpham']);
           $_SESSION['cart'] = $product;
        }
      }
    }else if(isset($_GET['tru'])) {

      $tensp = $_GET['tensp'];
      foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['tensanpham'] != $tensp){
           $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' => $cart_item['soluong'] ,'masanpham' => $cart_item['masanpham']);
           $_SESSION['cart'] = $product;
        }else {
           $giamsoluong =  $cart_item['soluong'] - 1;
           if($cart_item['soluong'] > 1){
             $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' =>  $giamsoluong , 'masanpham' => $cart_item['masanpham']);
           }else {
             $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' =>  $cart_item['soluong'] , 'masanpham' => $cart_item['masanpham']);
           }

           $_SESSION['cart'] = $product;
        }
      }
    
    }else if (isset($_GET['xoa'])){

      $tensp = $_GET['tensp'];
      foreach($_SESSION['cart'] as $cart_item){
          if($cart_item['tensanpham'] != $tensp){
            $product[] = array('tensanpham' => $cart_item['tensanpham'] , 'giasanpham' => $cart_item['giasanpham'] , 'hinhsanpham' => $cart_item['hinhsanpham'] , 'soluong' => $cart_item['soluong'] , 'masanpham' => $cart_item['masanpham']);
          }
        }
        $_SESSION['cart'] = $product;
    }
    
   
 ?> 
    <?php 
    @include("header.php");
    
    ?>
<div class="cart">
    
       <div class="cart__wrapper">
         <div class="cart__left">
              <div class="cart__left__address">
                   <p>Giao hàng đến <strong>Hồ Chí Minh Quận 1</strong> </p>
                   <span>THAY ĐỔI</span>
              </div>

               <div class="cart__left__endow">
                 <div class="cart__left__endow__wrapper">
                  <div class="cart__left__endow__item">
                     <div class="cart__left__endow__item__img1">
                           <img src = "./assets/Img/check.png" alt="" />
                     </div>
                     <strong>Ưu đãi</strong>
                  </div>

                    <div class="cart__left__endow__item">
                      <div class="cart__left__endow__item__img2">
                            <img src= "./assets/Img/vanchuyencart.png" alt="" />
                      </div>
                     <p>Mua thêm 774,001 VND để được MIỄN PHÍ GIAO HÀNG (Tối đa 100,000)</p>
                    </div>

                 </div>
               </div>
             
                        <?php 
                          
                          $total = 0;
                          if(isset($_SESSION['cart']) && sizeof($_SESSION["cart"]) > 0){
                            for($i = 0 ; $i < sizeof($_SESSION["cart"]); $i++){
                              $total+= $_SESSION['cart'][$i]['giasanpham'] * $_SESSION['cart'][$i]['soluong'];
                                echo '
                                <div class="cart__item">
                                <div class="cart__item__wrapper">
                      
                                  <div class="cart__item__img">
                                       <img src= "./img/'.$_SESSION['cart'][$i]['hinhsanpham'].'.jpg" alt="" />
                                  </div>
                      
                                  <div class="cart__item__content">
                                      <div class="cart__item__content__top">
                                      <h4>'.$_SESSION['cart'][$i]['tensanpham'].'</h4>
                                      <form action=""  method="get">
                                                    <input hidden type="text"  name = "xoa" value="xoa">
                                                    <input hidden type="text"  name = "tensp"  value = '.$_SESSION["cart"][$i]["tensanpham"].' >
                                                    <button type = submit>
                                                          <img src= "./assets/Img/deletecart.png" alt="" />
                                                    </button>
                                              </form>
                                      </div>
                      
                                  
                                      <div class="cart__item__content__bottom">
                                              <div class="cart__item__content__bottom__item">
                                                Số lượng  
                                                <div class="cart__item__content__bottom__item__quantity">
                                                    <span class="cart__item__content__bottom__item__quantity__minus">
                                                    <form action=""  method = "get">
                                                            <input hidden type="text"  name = "tru" value="tru">
                                                            <input hidden type="text"  name = "tensp"  value = '.$_SESSION["cart"][$i]["tensanpham"].' >
                                                            <button type="submit" name = "trusp" class="bx bx-minus"></button>
                                                        </form>
                                                    </span>
                      
                                                      <span class="cart__item__content__bottom__item__quantity__input"   >
                                                            <strong>'.$_SESSION['cart'][$i]['soluong'].'</strong>
                                                      </span>
                      
                                                    <span class="cart__item__content__bottom__item__quantity__plus">
                                                        <form action="" method="get">
                                                            <input hidden type="text"  name = "cong" value="cong">
                                                            <input hidden type="text"  name = "tensp"  value = '.$_SESSION["cart"][$i]["tensanpham"].' >
                                                            <button type="submit" class="bx bx-plus"></button>
                                                        </form>
                                                    </span>
                                                </div>
                                              </div>
                      
                                              <div class="cart__item__content__bottom__item">
                                                      <strong>'.number_format($_SESSION['cart'][$i]['giasanpham']*$_SESSION['cart'][$i]['soluong'] , 0 ,',',',').' VNĐ</strong>
                                            </div> 
                                    </div>
                                  </div>
                                </div>
                            </div>
                                ';
                                          
                                
                            }
                          }else {
                             echo  '<img src= "./img/empty-cart.webp" alt="" />';
                          }
               ?>
            

                               
                
              

               <div class="cart__left__trade">
                 <div class="cart__left__trade__wrapper">
                       <div class="cart__left__trade__security">
                         <div class="cart__left__trade__security__img">
                              <img src= "./assets/Img/carttrade.png" alt="" />
                         </div>
                        <div class="cart__left__trade__security__content">
                                <strong>GIAO DỊCH AN TOÀN 100%</strong> 
                                Mã hóa SSL an toàn
                        </div>
                             
                       </div>

                       <div class="cart__left__trade__method">
                              <div class="cart__left__trade__method__item">
                                  <div class="cart__left__trade__method__item__img">
                                      <img src= "./assets/Img/credit.png" alt="" />
                                  </div>    
                                  <div class="cart__left__trade__method__item__content">
                                          <p>
                                              CREDIT/DEBIT
                                              CARD
                                          </p>
                                         
                                  </div>
                              </div>

                              <div class="cart__left__trade__method__item">
                                   <div class="cart__left__trade__method__item__img">
                                        <img src= "./assets/Img/zalopay.png" alt="" />
                                   </div> 
                                   <div class="cart__left__trade__method__item__content">
                                           <p>ZaloPay</p> 
                                  </div>
                              </div>

                              <div class="cart__left__trade__method__item">
                                <div class="cart__left__trade__method__item__img">
                                       <img src= "./assets/Img/cardon.png" alt="" />
                                </div>   
                                <div class="cart__left__trade__method__item__content">
                                           <p>COD</p> 
                                  </div>
                              </div>
                       </div>

                 </div>
               </div>
         </div>

         <div class="cart__right">
             <div class="cart__right__bill">
                 <div class="cart__right__bill__top">
                     <div class="cart__right__bill__top__item">
                       <strong>Tóm tắt đơn hàng</strong>
                     </div>

                     <div class="cart__right__bill__top__item">
                        <p>Tạm tính</p>
                        <p> <?php echo number_format($total , 0 ,',',',') ?> VND</p>
                     </div>

                     <div class="cart__right__bill__top__item">
                         <p>Phí giao hàng</p>
                         <p>Tính khi chọn hình thức giao hàng</p>
                     </div>
                 </div>

                 <div class="cart__right__bill__bottom">
                      <div class="cart__right__bill__bottom__item">
                           <strong>Tổng cộng</strong>
                           <strong> <?php echo number_format($total , 0 ,',',',') ?> VND</strong>
                      </div>
                 </div>
             </div>
             <form action="doan_thanhtoan.php">
           <?php 
             if(isset($_SESSION['cart']) && sizeof($_SESSION['cart'])>0){
                      echo '
                      <button style = " font-size: 14px ; background-color : yellow; padding : 20px 140px ; text-align : center ; with : 100% ; color : black" type = "submit" class="cart__right__btn">
                          TIẾP TỤC
                      </button>
                           
                      ';
             }else {
                      echo '
                      <button style = " background-color : yellow; padding : 20px 140px ; text-align : center ; with : 100% ; color : black"  disabled >
                          Giỏ hàng rỗng
                      </button>
                          
                      ';
             }
           ?>
             </form>
                
             </Button>
             <div class="cart__right__service">
                   <div class="cart__right__service__item">
                      <div class="cart__right__service__item__img">
                            <img src= "./assets/Img/30ngay.png" alt="" />
                      </div>
                        <p>30 ngày trả hàng</p>
                   </div>

                   <div class="cart__right__service__item">
                      <div class="cart__right__service__item__img">
                               <img src= "./assets/Img/vanchuyencart.png" alt="" />
                      </div>
                         <p>Miễn phí Vận chuyển cho Đơn trên 899k (Tối đa 100k)</p>
                   </div>

                   <div class="cart__right__service__item">
                     <div class="cart__right__service__item__img">
                             <img src= "./assets/Img/baohanhcart.png" alt="" />
                     </div> 
                         <p>Bảo hành 2 năm</p>
                   </div>
             </div>
             
             <div class="cart__right__coupon">
                <div class="cart__right__coupon__item">
                   <div class="cart__right__coupon__img">
                      <img src= "./assets/Img/cartcoupon.png" alt="" />
                   </div>
                    <p>Áp dụng mã giảm giá</p>
                </div>
                   <div class="cart__right__coupon__item">
                          <i class='bx bx-chevron-right'></i>
                   </div>
                 
             </div>
         </div>
       </div>
     </div>

   <?php 
      @include('footer.php');
   ?>  
   </div>
</body>
</html>
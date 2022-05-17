<?php 
      @include("Connect.php");
      session_start();
      if(isset($_POST["muahang"]) && isset ($_SESSION["dangnhap"])){
      
                echo json_encode(array(
                    'status' => 1,
                    'message' => "Thêm vào giỏ hàng thành công"
                ));
                // header("Location:index.php");
          }else {
                echo json_encode(array(
                    'status' => 0,
                    'message' => "Bạn phải đăng nhập trước khi mua hàng"
                ));
        }

     
    
?>

<?php 
      session_start();
      @include("Connect.php");
      if(isset($_POST["user"]) && isset($_POST["password"])){
       
          $user = $_POST["user"];
          $password = $_POST["password"];
          $sql = mysqli_query($con , "SELECT * FROM taikhoan WHERE MATK =  '".$user."' AND  MATKHAU = '".$password."' LIMIT 1  ");
          $sql_row = mysqli_fetch_array($sql);
          $count = mysqli_num_rows($sql);
           if($count > 0 ){
             if($sql_row["MAROLE"] == 'Admin'){
                 $_SESSION["admin"] = "admin";
                   echo json_encode(array(
                    'status' => 2,
                    'message' => "Chào Admin!"
                ));
                //     echo '<script type="text/javascript">
                //     location.href = "admin.php"
                // </script>';
   
   
             }else {

                  unset ($_SESSION['admin']);
                  $_SESSION['dangnhap'] = $user;
                  $_SESSION['matk'] =  $sql_row["MANGUOISUDUNG"];
                  echo json_encode(array(
                      'status' => 1,
                      'message' => "Đăng nhập thành công"
                  ));
                  // header("Location:index.php");
             }

               

                } else {
                echo json_encode(array(
                    'status' => 0,
                    'message' => "Sai thông tin đăng nhập"
                ));
        }

    }  
    
?>
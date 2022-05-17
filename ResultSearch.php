 
     <?php   
     @include("Connect.php");   
     if(isset($_GET["input"])){

         $search =  $_GET["input"];
     }  


     if(isset($_GET["page"])){
        $pageorder = $_GET["page"];
        
        }else {
            $pageorder = '';
        } 
    
        if($pageorder == '' || $pageorder == 1){
          $begin = 0;
        }else{
          $begin = ($pageorder*8)-8;
        
        }
    if($search == ''){

      if($_GET["pricerange"] == '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] == ' '){
         $from = 0;
         $to = 99999999;
         $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  GIA >= '$from'  AND  GIA <= '$to' LIMIT $begin,8");
         $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  GIA >= '$from'  AND  GIA <= '$to'");
        
      }else if($_GET["pricerange"] != '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] == ' '){
         $type = $_GET["typeproduct"];
         $price =  $_GET["pricerange"];
         $range = preg_split('[\s]' , $price);
         $from = 0;
         $to = 0;
         if($range[0]== "Từ"){
             $from = $range[1];
         }else {
             $range1 = preg_split('[\-]', $range[0]);
             $from = $range1[0];
             $to = $range1[1];
         }
        
         $to =  $to * 1000000;
         $from=  $from * 1000000;
         if($to==0){
             $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   GIA >= '$from'  LIMIT $begin,8 ");
             $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE GIA >= '$from' ");
         }else {
             $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  GIA >= '$from' AND  GIA <= '$to' LIMIT $begin,8 ");
             $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  GIA >= '$from' AND  GIA <= '$to' ");
         }
  
        
      }else if($_GET["pricerange"] == '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] != ' '){
         $from = 0;
         $to = 99999999;
         $type = $_GET["typeproduct"];
         $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE GIA >= '$from'  AND  GIA <= '$to'  AND  MALOAI = '".$type."' LIMIT $begin,8 ");
         $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   GIA >= '$from'  AND  GIA <= '$to'  AND  MALOAI =  '".$type."'");
        
  
      }else if ($_GET["pricerange"] != '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] != ' '){
         $type = $_GET["typeproduct"];
         $price =  $_GET["pricerange"];
         $range = preg_split('[\s]' , $price);
         $from = 0;
         $to = 0;
         if($range[0]== "Từ"){
             $from = $range[1];
         }else {
             $range1 = preg_split('[\-]', $range[0]);
             $from = $range1[0];
             $to = $range1[1];
         }
        
         $to =  $to * 1000000;
         $from=  $from * 1000000;
         if($to==0){
             $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   GIA >= '$from'  AND  MALOAI =  '".  $type  ."'  LIMIT $begin,8");
             $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   GIA >= '$from'  AND  MALOAI =  '".  $type  ."'  ");
         }else {
             $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   GIA >= '$from' AND  GIA <= '$to'   AND  MALOAI =  '".  $type  ."' LIMIT $begin,8 ");
             $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  GIA >= '$from' AND  GIA <= '$to'   AND  MALOAI =  '".  $type  ."'  ");
         }
  
        
      }
    }else {
      if($_GET["pricerange"] == '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] == ' '){
        $from = 0;
        $to = 99999999;
        $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from'  AND  GIA <= '$to' LIMIT $begin,8");
        $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from'  AND  GIA <= '$to'");
       
     }else if($_GET["pricerange"] != '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] == ' '){
        $type = $_GET["typeproduct"];
        $price =  $_GET["pricerange"];
        $range = preg_split('[\s]' , $price);
        $from = 0;
        $to = 0;
        if($range[0]== "Từ"){
            $from = $range[1];
        }else {
            $range1 = preg_split('[\-]', $range[0]);
            $from = $range1[0];
            $to = $range1[1];
        }
       
        $to =  $to * 1000000;
        $from=  $from * 1000000;
        if($to==0){
            $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from'  LIMIT $begin,8 ");
            $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from' ");
        }else {
            $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from' AND  GIA <= '$to' LIMIT $begin,8 ");
            $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from' AND  GIA <= '$to' ");
        }

       
     }else if($_GET["pricerange"] == '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] != ' '){
        $from = 0;
        $to = 99999999;
        $type = $_GET["typeproduct"];
        $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from'  AND  GIA <= '$to'  AND  MALOAI =  '".  $type  ."' LIMIT $begin,8 ");
        $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from'  AND  GIA <= '$to'  AND  MALOAI =  '".  $type  ."'");
       

     }else if ($_GET["pricerange"] != '-- Chọn khoảng giá --' &&  $_GET["typeproduct"] != ' '){
        $type = $_GET["typeproduct"];
        $price =  $_GET["pricerange"];
        $range = preg_split('[\s]' , $price);
        $from = 0;
        $to = 0;
        if($range[0]== "Từ"){
            $from = $range[1];
        }else {
            $range1 = preg_split('[\-]', $range[0]);
            $from = $range1[0];
            $to = $range1[1];
        }
       
        $to =  $to * 1000000;
        $from=  $from * 1000000;
        if($to==0){
            $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from'  AND  MALOAI =  '".  $type  ."'  LIMIT $begin,8");
            $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE  TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from'  AND  MALOAI =  '".  $type  ."'  ");
        }else {
            $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from' AND  GIA <= '$to'   AND  MALOAI =  '".  $type  ."' LIMIT $begin,8 ");
            $sql_pagination = mysqli_query($con , "SELECT *  FROM sanpham  WHERE   TENSP  LIKE  '" . "%"  . $search . "%" ."'  AND GIA >= '$from' AND  GIA <= '$to'   AND  MALOAI =  '".  $type  ."'  ");
        }

       
     }
   
  }
   

     
    
    
    while($row_product = mysqli_fetch_array($sql_search)){
         
      
      ?>
       <div class="product__cart col-3">
               <div class="product__cart__top">
                       <div class="product__cart__top__main">
               
                                               <div class="bg-prouduct-bg " >
                                                       <img src= './img/<?php echo $row_product["HINH"]?>.jpg  ' ></img>
                                               </div>
                                           
                       </div>
 
                       
               </div>
 
               <div class="product__cart__bottom">
                       <div class="product__cart__bottom__wrapper">
                               <span class="product__cart__bottom__price">
                                   <?php echo $row_product["GIA"] . " " . "VNĐ" ?>
                               </span>
 
                               <div class="product__cart__bottom__name">
                                   <?php echo $row_product["TENSP"]  ?>
                               </div>
 
                               <div class="product__cart__bottom__rate">
                                           <span class="product__cart__bottom__rate__wrapper" >
                                           4/5  <div class="product__cart__bottom__rate__wrapper__img">
                                                       <img src = './assets/Img/start.png' ></img>
                                               </div> 
                                           </span> 
                               </div>
 
                               <form action="Productdetail.php" method="post">
 
                                   <input type="hidden" value= "<?php echo $row_product["MASP"]?>"  name = "masp" >
 
                                   <button type = "submit" class="product__cart__bottom__button">
                                          XEM CHI TIẾT
                                   </button>
                               </form>
                           </div>
               </div>
      </div>
 
    <?php 
      }
            
      ?>
       
    <div  class="pagination"> 

                <?php 


             
                $pagenum = ceil(mysqli_num_rows( $sql_pagination)/8);
                if($pagenum < 2) return;

                for($i = 1 ; $i <= $pagenum ; $i++) {
                
                echo "<button style = 'text-align: center'>$i</button>";
                }
                ?>
                
     </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
       
       $(".pagination").on("click" , "button" , function(e) {
            e.preventDefault();
            pagenum = $(this).text();

            console.log(pagenum);
            urlParams = new URLSearchParams(window.location.search);
            search =  urlParams.get('input');
            var objects = $(".checked")
            for (var obj of objects) {
              if(obj.checked){
                typeproduct = obj.value;
                break;
              }else {
                typeproduct = ' ';
              }
              } 

          
                if( $("select.price").change){
                      
                  pricerange =  $("select.price").children("option:selected").val();
                }else {
                  pricerange = ' ';
                }
     

            $.ajax({
                url : "ResultSearch.php",
                type : "get",
                data : {
                    page : pagenum,
                    input : search,
                    typeproduct : typeproduct,
                    pricerange : pricerange,
                },

                success: function (data) {
                  $(".catalog__content").html(data);
                  console.log(data);
                }

            })
         
           
        });
</script>
  

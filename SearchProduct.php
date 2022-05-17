<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Sass/Css/search.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/productlist.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/grid.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>

  

<script>
         function Checked(){
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
                  typeproduct : typeproduct,
                  pricerange : pricerange,
                  input : search,
                  
              },

              success: function (data) {
                 $(".catalog__content").html(data);
                 console.log(data);
              }

          })

                   
             }  






    </script>



 <?php 
   @include('Connect.php');
   @include('header.php');

  if(isset($_GET["input"])){

    $search =  $_GET["input"];
   }   

   $pricerange = '';
   $typeproduct = '';


   if(isset($_POST["page"])){
    $pageorder = $_POST["page"];
    
    }else {
        $pageorder = '';
    } 

    if($pageorder == '' || $pageorder == 1){
      $begin = 0;
    }else{
      $begin = ($pageorder*8)-8;
    
    }
?>

<div class="catalog">

<div class="catalog__top">
    <div class="catalog__top__item">
           <h5>BỘ LỌC</h5>
            <?php 
                if(isset($_GET["search"])){
                  echo $_GET["search"];
                }
            ?>
           <div   class="catalog__top__item__img"  >
                  <img src= "./assets/Img/tooglesort.png" alt=""  />
           </div>
           

    </div>

    <div class="catalog__top__item">
      <div class="catalog__top__item__img" >
             <img src= "./assets/Img/arrowcatalog.png" alt=""  />
      </div>
           
           <h4>KHOẢNG GIÁ</h4>
             <select onclick = Checked() class = "price"> 
                  <?php 
                     $sql_pricerange = mysqli_query($con, "SELECT * FROM gia" );
                     echo "<option >-- Chọn khoảng giá --</option>";
                     while($row_pricerange = mysqli_fetch_assoc($sql_pricerange)){
                          echo "<option class= 'combobox'  value = '$row_pricerange[khoang]'>$row_pricerange[khoang]</option>";
                     }
                  ?>
             </select>

             
    </div>
</div>

<div class="catalog__bottom">
   <div class="catalog__filter">
      <div class="catalog__filter__wrapper">

          <div class="catalog__filter__widget">
   <div class="catalog__filter__widget__title">

         <p>Sản Phẩm</p>
 </div>

        <?php 
            $sql_catalog =  mysqli_query($con , "SELECT *  FROM nhasanxuat");
            while($row_catalog = mysqli_fetch_array($sql_catalog)){
              
               echo "<br/>" . " <input onclick = Checked()  class = 'checked'   value= '$row_catalog[TENNSX]' type= 'radio' name = 'test'/>" . $row_catalog['TENNSX'] . "<br/>";
            }
        ?>

          </div>
           </div>
  <input type="hidden" name=""/>
  
</div>


  

   <div class="catalog__content">

        <?php   
     @include("Connect.php");   
     if(isset($_GET["input"])){

         $search =  $_GET["input"];
     }  
    
    
      $sql_search = mysqli_query($con , "SELECT *  FROM sanpham  WHERE TENSP  LIKE  '" . "%"  . $search . "%"  . "'  LIMIT $begin,8 ");
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


         $sql_product = mysqli_query($con , "SELECT *  FROM sanpham  WHERE TENSP  LIKE  '" . "%"  . $search . "%"  . "'");
          $pagenum = ceil(mysqli_num_rows($sql_product)/8);
          if($pagenum < 2) return;

          for($i = 1 ; $i <= $pagenum ; $i++) {
              
              echo "<button style = 'text-align: center'>$i</button>";
          }
          ?>
              
          </div>

      </div> 



    </div>

</div>

  
  <?php 

         @include("footer.php");  

  ?>



<script   type="text/javascript"> 

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
     
 
</body>
</html>
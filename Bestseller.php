<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Sass/Css/bestseller.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./Sass/Css/reponsive.css?v= <?php echo time(); ?>">
</head>
<body>
    <?php 
     
       @include('Connect.php');
       if(isset($_GET["page"])){
             $pageorder = $_GET["page"];
             echo $pageorder;
       }else {
             $pageorder = '';
       } 

       if($pageorder == '' || $pageorder == 1){
            $begin = 0;
       }else{
            $begin = ($pageorder*6)-6;
          
       }

       $sql_category = mysqli_query($con , 'SELECT TENNSX FROM nhasanxuat ');
      
    ?>
    <section>
          <h3>Sản phẩm nổi bật</h3>
         <img src="https://cdn.tgdd.vn/Files/2015/11/02/732704/banner-samsung.jpg" alt="">

            <section id="best-sale" class="best-sale">
              <div style="margin: 0 ; width : 97% ; padding : 0; "  class="container">
              <div class="section-title" >
                <h3  style="text-align: center" >DANH SÁCH SẢN PHẨM</h3>
                <div class="title-line"></div>
            </div>
            <div class="menu-best-sale-title row">

                <?php 
                    while($row_category = mysqli_fetch_array($sql_category)){         
                ?>
                        <div id="nu" class="menu-best-sale-title-item" >
                             <a href="?product=<?php echo $row_category["TENNSX"] ?>"><?php echo $row_category["TENNSX"] ?></a>
                       </div>
                <?php 
                    }
                ?>
            </div>
           

            <div style="margin-top : 20px" id="content"  class="menu-best-sale-content row ">
                <?php 
                  if(isset($_GET["product"])){
                      $producttpe = $_GET["product"];
                  }else{
                    $producttpe = "Iphone";
                  }
                   $sql_product = mysqli_query($con , "SELECT * FROM sanpham  WHERE MALOAI = '".  $producttpe ."' LIMIT $begin,6 ");
                  
                   while($row_product = mysqli_fetch_array($sql_product)){
                   
                    
                        
                   
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
                        <div style = "display : block ; margin-left : 20px" class="pagination">

                            <?php 
                        
                            
                            $sql_productlength = mysqli_query($con , "SELECT * FROM sanpham  WHERE MALOAI = '". $_GET["product"]."' ");
                            $pagenum = ceil(mysqli_num_rows($sql_productlength)/8);
                            if($pagenum < 2) return;
                            
                            for($i = 1 ; $i <= 2 ; $i++) {
                                
                                echo "<button style = 'text-align: center'>$i</button>";
                            }
                            ?>
                            
                        </div>
            </div>

        </div>
    </section>
    </section>

    <script>

        // $(".menu-best-sale-title-item").on("click", "a" , function(e){
        //     e.preventDefault();
        //     urlParams = new URLSearchParams(window.location.search);
        //     product = urlParams.get('product');
         
        //     $.ajax({
        //         url : "Bestseller.php",
        //         type : "get",
        //         data : {
        //            product : product,
        //         },


        //         success : function(data){
        //             $("section").html(data);
        //         }
        //     })
        // })

        $(".pagination").on("click" , "button" , function(e) {
            e.preventDefault();
            pagenum = $(this).text();
            console.log(pagenum);
            urlParams = new URLSearchParams(window.location.search);
            product = urlParams.get('product');
            $.ajax({
                url : "Bestseller.php",
                type : "get",
                data : {
                    page : pagenum,
                    product : product,
                    
                },

                success: function (data) {
                   $("#content").html(data);
                   console.log(data);
                }

            })
        });


    </script>

</body>
</html>
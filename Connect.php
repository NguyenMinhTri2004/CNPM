<?php 

     $con = mysqli_connect("localhost" , "root" , "" , "web2");

     // check conection 


     if(mysqli_connect_error()){
         echo "Failed to conenct to MySql: " . mysqli_connect_error();
     }

?>
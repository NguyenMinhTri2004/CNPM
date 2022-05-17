<?php
    if(isset($_GET['id']) && isset($_GET['stcType'])) {
        if($_GET['stcType'] == 1) {
            include 'mostSoldProduct.php';
        }
        else if($_GET['stcType'] == 2) {
            include 'fiveProductMostSeen.php';
        }
        else if($_GET['stcType'] == 3) {
            include 'productByManufacture.php';
        }
        else if($_GET['stcType'] == 4) {
            include 'sales.php';
        }
    }
?>
<?php
    include 'show-content.php';
    if(isset($_GET['id'])) {
        toTable($_GET['id']);
    }
    else {
        toTable('CV01');
    }

    if(isset($_GET['showDetail'])) {
        include 'InvoiceDetail.php';
    }
?>
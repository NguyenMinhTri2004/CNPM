<?php
    $id = $_GET['showDetail'];
    $result = Connection::excuteQuery("SELECT * FROM `chitietdonhang` WHERE MADH = '" . $id . "'");
    // echo "SELECT * FROM `chitietdonhang` WHERE MAHD = '" . $id . "'";
    $invoiceDetailList = array();
    while($row = mysqli_fetch_array($result)) {
        $temp = array();
        $sql = Connection::excuteQuery("SELECT TENSP, HINH FROM `sanpham` WHERE MASP = '" . $row['MASP'] . "'");
        $product = mysqli_fetch_assoc($sql);
        array_push($invoiceDetailList, array("TENSP" => $product['TENSP'], "HINH" => $product['HINH'], "SOLUONG" => $row['SOLUONG'], "THANHTIEN" => $row['THANHTIEN']));
    }
    $str = "<div id=\"invoice_detail\"><div id=\"invoice_detail_form\">";
    $str .= "<div id=\"invoice_detail_header\"><span>Hóa đơn ". substr($id, strlen($id) - 2, strlen($id) - 1) ."</span><a href=\"admin.php?id=". $_GET['id'] . "\" id=\"invoice_detail_form_close\">X</a></div>";
    $str .= "<div id=\"invoice_detail_body\"><table><tr class=\"table-row\"><td class=\"table-cell table-column\">TENSP</td><td class=\"table-cell table-column\">HINH</td><td class=\"table-cell table-column\">SOLUONG</td><td class=\"table-cell table-column\">THANHTIEN</td></tr><tbody>";
    for($index = 0; $index < count($invoiceDetailList); $index+=1) {
        $str .= "<tr class=\"table-row\">";
        $str .= "<td class=\"table-cell table-column\">". $invoiceDetailList[$index]["TENSP"] ."</td>";
        $str .= "<td class=\"table-cell table-column\"><img style=\"width: 120px;\" src=\"img/".$invoiceDetailList[$index]["HINH"].".JPG\"></td>";
        $str .= "<td class=\"table-cell table-column\">". $invoiceDetailList[$index]["SOLUONG"] ."</td>";
        $str .= "<td class=\"table-cell table-column\">". $invoiceDetailList[$index]["THANHTIEN"] ."</td>";
        $str .= "</tr>";
    }
    $str .= "</tbody></table></div></div></div>";
    echo $str;
?>

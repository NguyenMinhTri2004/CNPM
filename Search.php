<?php
    $id;
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    else {
        $id = "CV01";
    }
    // echo $id;
    $str = '<div id="search">';
    $str.= '<form action="Xuly.php?action=search&id='.$id.'" method="post"  id="search_form">';
    $str.= '<div id="wrap-search">';
    $str.=     '<input id= "search-input" name="search" type="text" placeholder="Search">';
    $str.=     '<button type="submit" class="sub_search_btn"><i class=\'bx bx-search-alt\' ></i></button>';
    $str.=     '<button type="submit" formaction="Xuly.php?id='. $id .'&action=delSearch" class="sub_search_btn"><i class=\'bx bx-x\'></i></button>';
    $str.= '</div>';
    $str.= '</form>';
    if($id == "CV04") {
        $str.=  '<form action="Xuly.php?action=searchDay&id='.$id.'" method="post" id="day-search_form">';
        $str.=      '<span>Từ</span>';
        $str.=      '<input class="day-search-input" name="fromDay" type="text" placeholder="DD">/';
        $str.=        '<input class="day-search-input" name="fromMonth" type="text" placeholder="MM">/';
        $str.=      '<input class="day-search-input" name="fromYear" type="text" placeholder="YYYY">';
        $str.=      '<span>Đến</span>';
        $str.=      '<input class="day-search-input" name="toDay" type="text" placeholder="DD">/';
        $str.=      '<input class="day-search-input" name="toMonth" type="text" placeholder="MM">/';
        $str.=      '<input class="day-search-input" name="toYear" type="text" placeholder="YYYY">';
        $str.=      '<button type="submit" class="sub_search_btn"><i class=\'bx bx-search-alt\' ></i></button>';
        $str.=      '<button type="submit" formaction="Xuly.php?id='. $id .'&action=delSearch" class="sub_search_btn"><i class=\'bx bx-x\' ></i></button>';
        $str.=  '</form>';
    } 
    $str.= '</div>';
    echo $str;
?>


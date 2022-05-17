<?php
    @include('connection.php');
    $sql = "Select * from congviec";
    $result = Connection::excuteQuery($sql);
    $icon = array("bx bx-mobile", "bx bx-happy", "bx bx-user-circle", "bx bx-dollar-circle", "bx bx-line-chart");
    $str = "<ul>";
    $totalRow = mysqli_num_rows($result);
    $index = 0;
    while($row = mysqli_fetch_array($result)) {
        if(strcmp($row['MACV'], "CV05") == 0) {
            $str .= "<li><i class='menu-left-icon ". $icon[$index] ."'></i><span>". $row['TENCV'] ."</span></li>";
        } else {
            $str .= "<li><i onclick=\"window.location.href='?id=". $row['MACV'] ."';\" class='menu-left-icon ". $icon[$index] ."'></i><span onclick=\"window.location.href='?id=". $row['MACV'] ."';\">". $row['TENCV'] ."</span></li>";
        }
        $index++;
    }
    $str .= "</ul>";
    echo $str;
?>
<?php
    if (isset($_GET["action"])) {
        $action = $_GET['action'];
        $reID = $_GET["id"];
        @include('infor.php');
        $connection = mysqli_connect($serverName, $userName, $password, $dbname);
        //-------------- edit----------------
        if ($action == "edit") {
            $tableName = $_GET["table"];
            $sql = "SELECT *  FROM ".$tableName;
            $result = mysqli_query($connection, $sql);
            $idType = $_GET["key"];
            $row ;
            while($row = mysqli_fetch_array($result)) {
                if($row[0] == $_GET["key"]) {
                    break;
                }
            }

            $str = '<div id="form_wrapper">';
            $str.=            '<div id="form">';
            $str.=          '<div id="form_header">';
            $str.=              '<p>Thông tin</p>';
            $str.=                  '<a href="admin.php?id='.$reID. '"id="form_close">X</a>';
            $str.=          '</div>';
            $str .= '<form method="post" action="Xuly.php?action=' . $action . '&table='.$tableName.'&id='.$reID.'" >';
            $str.= '<div id="form_body">';
            $columnNames = Connection::excuteQuery("
                    SELECT COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = N'".$_GET["table"]."' AND TABLE_SCHEMA = '".$dbname."'
            ");
            while($colName = mysqli_fetch_array($columnNames)) {
                $str .= '<div class="body_content">';
                $str .= '<label for="'.$colName["COLUMN_NAME"].'">'.$colName["COLUMN_NAME"].': </label>';
                $str .= ' <input name="'.$colName["COLUMN_NAME"].'" type="text" value= '.$row[$colName["COLUMN_NAME"]].' >';
                $str .= '</div>';
                                        }
            $str .= '<button name="btn_submit" type="submit" id="form_accept"><i class=\'bx bx-check-circle\'></i></button>';
            $str .= '  </div></div></div>';
            echo $str;
        }


        //----------add--------------------
        if ($action == "add") {
            $tableName = "";
            if($id == "CV01") {
                $tableName = "sanpham";
            }
            else if($id == "CV02") {
                $tableName = "nhanvien";
            }
            else if($id == "CV03") {
                $tableName = "taikhoan";
            }
            else if($id == "CV04") {
                $tableName = "donhang";
            }

            $sql = "SELECT *  FROM ".$tableName;
            $result = mysqli_query($connection, $sql);
            $str = '<div id="form_wrapper">';
            $str.=            '<div id="form">';
            $str.=          '<div id="form_header">';
            $str.=              '<p>Thông tin</p>';
            $str.=                  '<a href="admin.php?id='.$reID. '"id="form_close">X</a>';
            $str.=          '</div>';
            $str .= '<form method="post" action="Xuly.php?action=' . $action . '&table='.$tableName.'&id='.$reID.'" >';
            $str.= '<div id="form_body">';
            $columnNames = Connection::excuteQuery("
                    SELECT COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = N'".$tableName."' AND TABLE_SCHEMA = '".$dbname."'
                ");
                while($colName = mysqli_fetch_array($columnNames)) {
                    $str .= '<div class="body_content">';
                    $str .= '<label for="'.$colName["COLUMN_NAME"].'">'.$colName["COLUMN_NAME"].': </label>';
                    $str .= ' <input name="'.$colName["COLUMN_NAME"].'" type="text"  >';
                    $str .= '</div>';
                                            }
                $str .= '<button name="btn_submit" type="submit" id="form_accept"><i class=\'bx bx-check-circle\'></i></button>';
                $str .= '  </div></div></div>';
                echo $str;
        }
        //-------------------delete---------------------------------
        if ($action == "delete" ) {
            $key = $_GET["key"];
            $table =  $_GET["table"];
            $str = '<div id="form_wrapper">';
            $str.=     '<div id="form">';
            $str.=          '<div id="form_header">';
            $str.=              '<p>CHẮC CHẮN XÓA?</p>';
            $str.=                  '<a href="admin.php?id='.$reID. '"id="form_close">X</a>';
            $str.=          '</div>';
            $str.=          '<div id="form_del_body">';
            $str.=              '<div id="accept">';
            $str.=                      '<a href="Xuly.php?id='.$reID. '&key='.$key.'&table='.$table.'&action=delete"><i class=\'bx bx-check\'></i></a>';
            $str.=              '</div>';
            $str.=              '<div id="decline">';
            $str.=                      '<a href="admin.php?id='.$reID. '"><i class=\'bx bx-x\'></i></a>';
            $str.=              '</div>';
            $str.=          '</div>';
            $str.=      '</div>';
            $str.='</div>';
            echo $str;
        }

  
    }
?>





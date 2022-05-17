<link rel="stylesheet" href="./admin.css?<?php echo time(); ?>">
<?php
    @include("connection.php");
    @include("infor.php");
    if(isset($_GET["action"])) {
        $searchOutput = array();
        $connection = mysqli_connect($serverName, $userName, $password, $dbname);
        
        //---------------edit--------------
        if($_GET["action"] == "edit") {
            if(isset($_POST["btn_submit"])) {
                $tableName = $_GET["table"];
                $columnNames = Connection::excuteQuery("
                    SELECT COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = N'".$tableName."' AND TABLE_SCHEMA = '".$dbname."'
                ");
                $update = 'UPDATE '.$tableName.' SET ';
                $index = 0;
                $colNameID="";
                while($colName = mysqli_fetch_array($columnNames)) {
                    $update .= ' '.$colName["COLUMN_NAME"].' = \''.$_POST[$colName["COLUMN_NAME"]].'\' , '; 
                    if ($index == 0) {
                        $colNameID = $colName[$index];
                    }
                    $index .= 1;
                }
                // echo $_POST["MASP"];
                $newUpdate = substr($update, 0, -2);
                $connection = mysqli_connect($serverName, $userName, $password, $dbname);

                $newUpdate .= 'WHERE '.$colNameID. '= \''.$_POST[$colNameID].'\';';
                mysqli_query($connection,$newUpdate);        
                header("Location: ./admin.php?id=".$_GET['id']);
            }
        }
        //-----------------------add---------------
        else if ($_GET["action"] == "add") {
            if(isset($_POST["btn_submit"])) {
                $tableName = $_GET["table"];
                $columnNames = Connection::excuteQuery("
                    SELECT COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = N'".$tableName."' AND TABLE_SCHEMA = '".$dbname."'
                ");
                $insert = 'INSERT INTO '.$tableName.'( ';
                while($colName = mysqli_fetch_array($columnNames)) {
                    $insert .= ' '.$colName["COLUMN_NAME"].', ';
                }
                $insert = substr($insert, 0, -2);
                $insert .= ' ) VALUES ( ';
                $columnNames = Connection::excuteQuery("
                    SELECT COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = N'".$tableName."' AND TABLE_SCHEMA = '".$dbname."'
                ");
                while($colName = mysqli_fetch_array($columnNames)) {
                    $insert .= '\''.$_POST[$colName["COLUMN_NAME"]].'\' , ';
                }
                $insert = substr($insert, 0, -2);
                $insert .= ');';
                mysqli_query($connection,$insert);
            }
        }
        

        //----------------del-------------------
        else if ($_GET["action"] == "delete") {
            $table = $_GET["table"];
            $key = $_GET["key"];
            $columnNames = Connection::excuteQuery("
                    SELECT COLUMN_NAME
                    FROM INFORMATION_SCHEMA.COLUMNS
                    WHERE TABLE_NAME = N'".$table."' AND TABLE_SCHEMA = '".$dbname."'
            ");
            $index = 0;
            $colNameID="";
            while($colName = mysqli_fetch_array($columnNames)) {
                if ($index == 0) {
                    $colNameID = $colName[$index];
                }
                $index .= 1;
            }
                    
            $del = 'DELETE FROM '.$table.' WHERE '.$colNameID.'  = \''.$key .'\' ';
            // echo $del;
            mysqli_query($connection,$del);
        }

        //-----------search----------------
        if ($_GET["action"] == "search") {
            $id=$_GET["id"];
            $searchData = $_POST["search"];
            // echo $searchData;
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
            // SELECT id FROM groups WHERE name ILIKE 'Administrator'
            $select = 'SELECT * FROM '.$tableName.' WHERE ';
            $columnNames = Connection::excuteQuery("
                SELECT COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_NAME = N'".$tableName."' AND TABLE_SCHEMA = '".$dbname."'
            ");
            $searchData = strtolower($searchData);
            $colArray = array();
            while($colName = mysqli_fetch_array($columnNames)) {
                $select .= ' LOWER('.$colName["COLUMN_NAME"].') LIKE \'%'.$searchData.'%\' OR ';
                array_push($colArray, $colName["COLUMN_NAME"]);
            }
            $select = substr($select, 0, -3);
            // // echo $select;
            // $result = Connection::excuteQuery($select);
            // $select = str_replace(" ", ".",$select);
            // $select = str_replace("'", "-",$select);
            // $array = array();
            // while($row = mysqli_fetch_array($result)) {
            //     foreach ($colArray as $key) {
            //         array_push($array, array($key => $row[$key]));
            //     }
            // }
            $cookie_name = "sql";
            $cookie_value = $select;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
            // $_POST['sql'] = $select;
            header("Location: ./admin.php?id=".$_GET['id']);

            
            // $columnNames = Connection::excuteQuery("
            //     SELECT COLUMN_NAME
            //     FROM INFORMATION_SCHEMA.COLUMNS
            //     WHERE TABLE_NAME = N'".$tableName."' AND TABLE_SCHEMA = '".$dbname."'
            // ");
            // $str = "<div id='table-wrapper'><table><thead><tr class='table-row'>";
            // $nameArray = array();
            // while($row = mysqli_fetch_array($columnNames)) {
            //     array_push($nameArray, $row["COLUMN_NAME"]);
            //     $str .= '<th class="table-cell table-column">'.$row["COLUMN_NAME"].'</th>';
            // }
            // $str .= "</tr></thead><tbody>";
            // while($row = mysqli_fetch_array($result)) {
            //     $str .= "<tr class='table-row'>";
            //     foreach ($nameArray as $value) {
            //         if (strcmp($value, 'HINH') == 0) {
            //             $str .= '<td class="table-cell table-column"><img style="width: 120px;" src="img/'.$row[$value].'.JPG"></td>';
            //         }
            //         else {
            //             $str .= '<td class="table-cell table-column">'.$row[$value].'</td>';
            //         }
            //     }
            //     // echo $tableName;
            //     $str .= "<td class=\"table-cell table-column edit-icon\">" . "<a href='?show=form&id=".$id."&key=". $row[0]. "&action=edit&table=". $tableName. "'><i class='bx bxs-brightness bx-flip-vertical' ></i></a>" ."</td>";
            //     $str .= "<td class=\"table-cell table-column del-icon\">" . "<a href='?show=form&id=".$id."&key=". $row[0]. "&action=delete&table=". $tableName. "'><i class='bx bxs-trash'></i></a>" ."</td>";
            //     $str .= "</tr>";
            // }
            // $str .= "</tbody></table></div>";
            // echo $str;
        }

        if($_GET["action"] == "searchDay") {
            $tableName = "donhang";
            $select = "
                SELECT *
                FROM ". $tableName ."
                WHERE THOIGIANDATHANG >= '". $_POST['fromYear'] . "-" . $_POST['fromMonth'] . "-" . $_POST['fromDay'] ."' AND
                      THOIGIANDATHANG <= '". $_POST['toYear'] . "-" . $_POST['toMonth'] . "-" . $_POST['toDay'] ."'
            ";
            $cookie_name = "sql";
            $cookie_value = $select;
            setcookie($cookie_name, $cookie_value, time() + (60), "/");
            header("Location: ./admin.php?id=".$_GET['id']);
        }

        if($_GET["action"] == "delSearch") {
            setcookie("sql", "", time()-60, "/", "", 0);
            header("Location: ./admin.php?id=".$_GET['id']);
        }
    }
?>
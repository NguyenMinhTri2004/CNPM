<?php 
    function toTableName($id) {
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
        return $tableName;
    }

    function toTable($id) {
        include 'infor.php';
        $tableName = toTableName($id);
        if(!(strcmp("", $tableName) == 0)) {
            if(isset($_COOKIE['sql'])) {
                $sql = $_COOKIE['sql'];
                $result = Connection::excuteQuery($sql);
            }
            else {
                $result = Connection::excuteQuery("Select * from " . $tableName);
            }
            $columnNames = Connection::excuteQuery("
                SELECT COLUMN_NAME
                FROM INFORMATION_SCHEMA.COLUMNS
                WHERE TABLE_NAME = N'".$tableName."' AND TABLE_SCHEMA = '".$dbname."'
            ");
            $str = "<div id='table-wrapper'><table><thead><tr class='table-row'>";
            $nameArray = array();
            while($row = mysqli_fetch_array($columnNames)) {
                array_push($nameArray, $row["COLUMN_NAME"]);
                $str .= '<th class="table-cell table-column">'.$row["COLUMN_NAME"].'</th>';
            }
            $str .= "</tr></thead><tbody>";
            while($row = mysqli_fetch_array($result)) {
                $str .= "<tr class='table-row'>";
                foreach ($nameArray as $value) {
                    if (strcmp($value, 'HINH') == 0) {
                        $str .= '<td class="table-cell table-column"><img style="width: 120px;" src="img/'.$row[$value].'.JPG"></td>';
                    }
                    else {
                        $str .= '<td class="table-cell table-column">'.$row[$value].'</td>';
                    }
                }
                // echo $tableName;
                $str .= "<td class=\"table-cell table-column edit-icon\">" . "<a href='?show=form&id=".$id."&key=". $row[0]. "&action=edit&table=". $tableName. "'><i class='bx bxs-brightness bx-flip-vertical' ></i></a>" ."</td>";
                $str .= "<td class=\"table-cell table-column del-icon\">" . "<a href='?show=form&id=".$id."&key=". $row[0]. "&action=delete&table=". $tableName. "'><i class='bx bxs-trash'></i></a>" ."</td>";
                if($tableName == "donhang") {
                    $str .= "<td class=\"table-cell table-column open-icon\"><a href=\"admin.php?id=CV04&showDetail=".$row[0]."\"><i class='bx bx-folder-open'></i></a></td>";
                }
                $str .= "</tr>";
            }
            $str .= "</tbody></table></div>";
            echo $str;
            $_POST['sql'] = $str;
        }
    }

    if(isset($_GET['show'])) {
        @include("form.php");
    }
?>
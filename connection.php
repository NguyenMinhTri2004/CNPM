<?php
    class Connection {
        public static function excuteQuery($sql) {
            @include('infor.php');
            $connection = mysqli_connect($serverName, $userName, $password, $dbname);
            $result = mysqli_query($connection, $sql);
            if(!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
            return $result;
        }
    }
?>
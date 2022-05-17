<?php
    function toTotalPriceOfDay($day) {
        $sql = "SELECT SUM(`TONGTIEN`) as `Total` FROM `donhang` WHERE `THOIGIANDATHANG` = '" . $day ."'";
        $result = Connection::excuteQuery($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['Total'];
    }
    $sql = 
        "SELECT DISTINCT `THOIGIANDATHANG` as `Day`
        FROM `donhang`
        ORDER BY `THOIGIANDATHANG` ASC";
    $dayListSQL = Connection::excuteQuery($sql);
    $dayList = array();
    while($row = mysqli_fetch_array($dayListSQL)) {
        array_push($dayList, $row['Day']);
    }
    $array = array();
    foreach($dayList as $day) {
        array_push($array, array("x" => $day, "y" => toTotalPriceOfDay($day)));
    }
?>

<script>
    function SQLDateToJSDate(SQLDate) {
        var JSDate = SQLDate.split("-");
        return new Date(JSDate[0],JSDate[1]-1, JSDate[2]);
    }

    function toJSArray(PHPArray) {
        var array = [];
        PHPArray.forEach(element => {
            array.push({
                'x': SQLDateToJSDate(element.x),
                'y': element.y 
            });
        });
        return array;
    }

    function toColumnChart(array) {
        var day = new Date()
        var today = day.getDate() + "/" + (day.getMonth()+1) + "/" + day.getFullYear()
        var chart = new CanvasJS.Chart("stcContainer", {
            animationEnabled: true,
            title: {
                text: "Doanh thu theo ngày"
            },
            // axisX: {
            //     title: "Ngày"
            // },
            axisY: {
                title: "VND",
                includeZero: true
            },
            data: [{
                type: "line",
                name: "Sales",
                connectNullData: true,
                xValueType: "dateTime",
                xValueFormatString: "DD MM YYYY",
                yValueFormatString: "###,###,###.## VND",
                dataPoints: toJSArray(array)
            }]
        });
        chart.render();
    }
    window.onload = function() {
        toColumnChart(<?php echo json_encode($array, JSON_NUMERIC_CHECK); ?>);
    }
</script>
<?php
    $result = Connection::excuteQuery("Select TENSP, SOLANMUA from `sanpham` order by SOLANMUA DESC LIMIT 5");
    $array = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($array, array("label" => $row['TENSP'], "y" => $row['SOLANMUA']));
    }
?>

<script>
    function toColumnChart(array) {
        var day = new Date()
        var today = day.getDate() + "/" + (day.getMonth()+1) + "/" + day.getFullYear()
        var chart = new CanvasJS.Chart("stcContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "TOP 5 SẢN PHẨM BÁN NHIỀU NHẤT"
            },
            subtitles: [{
                text: today
            }],
            axisY: {
                title: "Số lượng",
                titleFontSize: 24,
                includeZero: true
            },
            data: [{
                type: "column",
                yValueFormatString: "#,### sản phẩm",
                dataPoints: array
            }]
        });
        chart.render();
    }
    window.onload = function() {
        toColumnChart(<?php echo json_encode($array, JSON_NUMERIC_CHECK); ?>);
    }
</script>
<?php
    $result = Connection::excuteQuery("Select TENSP, SOLANXEM from `sanpham` order by SOLANXEM DESC LIMIT 5");
    $array = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($array, array("label" => $row['TENSP'], "y" => $row['SOLANXEM']));
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
                text: "Top 5 sản phẩm được xem nhiều nhất"
            },
            subtitles: [{
                text: today
            }],
            axisY: {
                title: "Lượt xem",
                titleFontSize: 24,
                includeZero: true
            },
            data: [{
                type: "column",
                yValueFormatString: "#,### Lượt",
                dataPoints: array
            }]
        });
        chart.render();
    }
    window.onload = function() {
        toColumnChart(<?php echo json_encode($array, JSON_NUMERIC_CHECK); ?>);
    }
</script>
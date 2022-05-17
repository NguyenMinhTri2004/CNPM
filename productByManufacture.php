<?php
    $sql = "SELECT MALOAI , COUNT(*) as 'Count' FROM `sanpham` GROUP BY MALOAI";
    $result = Connection::excuteQuery($sql);
    $total = Connection::excuteQuery("Select count(*) as `Count` from `sanpham`");
    $totalNum = mysqli_fetch_assoc($total);
    $array = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($array, array("label"=>$row['MALOAI'], "y" => ($row['Count']/$totalNum['Count'])*100));
    }
?>

<script>
    function toPieChart(array) {
        var day = new Date()
        var today = day.getDate() + "/" + (day.getMonth()+1) + "/" + day.getFullYear()
        var chart = new CanvasJS.Chart("stcContainer", {
            animationEnabled: true,
            title: {
                text: "Tỉ lệ sản phẩm theo mã loại",
                fontFamily: "Work Sans"
            },
            subtitles: [{
                text: today
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: array
            }]
        });
        chart.render();
    }
    window.onload = function() {
        toPieChart(<?php echo json_encode($array, JSON_NUMERIC_CHECK); ?>)
    }

</script>
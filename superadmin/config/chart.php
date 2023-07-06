<!--Bar Chart For User-->
<?php
$sqlusercount = $db->prepare(
    'SELECT userType, COUNT(*) AS count FROM users GROUP BY userType');

$sqlusercount->execute();
$usercount = $sqlusercount->fetchAll(PDO::FETCH_ASSOC);
$dataPointsUsers = [];
foreach ($usercount as $data) {
    $dataPointsUsers[] = ['y' => $data['count'], 'label' => $data['userType']];
}

$dataPointsUsersJson = json_encode($dataPointsUsers);
?>


<!--Pie Chart For Room Type-->
<?php
$sqlRoom = $db->prepare('SELECT roomName, COUNT(*) AS count FROM room GROUP BY roomName');
$sqlRoom->execute();
$roomData = $sqlRoom->fetchAll(PDO::FETCH_ASSOC);
$dataPointsRoom = [];
foreach ($roomData as $data) {
    $dataPointsRoom[] = ['y' => $data['count'], 'name' => $data['roomName']];
}

$dataPointsRoomJson = json_encode($dataPointsRoom);
?>
<script>
    var dataPointsUsers = <?php echo $dataPointsUsersJson; ?>;
    var dataPointsRoom = <?php echo $dataPointsRoomJson; ?>;
    window.onload = function() {
        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "User Type"
            },
            axisY: {
                title: "User"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "Users",
                dataPoints: dataPointsUsers
            }]
        });
        chart1.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            exportEnabled: true,
            animationEnabled: true,
            title: {
                text: "Room Type"
            },
            legend: {
                cursor: "pointer",
                itemclick: explodePie
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y}%</strong>",
                indexLabel: "{name} - {y}%",
                dataPoints: dataPointsRoom
            }]
        });
        chart2.render();
    }

    function explodePie(e) {
        if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart2.render();

    }
</script>
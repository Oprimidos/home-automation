<?php include("config/connectdb.php") ?>

<!--Bar Chart For Money-->
<?php
$sqlRoomMoney = $db->prepare('SELECT s.sensorRoomID AS roomID, r.roomName, r.homeID, SUM(s.sensorMoney) AS totalMoney
    FROM sensor AS s
    JOIN room AS r ON s.sensorRoomID = r.roomID
    WHERE r.homeID=:homeID
    GROUP BY s.sensorRoomID, r.roomName, r.HomeID  ; ');
    $sqlRoomMoney->bindParam(":homeID",$_SESSION["userHomeID"]);

$sqlRoomMoney->execute();
$roomSensorData = $sqlRoomMoney->fetchAll(PDO::FETCH_ASSOC);
$dataPointsMoney = [];
foreach ($roomSensorData as $data) {
    $dataPointsMoney[] = ['y' => $data['totalMoney'], 'label' => $data['roomName']];
}

$dataPointsMoneyJson = json_encode($dataPointsMoney);
?>


<!--Pie Chart For Kwh-->
<?php
$sqlRoomKwh = $db->prepare('SELECT s.sensorRoomID AS roomID, r.roomName, r.homeID, SUM(s.sensorKwh) AS totalKwh
    FROM sensor AS s
    JOIN room AS r ON s.sensorRoomID = r.roomID
    WHERE r.homeID=:homeID
    GROUP BY s.sensorRoomID, r.roomName, r.HomeID  ; ');
    $sqlRoomKwh->bindParam(":homeID",$_SESSION["userHomeID"]);

$sqlRoomKwh->execute();
$roomSensorData = $sqlRoomKwh->fetchAll(PDO::FETCH_ASSOC);
$dataPointsKwh = [];
foreach ($roomSensorData as $data) {
    $dataPointsKwh[] = ['y' => $data['totalKwh'], 'name' => $data['roomName']];
}

$dataPointsKwhJson = json_encode($dataPointsKwh);
?>
<script>
    var dataPointsMoney = <?php echo $dataPointsMoneyJson; ?>;
    var dataPointsKwh = <?php echo $dataPointsKwhJson; ?>;
    window.onload = function() {
        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "MONEY PER ROOM"
            },
            axisY: {
                title: "Money"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "Rooms",
                dataPoints: dataPointsMoney
            }]
        });
        chart1.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Kwh Per Room"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} - {y}%",
		dataPoints: dataPointsKwh
	}]
});
chart2.render();
}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart2.render();

}


</script>
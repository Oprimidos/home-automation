<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/rooms.css">
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">
    <header>
        <?php include("navbarP.php"); ?>
    </header>
    <?php
    $sqlroom = $db->prepare('SELECT * from room WHERE roomID=:roomID');
    $sqlroom->bindParam(':roomID', $_GET["roomID"]);
    $sqlroom->execute();
    $room = $sqlroom->fetch(PDO::FETCH_ASSOC);
    ?>
    <title><?php echo$room["roomName"]?> Dashboard</title>
    <style>
        body {
            background-image: url('<?php echo $room["roomPhoto"] ?>');
        }
    </style>
    <?php 
    if(!($_SESSION["userHomeID"]==$room["homeID"])){
        session_destroy();
        header("Location:loginP.php?islem=no");
    }
    
    ?>
    <?php
    /*$dataPoints = array();
    $handle = $db->prepare('SELECT sensor,lightKwh from viewKwh WHERE lightRoomID=2');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result as $row) {
        array_push($dataPoints, array("label" => $row->sensor, "y" => $row->lightKwh));
    }
*/

    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,

                title: {
                    text: "ENERGY USED CHART FOR sensor",
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>

<body>
    <?php
    ?>
    <div class="container" ">
        <br>
        <br>
        <br>
        <br>
        <br>
      
        

        <div class=" card text-bg-dark">

        <div class="card-img-overlay">
            <h1 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center;">Producer Dashboard</h1>
            <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; "><?php echo $room["roomName"] ?></h3>
            <div class="row col-12">
                
                    <table class="table table-dark table-striped" style="height: 250px;">
                        <thead>
                            <tr>
                                <th scope="col">SENSOR</th>
                                <th scope="col">VALUE</th>
                                <th scope="col">LAST CHANGE TIME</th>
                                <th scope="col">ENERGY SPEND</th>
                                <th scope="col">MONEY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $sqlsensor = $db->prepare('SELECT * from sensor WHERE sensorRoomID=:sensorRoomID');
                            $sqlsensor->bindParam(':sensorRoomID', $_GET["roomID"]);
                            $sqlsensor->execute();
                            $sensors = $sqlsensor->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($sensors as $sensor) { 
                            ?>
                                <tr>
                                    <td><?php echo $sensor['sensorType'] ?></td>
                                    <td><?php echo $sensor['sensorValue'] ?></td>
                                    <td><?php echo $sensor['sensorTime'] ?></td>
                                    <td><?php echo $sensor['sensorKwh'] ?> Kwh</td>
                                    <td><?php echo $sensor['sensorMoney'] ?> $</td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                
                
            </div>
        </div>
    </div>

    </div>


</body>

</html>
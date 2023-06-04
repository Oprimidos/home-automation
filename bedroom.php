<!DOCTYPE html>
<html>

<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="assets/css/rooms.css">
    <header>
        <?php include("navbar.php"); ?>
    </header>
    <style>
        body {
            background-image: url('./assets/images/bedroom.jpg');
        }
    </style>
    <?php
    $dataPoints = array();
    $handle = $db->prepare('SELECT sensor,lightKwh from viewKwh WHERE lightRoomID=4');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    print_r($result);
    foreach ($result as $row) {
        array_push($dataPoints, array("label" => $row->sensor, "y" => $row->lightKwh));
    }
    

    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                
                title: {
                    text: "ENERGY USED CHART FOR BEDROOM",
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
    $sqlbedroom = "SELECT * FROM viewconsumer WHERE roomID=4";
    $querybedroom = $db->prepare($sqlbedroom);
    $querybedroom->execute();
    $bedroom = $querybedroom->fetch(PDO::FETCH_ASSOC);

    /*  $query = $db->prepare("UPDATE aircondition SET airTime=:airTime WHERE airID=:airID");
    $currentTime = date("Y-m-d H:i:s");
    $eklendi = $query->execute(array(
        "airTime" => $currentTime,
        "airID" => 4
    ));*/

    
    ?>
    <div class="container" ">
        <br>
        <br>
        <br>
        <br>
        <br>
      
        

        <div class=" card text-bg-dark">

        <div class="card-img-overlay">
            <h1 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center;">Consumer Dashboard</h1>
            <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">BEDROOM</h3>

            <div class="row col-12">
                <div class="col-8">
                    <table class="table table-dark table-striped" style="height: 250px;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">SENSOR</th>
                                <th scope="col">VALUE</th>
                                <th scope="col">LAST CHANGE TIME</th>
                                <th scope="col">ENERGY SPEND</th>
                                <th scope="col">MONEY SPEND</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $bedroom['airID'] ?></th>
                                <td>AIR CONDITION</td>
                                <td><?php echo $bedroom['airValue'] ?></td>
                                <td><?php echo $bedroom['airTime'] ?></td>
                                <td><?php echo $bedroom['airKwh'] ?> Kwh</td>
                                <td><?php echo $bedroom['airMoney'] ?> $</td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo $bedroom['heatID'] ?></th>
                                <td>HEAT</td>
                                <td><?php echo $bedroom['heatValue'] ?></td>
                                <td><?php echo $bedroom['heatTime'] ?></td>
                                <td>NO ENEGRY FOR THAT</td>
                                <td>NO MONEY FOR THAT</td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo $bedroom['lightID'] ?></th>
                                <td>LIGHT</td>
                                <td><?php echo $bedroom['lightValue'] ?></td>
                                <td><?php echo $bedroom['lightTime'] ?></td>
                                <td><?php echo $bedroom['lightKwh'] ?> Kwh</td>
                                <td><?php echo $bedroom['lightMoney'] ?> $</td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo $bedroom['humID'] ?></th>
                                <td>HUMIDITY</td>
                                <td><?php echo $bedroom['humValue'] ?></td>
                                <td><?php echo $bedroom['humTime'] ?></td>
                                <td><?php echo $bedroom['humKwh'] ?> Kwh</td>
                                <td><?php echo $bedroom['humMoney'] ?> $</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <div id="chartContainer" style="height: 250px; width: 100%;"></div>
                </div>
            </div>


        </div>
    </div>

    </div>





</body>

</html>
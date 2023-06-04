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
            background-image: url('./assets/images/kitchen.jpg');
        }
    </style>
    <?php
    $dataPoints = array();
    $handle = $db->prepare('SELECT sensor,lightKwh from viewKwh WHERE lightRoomID=2');
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
                    text: "ENERGY USED CHART FOR KITCHEN",
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
    $sqlkitchen = "SELECT * FROM viewconsumer WHERE roomID=2";
    $querykitchen = $db->prepare($sqlkitchen);
    $querykitchen->execute();
    $kitchen = $querykitchen->fetch(PDO::FETCH_ASSOC);
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
            <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">KITCHEN</h3>
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
                                <th scope="col">MONEY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $kitchen['airID'] ?></th>
                                <td>AIR CONDITION</td>
                                <td><?php echo $kitchen['airValue'] ?></td>
                                <td><?php echo $kitchen['airTime'] ?></td>
                                <td><?php echo $kitchen['airKwh'] ?> Kwh</td>
                                <td><?php echo $kitchen['airMoney'] ?> $</td>

                            </tr>
                            <tr>
                                <th scope="row"><?php echo $kitchen['heatID'] ?></th>
                                <td>HEAT</td>
                                <td><?php echo $kitchen['heatValue'] ?></td>
                                <td><?php echo $kitchen['heatTime'] ?></td>
                                <td>NO ENERGY FOR THAT</td>
                                <td>NO MONEY FOR THAT</td>

                            </tr>
                            <tr>
                                <th scope="row"><?php echo $kitchen['lightID'] ?></th>
                                <td>LIGHT</td>
                                <td><?php echo $kitchen['lightValue'] ?></td>
                                <td><?php echo $kitchen['lightTime'] ?></td>
                                <td><?php echo $kitchen['lightKwh'] ?> Kwh</td>
                                <td><?php echo $kitchen['lightMoney'] ?> $</td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo $kitchen['humID'] ?></th>
                                <td>HUMIDITY</td>
                                <td><?php echo $kitchen['humValue'] ?></td>
                                <td><?php echo $kitchen['humTime'] ?></td>
                                <td><?php echo $kitchen['humKwh'] ?> Kwh</td>
                                <td><?php echo $kitchen['humMoney'] ?> $</td>
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
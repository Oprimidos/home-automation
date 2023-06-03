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
            background-image: url('./assets/images/living.jpg');
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
        setTimeout(() => {
            document.location.reload();
        }, 10000);
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,

                title: {
                    text: "ENERGY USED CHART FOR LIVING ROOM",
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
    $sqlliving = "SELECT * FROM viewconsumer WHERE roomID=1";
    $queryliving = $db->prepare($sqlliving);
    $queryliving->execute();
    $living = $queryliving->fetch(PDO::FETCH_ASSOC);

    if ($living['airValue'] > 16) {
        $kwh = $living['airKwh'] + 0.2;
        $money = $kwh * 0.2;
        $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
        $uptadeair = $energyair->execute(array(
            "airKwh" => $kwh,
            "airMoney" => $money,
            "airID" => 1
        ));
    }
    if ($living["lightValue"] == "ON") {
        $kwh = $living['lightKwh'] + 0.1;
        $money = $kwh * 0.2;
        $energylight = $db->prepare("UPDATE light SET lightKwh=:lightKwh,lightMoney=:lightMoney WHERE lightID=:lightID");
        $uptadelight = $energylight->execute(array(
            "lightKwh" => $kwh,
            "lightMoney" => $money,
            "lightID" => 1
        ));
    }
    if ($living["humValue"] > 0) {
        $kwh = $living['humKwh'] + 0.05;
        $money = $kwh * 0.2;
        $energyhum = $db->prepare("UPDATE humidity SET humKwh=:humKwh,humMoney=:humMoney WHERE humID=:humID");
        $uptadehum = $energyhum->execute(array(
            "humKwh" => $kwh,
            "humMoney" => $money,
            "humID" => 1
        ));
    }
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
            <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">LIVING ROOM</h3>
            <div class="row col-12">
                <div class="col-8">
            <table class="table table-dark table-striped">
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
                        <th scope="row"><?php echo $living['airID'] ?></th>
                        <td>AIR CONDITION</td>
                        <td><?php echo $living['airValue'] ?></td>
                        <td><?php echo $living['airTime'] ?></td>
                        <td><?php echo $living['airKwh'] ?> Kwh</td>
                        <td><?php echo $living['airMoney'] ?> $</td>

                    </tr>
                    <tr>
                        <th scope="row"><?php echo $living['heatID'] ?></th>
                        <td>HEAT</td>
                        <td><?php echo $living['heatValue'] ?></td>
                        <td><?php echo $living['heatTime'] ?></td>
                        <td>NO ENERGY FOR THAT</td>
                        <td>NO MONEY FOR THAT</td>

                    </tr>
                    <tr>
                        <th scope="row"><?php echo $living['lightID'] ?></th>
                        <td>LIGHT</td>
                        <td><?php echo $living['lightValue'] ?></td>
                        <td><?php echo $living['lightTime'] ?></td>
                        <td><?php echo $living['lightKwh'] ?> Kwh</td>
                        <td><?php echo $living['lightMoney'] ?> $</td>
                    </tr>
                    <tr>
                                <th scope="row"><?php echo $living['humID'] ?></th>
                                <td>HUMIDITY</td>
                                <td><?php echo $living['humValue'] ?></td>
                                <td><?php echo $living['humTime'] ?></td>
                                <td><?php echo $living['humKwh'] ?> Kwh</td>
                                <td><?php echo $living['humMoney'] ?> $</td>
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
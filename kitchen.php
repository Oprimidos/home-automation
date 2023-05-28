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
    <script>
        setTimeout(() => {
            document.location.reload();
        }, 10000);
    </script>
</head>

<body>
    <?php
    $sqlkitchen = "SELECT * FROM viewconsumer WHERE roomID=2";
    $querykitchen = $db->prepare($sqlkitchen);
    $querykitchen->execute();
    $kitchen = $querykitchen->fetch(PDO::FETCH_ASSOC);

    if ($kitchen['airValue'] > 16) {
        $kwh = $kitchen['airKwh'] + 0.2;
        $money = $kwh * 0.2;
        $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
        $uptadeair = $energyair->execute(array(
            "airKwh" => $kwh,
            "airMoney" => $money,
            "airID" => 2
        ));
    }
    if ($kitchen["lightValue"] == "ON") {
        $kwh = $kitchen['lightKwh'] + 0.1;
        $money = $kwh * 0.2;
        $energylight = $db->prepare("UPDATE light SET lightKwh=:lightKwh,lightMoney=:lightMoney WHERE lightID=:lightID");
        $uptadelight = $energylight->execute(array(
            "lightKwh" => $kwh,
            "lightMoney" => $money,
            "lightID" => 2
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
            <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">KITCHEN</h3>

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
                </tbody>
            </table>
        </div>
    </div>

    </div>


</body>

</html>
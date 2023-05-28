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
    <script>
       setTimeout(() => {
            document.location.reload();
        }, 10000);
    </script>
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

    if ($bedroom['airValue'] > 16) {
        $kwh=$bedroom['airKwh']+0.2;
        $money=$kwh*0.2;
        $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
        $uptadeair= $energyair -> execute(array(
            "airKwh"=>$kwh,
            "airMoney"=>$money,
            "airID"=>4
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
            <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">BEDROOM</h3>
            <table class="table table-dark table-striped">
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
                        <td><?php echo $bedroom['airMoney']?> $</td>
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
                        <td><?php echo $bedroom['lightMoney']?> $</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    </div>


</body>

</html>
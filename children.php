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
            background-image: url('./assets/images/children.jpg');
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
    $sqlchildren = "SELECT * FROM viewconsumer WHERE roomID=3";
    $querychildren = $db->prepare($sqlchildren);
    $querychildren->execute();
    $children = $querychildren->fetch(PDO::FETCH_ASSOC);

    if ($children['airValue'] > 16) {
        $kwh=$children['airKwh']+0.2;
        $money=$kwh*0.2;
        $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
        $uptadeair= $energyair -> execute(array(
            "airKwh"=>$kwh,
            "airMoney"=>$money,
            "airID"=>3
        ));
    }
    if($children["lightValue"]=="ON"){
        $kwh=$children['lightKwh']+0.1;
        $money=$kwh*0.2;
        $energylight = $db->prepare("UPDATE light SET lightKwh=:lightKwh,lightMoney=:lightMoney WHERE lightID=:lightID");
        $uptadelight= $energylight -> execute(array(
            "lightKwh"=>$kwh,
            "lightMoney"=>$money,
            "lightID"=>3
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
            <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">CHILDREN ROOM</h3>
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
                            <th scope="row"><?php echo $children['airID'] ?></th>
                            <td>AIR CONDITION</td>
                            <td><?php echo $children['airValue'] ?></td>
                            <td><?php echo $children['airTime'] ?></td>
                            <td><?php echo $children['airKwh']?> Kwh</td>
                            <td><?php echo $children['airMoney']?> $</td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $children['heatID'] ?></th>
                            <td>HEAT</td>
                            <td><?php echo $children['heatValue'] ?></td>
                            <td><?php echo $children['heatTime'] ?></td>
                            <td>NO ENERGY FOR THAT</td>
                            <td>NO MONEY FOR THAT</td>

                        </tr>
                        <tr>
                            <th scope="row"><?php echo $children['lightID'] ?></th>
                            <td>LIGHT</td>
                            <td><?php echo $children['lightValue'] ?></td>
                            <td><?php echo $children['lightTime'] ?></td>
                            <td><?php echo $children['lightKwh']?> Kwh</td>
                            <td><?php echo $children['lightMoney']?> $</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>

    </div>


</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Producer Dashboard</title>
    <link rel="stylesheet" href="assets/css/rooms.css">
    <header>
        <?php include("navbarP.php"); ?>
    </header>
    <style>
        body {
            background-image: url('./assets/images/living.jpg');
        }
    </style>
</head>

<body>
<?php
    $sqlliving = "SELECT * FROM viewconsumer WHERE roomID=1";
    $queryliving = $db->prepare($sqlliving);
    $queryliving->execute();
    $living = $queryliving->fetch(PDO::FETCH_ASSOC);?>
    <div class="container">
        <br>
        <br>
        <br>

        <div class=" card text-bg-dark">

            <div class="card-img-overlay">
                <h1 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center;">Producer Dashboard</h1>
                <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">LIVING ROOM</h3>
                
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">SENSOR</th>
                            <th scope="col">VALUE</th>
                            <th scope="col">LAST CHANGE TIME</th>
                            <th scope="col">ENERGY SPEND</th>
                            <th scope="col">MONEY SPEND</th>
                            <th></th>

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
                            <td>
                            <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" value="airup" name="airup">Increase</button>
                                <button type="submit" class="btn btn-danger" value="airdown" name="airdown">Decrease</button>
                                <input type="hidden" name="roomID" value="<?php echo $living['airRoomID']?>">
                                <input type="hidden" name="link" value="livingP.php">
                            </form>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php echo $living['heatID'] ?></th>
                            <td>HEAT</td>
                            <td><?php echo $living['heatValue'] ?></td>
                            <td><?php echo $living['heatTime'] ?></td>
                            <td>NO ENEGRY FOR THAT</td>
                            <td>NO MONEY FOR THAT</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $living['lightID'] ?></th>
                            <td>LIGHT</td>
                            <td><?php echo $living['lightValue'] ?></td>
                            <td><?php echo $living['lightTime'] ?></td>
                            <td><?php echo $living['lightKwh'] ?> Kwh</td>
                            <td><?php echo $living['lightMoney'] ?> $</td>
                            <td scope="col">
                                <button type="button" class="btn btn-primary">On</button> 
                                <button type="button" class="btn btn-danger">Off</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $living['humID'] ?></th>
                            <td>HUMIDITY</td>
                            <td><?php echo $living['humValue'] ?></td>
                            <td><?php echo $living['humTime'] ?></td>
                            <td><?php echo $living['humKwh'] ?> Kwh</td>
                            <td><?php echo $living['humMoney'] ?> $</td>
                            <td>
                                <button type="button" class="btn btn-primary">Increase</button>
                                <button type="button" class="btn btn-danger">Decrease</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>



</body>

</html>
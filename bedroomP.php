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
            background-image: url('./assets/images/bedroom.jpg');
        }
    </style>
</head>

<body>
    <?php
    $sqlbedroom = "SELECT * FROM viewconsumer WHERE roomID=4";
    $querybedroom = $db->prepare($sqlbedroom);
    $querybedroom->execute();
    $bedroom = $querybedroom->fetch(PDO::FETCH_ASSOC); ?>
    <div class="container">
        <br>
        <br>
        <br>

        <div class=" card text-bg-dark">

            <div class="card-img-overlay">
                <h1 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center;">Producer Dashboard</h1>
                <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">BEDROOM</h3>

                <table class="table table-dark table-striped"">
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
                            <th scope="row"><?php echo $bedroom['airID'] ?></th>
                            <td>AIR CONDITION</td>
                            <td><?php echo $bedroom['airValue'] ?></td>
                            <td><?php echo $bedroom['airTime'] ?></td>
                            <td><?php echo $bedroom['airKwh'] ?> Kwh</td>
                            <td><?php echo $bedroom['airMoney'] ?> $</td>
                            <td>
                                <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" value="airup" name="airup">Increase</button>
                                <button type="submit" class="btn btn-danger" value="airdown" name="airdown">Decrease</button>
                                <input type="hidden" name="roomID" value="<?php echo $bedroom['airRoomID']?>">
                                <input type="hidden" name="link" value="bedroomP.php">
                            </form>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row"><?php echo $bedroom['heatID'] ?></th>
                            <td>HEAT</td>
                            <td><?php echo $bedroom['heatValue'] ?></td>
                            <td><?php echo $bedroom['heatTime'] ?></td>
                            <td>NO ENEGRY FOR THAT</td>
                            <td>NO MONEY FOR THAT</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $bedroom['lightID'] ?></th>
                            <td>LIGHT</td>
                            <td><?php echo $bedroom['lightValue'] ?></td>
                            <td><?php echo $bedroom['lightTime'] ?></td>
                            <td><?php echo $bedroom['lightKwh'] ?> Kwh</td>
                            <td><?php echo $bedroom['lightMoney'] ?> $</td>
                            <td scope="col">
                            <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" name="lighton">On</button> 
                                <button type="submit" class="btn btn-danger" name="lightoff">Off</button>
                                <input type="hidden" name="roomID" value="<?php echo $bedroom['lightRoomID']?>">
                                <input type="hidden" name="link" value="bedroomP.php">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $bedroom['humID'] ?></th>
                            <td>HUMIDITY</td>
                            <td>%<?php echo $bedroom['humValue'] ?></td>
                            <td><?php echo $bedroom['humTime'] ?></td>
                            <td><?php echo $bedroom['humKwh'] ?> Kwh</td>
                            <td><?php echo $bedroom['humMoney'] ?> $</td>
                            <td>
                            <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" value="humup" name="humup">Increase</button>
                                <button type="submit" class="btn btn-danger" value="humdown" name="humdown">Decrease</button>
                                <input type="hidden" name="roomID" value="<?php echo $bedroom['humRoomID']?>">
                                <input type="hidden" name="link" value="bedroomP.php">
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



</body>

</html>
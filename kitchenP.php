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
            background-image: url('./assets/images/kitchen.jpg');
        }
    </style>
</head>

<body>
    <?php
    $sqlkitchen = "SELECT * FROM viewconsumer WHERE roomID=2";
    $querykitchen = $db->prepare($sqlkitchen);
    $querykitchen->execute();
    $kitchen = $querykitchen->fetch(PDO::FETCH_ASSOC); ?>
    <div class="container">
        <br>
        <br>
        <br>

        <div class=" card text-bg-dark">

            <div class="card-img-overlay">
                <h1 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center;">Producer Dashboard</h1>
                <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">KITCHEN</h3>

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
                            <th scope="row"><?php echo $kitchen['airID'] ?></th>
                            <td>AIR CONDITION</td>
                            <td><?php echo $kitchen['airValue'] ?></td>
                            <td><?php echo $kitchen['airTime'] ?></td>
                            <td><?php echo $kitchen['airKwh'] ?> Kwh</td>
                            <td><?php echo $kitchen['airMoney'] ?> $</td>
                            <td>
                            <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" value="airup" name="airup">Increase</button>
                                <button type="submit" class="btn btn-danger" value="airdown" name="airdown">Decrease</button>
                                <input type="hidden" name="roomID" value="<?php echo $kitchen['airRoomID']?>">
                                <input type="hidden" name="link" value="kitchenP.php">
                            </form>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php echo $kitchen['heatID'] ?></th>
                            <td>HEAT</td>
                            <td><?php echo $kitchen['heatValue'] ?></td>
                            <td><?php echo $kitchen['heatTime'] ?></td>
                            <td>NO ENEGRY FOR THAT</td>
                            <td>NO MONEY FOR THAT</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $kitchen['lightID'] ?></th>
                            <td>LIGHT</td>
                            <td><?php echo $kitchen['lightValue'] ?></td>
                            <td><?php echo $kitchen['lightTime'] ?></td>
                            <td><?php echo $kitchen['lightKwh'] ?> Kwh</td>
                            <td><?php echo $kitchen['lightMoney'] ?> $</td>
                            <td scope="col">
                                <button type="button" class="btn btn-primary">On</button>
                                <button type="button" class="btn btn-danger">Off</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $kitchen['humID'] ?></th>
                            <td>HUMIDITY</td>
                            <td><?php echo $kitchen['humValue'] ?></td>
                            <td><?php echo $kitchen['humTime'] ?></td>
                            <td><?php echo $kitchen['humKwh'] ?> Kwh</td>
                            <td><?php echo $kitchen['humMoney'] ?> $</td>
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
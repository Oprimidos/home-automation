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
            background-image: url('./assets/images/children.jpg');
        }
    </style>
</head>

<body>
    <?php
    $sqlchildren = "SELECT * FROM viewconsumer WHERE roomID=3";
    $querychildren = $db->prepare($sqlchildren);
    $querychildren->execute();
    $children = $querychildren->fetch(PDO::FETCH_ASSOC); ?>
    <div class="container">
        <br>
        <br>
        <br>

        <div class=" card text-bg-dark">

            <div class="card-img-overlay">
                <h1 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center;">Producer Dashboard</h1>
                <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">CHILDREN ROOM</h3>

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
                            <th scope="row"><?php echo $children['airID'] ?></th>
                            <td>AIR CONDITION</td>
                            <td><?php echo $children['airValue'] ?></td>
                            <td><?php echo $children['airTime'] ?></td>
                            <td><?php echo $children['airKwh'] ?> Kwh</td>
                            <td><?php echo $children['airMoney'] ?> $</td>
                            <td>
                            <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" value="airup" name="airup">Increase</button>
                                <button type="submit" class="btn btn-danger" value="airdown" name="airdown">Decrease</button>
                                <input type="hidden" name="roomID" value="<?php echo $children['airRoomID']?>">
                                <input type="hidden" name="link" value="childrenP.php">
                            </form>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php echo $children['heatID'] ?></th>
                            <td>HEAT</td>
                            <td><?php echo $children['heatValue'] ?></td>
                            <td><?php echo $children['heatTime'] ?></td>
                            <td>NO ENEGRY FOR THAT</td>
                            <td>NO MONEY FOR THAT</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $children['lightID'] ?></th>
                            <td>LIGHT</td>
                            <td><?php echo $children['lightValue'] ?></td>
                            <td><?php echo $children['lightTime'] ?></td>
                            <td><?php echo $children['lightKwh'] ?> Kwh</td>
                            <td><?php echo $children['lightMoney'] ?> $</td>
                            <td scope="col">
                            <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" name="lighton">On</button> 
                                <button type="submit" class="btn btn-danger" name="lightoff">Off</button>
                                <input type="hidden" name="roomID" value="<?php echo $children['lightRoomID']?>">
                                <input type="hidden" name="link" value="childrenP.php">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $children['humID'] ?></th>
                            <td>HUMIDITY</td>
                            <td>%<?php echo $children['humValue'] ?></td>
                            <td><?php echo $children['humTime'] ?></td>
                            <td><?php echo $children['humKwh'] ?> Kwh</td>
                            <td><?php echo $children['humMoney'] ?> $</td>
                            <td>
                            <form action="config/operation.php" method="post">
                                <button type="submit" class="btn btn-primary" value="humup" name="humup">Increase</button>
                                <button type="submit" class="btn btn-danger" value="humdown" name="humdown">Decrease</button>
                                <input type="hidden" name="roomID" value="<?php echo $children['humRoomID']?>">
                                <input type="hidden" name="link" value="childrenP.php">
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



</body>

</html>
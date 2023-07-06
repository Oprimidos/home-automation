<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/rooms.css">
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <header>
        <?php include("navbarP.php"); ?>
    </header>
    <?php
    $sqlroom = $db->prepare('SELECT * from room WHERE roomID=:roomID');
    $sqlroom->bindParam(':roomID', $_GET["roomID"]);
    $sqlroom->execute();
    $room = $sqlroom->fetch(PDO::FETCH_ASSOC);
    ?>
    <title><?php echo $room["roomName"] ?> Dashboard</title>
    <style>
        body {
            background-image: url('<?php echo $room["roomPhoto"] ?>');
        }
    </style>
    <?php
    if (!($_SESSION["userHomeID"] == $room["homeID"])) {
        session_destroy();
        header("Location:loginP.php?islem=no");
    }

    ?>
    
    
</head>

<body>
    <?php
    ?>
    <div class="container" ">
       
       <section class="ftco-section">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-md-6 text-center mb-5">
                       <h2 class="heading-section" >Producer Dashboard</h2>
                       <h3 class="heading-section" ><?php echo $room["roomName"] ?></h3>
                   </div>
               </div>
               <div class="row">
               <div class="col-md-12">
                       <div class="table-wrap">
                           <table class="table">
                           <thead class="thead-primary">
                           <tr>
                            <th scope="col">SENSOR</th>
                            <th scope="col">VALUE</th>
                            <th scope="col">LAST CHANGE TIME</th>
                            <th scope="col">ENERGY SPEND</th>
                            <th scope="col">MONEY</th>
                            <th scope="col">BUTTONS</th>
                        </tr>
                           </thead>


                    <tbody>
                        <?php

                        $sqlsensor = $db->prepare('SELECT * from sensor WHERE sensorRoomID=:sensorRoomID');
                        $sqlsensor->bindParam(':sensorRoomID', $_GET["roomID"]);
                        $sqlsensor->execute();
                        $sensors = $sqlsensor->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($sensors as $sensor) {
                        ?>
                            <tr>
                                <td><?php echo $sensor['sensorType'] ?></td>
                                <td><?php echo $sensor['sensorValue'] ?></td>
                                <td><?php echo $sensor['sensorTime'] ?></td>
                                <td><?php echo $sensor['sensorKwh'] ?> Kwh</td>
                                <td><?php echo $sensor['sensorMoney'] ?> $</td>
                                <td>
                                    <form action="config/operation.php" method="post">
                                    <div class="scope border-bottom-0" aria-label="Basic example">
                                        <?php
                                        if ($sensor["sensorType"] == "Light") {
                                            echo '<button type="submit" class="btn btn-primary" name="lighton">ON</button>
                                        <button type="submit" class="btn btn-primary" name="lightoff">OFF</button>';
                                        }
                                        elseif ($sensor["sensorType"]=="Air Condition") {
                                            echo '<button type="submit" class="btn btn-primary" name="airon">ON</button>
                                                <button type="submit" class="btn btn-primary" name="airup">INCREASE</button>
                                                <button type="submit" class="btn btn-primary" name="airdown">DECREASE</button>
                                                <button type="submit" class="btn btn-primary" name="airoff">OFF</button>';
                                        }
                                        elseif($sensor["sensorType"]=="Humidity"){
                                            echo '<button type="submit" class="btn btn-primary" name="humup">INCREASE</button>
                                        <button type="submit" class="btn btn-primary" name="humdown">DECREASE</button>';
                                        }
                                        ?>
                                        </div>
                                    </form>

                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>

    </div>


</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/rooms.css">
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">
    <header>
        <?php include("navbar.php"); ?>
    </header>
    <?php
    $sqlroom = $db->prepare('SELECT * from room WHERE roomID=:roomID');
    $sqlroom->bindParam(':roomID', $_GET["roomID"]);
    $sqlroom->execute();
    $room = $sqlroom->fetch(PDO::FETCH_ASSOC);
    ?>
    <title><?php echo$room["roomName"]?> Dashboard</title>
    <style>
        body {
            background-image: url('<?php echo $room["roomPhoto"] ?>');
        }
    </style>
    <?php 
    if(!($_SESSION["userHomeID"]==$room["homeID"])){
        session_destroy();
        header("Location:login.php?islem=no");
    }
    
    ?>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>

<body>
    <?php
    ?>
    <div class="container" ">
       
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" >Consumer Dashboard</h2>
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

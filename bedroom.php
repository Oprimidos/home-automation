<!DOCTYPE html>
<html>

<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="assets/css/rooms.css">
    <header>
        <?php include("navbar.php"); ?>
    </header>
    <style>
    body{background-image: url('./assets/images/bedroom.jpg');}
   


        </style>
</head>

<body>
    <?php
    $sqlbedroom = "SELECT * FROM roomview WHERE roomID=4";
    $querybedroom = $db->prepare($sqlbedroom);
    $querybedroom->execute();
    $bedroom = $querybedroom->fetchAll(PDO::FETCH_ASSOC);

    $query=$db->prepare("UPDATE aircondition SET airTime=:airTime WHERE airID=:airID");
    $currentTime = date("Y-m-d H:i:s");
    $eklendi=$query->execute(array(
        "airTime"=>$currentTime,
        "airID"=>4      
    ));
    ?>
    <div class="container" ">
        <br>
        <br>
        <br>
        <br>
        <br>
      
        

        <div class="card text-bg-dark">
            
            <div class="card-img-overlay">
            <h1 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center;">Consumer Dashboard</h1>
                <h3 class="card-title bg-dark" style=" padding-top:30px; padding-bottom:30px; text-align: center; ">BEDROOM</h3>
                <?php  foreach($bedroom as $row){?>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">SENSOR</th>
                            <th scope="col">VALUE</th>
                            <th scope="col">LAST CHANGE TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $row['airID']?></th>
                            <td>AIR CONDITION</td>
                            <td><?php echo $row['airValue']?></td>
                            <td><?php echo $row['airTime']?></td>
                            
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $row['heatID']?></th>
                            <td>HEAT</td>
                            <td><?php echo $row['heatValue']?></td>
                            <td><?php echo $row['heatTime']?></td>
                            
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $row['lightID']?></th>
                            <td>LIGHT</td>
                            <td><?php echo $row['lightValue']?></td>
                            <td><?php echo $row['lightTime']?></td>
                        </tr>
                    </tbody>
                </table>
                <?php }?>
            </div>
        </div>

    </div>

    <script>
        function showTable(tableId) {
            var table = document.getElementById(tableId + "-table");
            if (table.style.display === "none") {
                table.style.display = "block";
            } else {
                table.style.display = "none";
            }
        }
    </script>

</body>

</html>

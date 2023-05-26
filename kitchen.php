<!DOCTYPE html>
<html>

<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <header>
        <?php include("navbar.php"); ?>
    </header>
    <style>
        body {
            background-image: url('./assets/images/kitchen.jpg');
        }
    </style>
</head>

<body>
    <?php
    $sqlkitchen = "SELECT * FROM roomview WHERE roomID=2";
    $querykitchen = $db->prepare($sqlkitchen);
    $querykitchen->execute();
    $kitchen = $querykitchen->fetchAll(PDO::FETCH_ASSOC);

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
            <?php foreach ($kitchen as $row) { ?>
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
                            <th scope="row"><?php echo $row['airID'] ?></th>
                            <td>AIR CONDITION</td>
                            <td><?php echo $row['airValue'] ?></td>
                            <td><?php echo $row['airTime'] ?></td>

                        </tr>
                        <tr>
                            <th scope="row"><?php echo $row['heatID'] ?></th>
                            <td>HEAT</td>
                            <td><?php echo $row['heatValue'] ?></td>
                            <td><?php echo $row['heatTime'] ?></td>

                        </tr>
                        <tr>
                            <th scope="row"><?php echo $row['lightID'] ?></th>
                            <td>LIGHT</td>
                            <td><?php echo $row['lightValue'] ?></td>
                            <td><?php echo $row['lightTime'] ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>

    </div>


</body>

</html>
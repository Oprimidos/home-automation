<!DOCTYPE html>
<html>

<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <header>
        <?php include("navbar.php"); ?>
    </header>
</head>

<body>
    <?php
    $sqlheat = "SELECT * FROM heatview";
    $queryheat = $db->prepare($sqlheat);
    $queryheat->execute();
    $heat = $queryheat->fetchAll(PDO::FETCH_ASSOC);

    $sqllight = "SELECT * FROM lightview";
    $querylight = $db->prepare($sqllight);
    $querylight->execute();
    $light = $querylight->fetchAll(PDO::FETCH_ASSOC);

    $sqlair = "SELECT * FROM airview";
    $queryair = $db->prepare($sqlair);
    $queryair->execute();
    $air = $queryair->fetchAll(PDO::FETCH_ASSOC);

    $sqlroom = "SELECT * FROM room";
    $queryroom = $db->prepare($sqlroom);
    $queryroom->execute();
    $room = $queryroom->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 style="padding-top:30px; padding-bottom:30px;">Consumer Dashboard</h1>


        <button onclick="showTable('temperature')">Temperature</button>
        <button onclick="showTable('humidity')">Humidity</button>
        <button onclick="showTable('light')">Light</button>
        <!-- Temperature Table -->
        <table id="temperature-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Reading</th>
                    <th scope="col">Time</th>
                    <th scope="col">Room</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($heat as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['heatID'] ?></th>
                        <td><?php echo $row['heatValue'] ?></td>
                        <td>Time yazılacak</td>
                        <td><?php echo $row['roomName'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Humidity Table -->
        <table id="humidity-table" style="display:none;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Reading</th>
                    <th scope="col">Time</th>
                    <th scope="col">Room</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($air as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['airID'] ?></th>
                        <td><?php echo $row['airValue'] ?></td>
                        <td>Time yazılacak</td>
                        <td><?php echo $row['roomName'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Light Table -->
        <table id="light-table" style="display:none;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Reading</th>
                    <th scope="col">Time</th>
                    <th scope="col">Room</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($light as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['lightID'] ?></th>
                        <td><?php echo $row['lightValue'] ?></td>
                        <td>Time yazılacak</td>
                        <td><?php echo $row['roomName'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

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
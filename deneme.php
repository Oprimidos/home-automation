<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container">
        <div class="row text-center">
        <?php
        include("config/connectdb.php");
        $_SESSION["homeID"] = 1;
            $sqlrooms = $db->prepare('SELECT * from room WHERE homeID=:homeID');
            $sqlrooms->bindParam(':homeID', $_SESSION["homeID"]);
            $sqlrooms->execute();
            $rooms = $sqlrooms->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rooms as $room) {

            ?>
                <div class="col-md-4">
                    <a href="room.php">
                        <img src="./assets/images/living.jpg" alt="Living Room">
                        <h1><?php echo $room["roomName"] ?></h1>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
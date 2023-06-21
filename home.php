<!DOCTYPE html>
<html>

<head>
    <title>Consumer Dashboard</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <header>
        <?php include("navbar.php"); ?>
    </header>
    <?php
    $sqlhome = $db->prepare('SELECT * from home WHERE homeID=:homeID');
    $sqlhome->bindParam(':homeID', $_SESSION["userHomeID"]);
    $sqlhome->execute();
    $home = $sqlhome->fetch(PDO::FETCH_ASSOC);
    ?>
    <style>
        body {
            background-image: url('<?php echo $home["homePhoto"] ?>');
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        $sqlrooms = $db->prepare('SELECT * from room WHERE homeID=:homeID');
        $sqlrooms->bindParam(':homeID', $_SESSION["userHomeID"]);
        $sqlrooms->execute();
        $rooms = $sqlrooms->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rooms as $room) { ?>
            <div class="box">
                <a href="room.php?roomID=<?php echo$room["roomID"]?>">
                    <img src="<?php echo $room["roomPhoto"] ?>" alt="Living Room">
                    <h1><?php echo $room["roomName"] ?></h1>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="position-fixed bottom-0 end-0 rounded-circle">
        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <img src="./assets/images/add.png" alt="..." class="">
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD A NEW ROOM</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addroom.php" method="post">
                        <label for="roomName">
                            <p>Room Name</p>
                            <input type="text" name="roomName" id="roomName">
                        </label>
                        <br>
                        <label for="roomPhoto">
                            <p>Room Photo</p>
                            <ul>
                                <?php
                            $sqlphotos = $db->prepare('SELECT * from photos');
                            $sqlphotos->execute();
                            $photos = $sqlphotos->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($photos as $photo) {
                            ?>
                                <li>
                                    <input type="radio" id="picture1" name="picture" value="<?php echo$photo["photoUrl"]?>">
                                    <label for="picture1">
                                        <img src="<?php echo$photo["photoUrl"]?>" alt="Picture 1" style="height: 100px;"></label>
                                </li>
                                <?php }?>
                            </ul>
                        </label>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
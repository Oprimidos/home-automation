<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/navbar.css">
    <script src="js/navbar.js"></script>
    <script>
        setTimeout(() => {
            document.location.reload();
        }, 10000);
    </script>
    <?php include("config/connectdb.php") ?>
    <?php // include("config/update.php");
    ?>
    <?php
    if (strlen($_SESSION["userMail"]) == 0) {
        session_destroy();
        header("Location:loginP.php?islem=no");
    } ?>
</head>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <img src="assets/images/M^2-1.png" alt="Logo" width="30" height="24">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="homeP.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ROOMS
                        </a>
                        <ul class="dropdown-menu bg-secondary">
                        <?php
                            $sqlrooms = $db->prepare('SELECT * from room WHERE homeID=:homeID');
                            $sqlrooms->bindParam(':homeID', $_SESSION["userHomeID"]);
                            $sqlrooms->execute();
                            $rooms = $sqlrooms->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rooms as $room) { ?>
                                <li><a class="dropdown-item" href="roomP.php?roomID=<?php echo $room["roomID"]?>"><?php echo$room["roomName"]?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageproducer/admin.php">ADMIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="config/logout.php">LOGOUT</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

</body>

</html>
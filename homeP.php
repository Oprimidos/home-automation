<!DOCTYPE html>
<html>

<head>
    <title>Producer Dashboard</title>
    <link rel="shortcut icon" href="assets/images/favicon-home.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/home.css">
    <header>
        <?php include("navbarP.php"); ?>
    </header>
    <?php
    $sqlhome = $db->prepare('SELECT * from home WHERE homeID=:homeID');
    $sqlhome->bindParam(':homeID', $_SESSION["userHomeID"]);
    $sqlhome->execute();
    $home = $sqlhome->fetch(PDO::FETCH_ASSOC);
    ?>
   <style>
    body{background-image: url('<?php echo $home["homePhoto"] ?>');}
    </style>
    <?php 
    if(!($_SESSION["userHomeID"]==$home["homeID"])){
        session_destroy();
        header("Location:loginP.php?islem=no");
    }
    
    ?>
</head>

<body>
<div>
        <h1 class="text-center">WELCOME <?php echo $_SESSION["userFirstName"] . " " . $_SESSION["userLastName"] ?></h1>
    </div>

    <div class="container">
        <?php
        $sqlrooms = $db->prepare('SELECT * from room WHERE homeID=:homeID');
        $sqlrooms->bindParam(':homeID', $_SESSION["userHomeID"]);
        $sqlrooms->execute();
        $rooms = $sqlrooms->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rooms as $room) { ?>
            <div class="box">
                <a href="roomP.php?roomID=<?php echo $room["roomID"] ?>">
                    <img src="<?php echo $room["roomPhoto"] ?>" alt="Living Room">
                    <h1><?php echo $room["roomName"] ?></h1>
                </a>
            </div>
        <?php } ?>
    </div>
</body>

</html>

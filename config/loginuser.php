<?php
include("connectdb.php");

if (isset($_POST["loginP"])) {
    $userMail = trim(htmlspecialchars($_POST["userMail"]));
    $userPassword = trim(htmlspecialchars($_POST["userPassword"]));
    $userType = "Producer";

    $usersor = $db->prepare("SELECT * FROM users WHERE userMail = :userMail AND userPassword = :userPassword AND userType = :userType");

    $usersor->bindParam(":userMail", $userMail);
    $usersor->bindParam(":userPassword", $userPassword);
    $usersor->bindParam(":userType", $userType);

    $usergetir = $usersor->execute();
    $usergetir = $usersor->fetch(PDO::FETCH_ASSOC);
    $say = $usersor->rowCount();
    echo $say;
    if ($say == 1) {
        $_SESSION["userMail"] = $usergetir["userMail"];
        $_SESSION["userHomeID"] = $usergetir["userHomeID"];
        $_SESSION["userFirstName"]=$usergetir["userFirstName"];
        $_SESSION["userLastName"]=$usergetir["userLastName"];
        $_SESSION["userHomeID"]=$usergetir["userHomeID"];
        header("Location:../homeP.php");
    } else {
        header("Location:../loginP.php?islem=no");
    }
}
if (isset($_POST["login"])) {
    $userMail = trim(htmlspecialchars($_POST["userMail"]));
    $userPassword = trim(htmlspecialchars($_POST["userPassword"]));
    $userType = "Consumer";

    $usersor = $db->prepare("SELECT * FROM users WHERE userMail = :userMail AND userPassword = :userPassword AND userType = :userType");

    $usersor->bindParam(":userMail", $userMail);
    $usersor->bindParam(":userPassword", $userPassword);
    $usersor->bindParam(":userType", $userType);

    $usergetir = $usersor->execute();
    $usergetir = $usersor->fetch(PDO::FETCH_ASSOC);
    $say = $usersor->rowCount();
    echo $say;
    if ($say == 1) {
        $_SESSION["userMail"] = $usergetir["userMail"];
        $_SESSION["userHomeID"] = $usergetir["userHomeID"];
        $_SESSION["userFirstName"]=$usergetir["userFirstName"];
        $_SESSION["userLastName"]=$usergetir["userLastName"];
        $_SESSION["userHomeID"]=$usergetir["userHomeID"];
        header("Location:../home.php");
    } else {
        header("Location:../login.php?islem=no");
    }
}
if(isset($_POST["admin"])){
    $userMail = trim(htmlspecialchars($_POST["userMail"]));
    $userPassword = trim(htmlspecialchars($_POST["userPassword"]));
    $userType = "Admin";

    $usersor = $db->prepare("SELECT * FROM users WHERE userMail = :userMail AND userPassword = :userPassword AND userType = :userType");

    $usersor->bindParam(":userMail", $userMail);
    $usersor->bindParam(":userPassword", $userPassword);
    $usersor->bindParam(":userType", $userType);

    $usergetir = $usersor->execute();
    $usergetir = $usersor->fetch(PDO::FETCH_ASSOC);
    $say = $usersor->rowCount();
    echo $say;
    if ($say == 1) {
        $_SESSION["userType"] = $usergetir["userType"];
        
        header("Location:../superadmin/admin.php");
    } else {
        header("Location:../superadmin/login.php?islem=no");
    }
}


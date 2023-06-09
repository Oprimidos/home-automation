<?php 
include("connectdb.php");

if(isset($_POST["loginP"])){
    $userName = trim(htmlspecialchars($_POST["userName"]));
$userPassword = trim(htmlspecialchars($_POST["userPassword"]));
$userType = "Producer";

$usersor = $db->prepare("SELECT * FROM users WHERE userName = :userName AND userPassword = :userPassword AND userType = :userType");

$usersor->bindParam(":userName", $userName);
$usersor->bindParam(":userPassword", $userPassword);
$usersor->bindParam(":userType", $userType);

$usergetir = $usersor->execute();
$usergetir = $usersor->fetch(PDO::FETCH_ASSOC);
$say = $usersor->rowCount();
    echo $say;
    if($say==1){
        $_SESSION["userName"]=$usergetir["userName"];
        header("Location:../homeP.php");
    }
    else{
        header("Location:../loginP.php?islem=no");

    }
    
}
if(isset($_POST["login"])){
    $userName = trim(htmlspecialchars($_POST["userName"]));
$userPassword = trim(htmlspecialchars($_POST["userPassword"]));
$userType = "Consumer";

$usersor = $db->prepare("SELECT * FROM users WHERE userName = :userName AND userPassword = :userPassword AND userType = :userType");

$usersor->bindParam(":userName", $userName);
$usersor->bindParam(":userPassword", $userPassword);
$usersor->bindParam(":userType", $userType);

$usergetir = $usersor->execute();
$usergetir = $usersor->fetch(PDO::FETCH_ASSOC);
$say = $usersor->rowCount();
    echo $say;
    if($say==1){
        $_SESSION["userName"]=$usergetir["userName"];
        header("Location:../homeP.php");
    }
    else{
        header("Location:../loginP.php?islem=no");

    }
    
}
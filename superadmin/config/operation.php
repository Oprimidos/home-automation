<?php
include("../../config/connectdb.php");
if (isset($_POST["addroom"])) {


    $upload = "../../assets/images/room/";

    //Save file into file and database
    $stmt = $db->query("SELECT MAX(roomID) AS max_id FROM room");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxId = $row['max_id'] + 1;
    $oldFileName = $_FILES["roomPhoto"]["name"];
    $Extension = pathinfo($oldFileName, PATHINFO_EXTENSION);
    $_FILES["roomPhoto"]["name"] = $maxId . "." . $Extension;
    $file = $_FILES["roomPhoto"]["name"];
    @move_uploaded_file($_FILES["roomPhoto"]["tmp_name"], $upload . $file);
    $sqlpicture = $upload . $file;
    $sqlpicture = substr($sqlpicture, 4);


    $sqladdroom = $db->prepare("INSERT INTO room SET
    roomID=:roomID,
  roomName = :roomName,
  roomPhoto = :roomPhoto,
  homeID = :homeID");

    $insert = $sqladdroom->execute(array(
        "roomID"=>$maxId,
        "roomName" => $_POST["roomName"],
        "roomPhoto" => $sqlpicture,
        "homeID" => $_SESSION["userHomeID"]
    ));

    header("Location:../admin.php");
}

if(isset($_POST["accept"])){
  $sqlregister=$db->prepare("SELECT regFirstName,regLastName,regMail,regPassword,regType,regHomeID FROM register WHERE regID=:regID");
  $sqlregister->bindParam(":regID",$_POST["regID"]);
  $sqlregister->execute();
  $register=$sqlregister->fetch(PDO::FETCH_ASSOC);
  
  $insertregister = $db->prepare("INSERT INTO users 
        (userFirstName, userLastName,userMail,userPassword,userType,userHomeID) 
        VALUES (:userFirstName, :userLastName,:userMail,:userPassword,:userType,:userHomeID)");
        $insertregister->bindParam(':userFirstName', $register["regFirstName"]);
        $insertregister->bindParam(':userLastName', $register["regLastName"]);
        $insertregister->bindParam(':userMail', $register["regMail"]);
        $insertregister->bindParam(':userPassword', $register["regPassword"]);
        $insertregister->bindParam(':userType', $register["regType"]);
        $insertregister->bindParam(':userHomeID', $register["regHomeID"]);
        $insertregister->execute();

        $sqldelete=$db->prepare("DELETE FROM register WHERE regID=:regID");
        $sqldelete->bindParam(":regID",$_POST["regID"]);
        $sqldelete->execute();

        header("Location:../registeraccept.php");

}
if(isset($_POST["decline"])){
  $sqldelete=$db->prepare("DELETE FROM register WHERE regID=:regID");
        $sqldelete->bindParam(":regID",$_POST["regID"]);
        $sqldelete->execute();

        header("Location:../registeraccept.php");
}
if(isset($_POST["editRoom"])){
  echo $_POST["roomID"];
}
if(isset($_POST["addsensor"])){
  $insertsensor=$db->prepare("INSERT INTO sensor (sensorType,sensorRoomID) VALUES (:sensorType,:sensorRoomID)");
  $insertsensor->bindParam(":sensorType",$_POST["sensorType"]);
  $insertsensor->bindParam(":sensorRoomID",$_POST["sensorRoomID"]);
  $insertsensor->execute();

  header("Location:../admin.php");
}
if(isset($_POST["deletesensor"])){
  $deletesensor=$db->prepare("DELETE FROM sensor WHERE sensorID=:sensorID");
  $deletesensor->bindParam(":sensorID",$_POST["sensorID"]);
  $deletesensor->execute();
  header("Location:../admin.php");
}

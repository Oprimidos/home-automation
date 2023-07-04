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

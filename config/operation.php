<?php
include("connectdb.php");
if (isset($_POST['airup'])) {

    $handle = $db->prepare('SELECT airValue from aircondition WHERE airRoomID=:roomID');
    $handle->bindParam(':roomID', $_POST["roomID"]);
    $handle->execute();
    $result = $handle->fetch(\PDO::FETCH_ASSOC);
    $newairValue = 15;
    $currentTimestamp = date('Y-m-d H:i:s');
    if ($result["airValue"] == 0) {
        $newairValue = 15;
    } else {
        $newairValue = $result["airValue"] + 1;
    }
    $handle = $db->prepare('UPDATE aircondition SET airValue=:airValue,airTime=:airTime WHERE airRoomID = :roomID');
    $handle->bindParam(':airValue', $newairValue);
    $handle->bindParam(':airTime', $currentTimestamp);
    $handle->bindParam(':roomID', $_POST["roomID"]);
    $handle->execute();
    header("Location:../".$_POST["link"]);
} elseif (isset($_POST['airdown'])) {
    $handle = $db->prepare('SELECT airValue from aircondition WHERE airRoomID=:roomID');
    $handle->bindParam(':roomID', $_POST["roomID"]);
    $handle->execute();
    $result = $handle->fetch(\PDO::FETCH_ASSOC);
    $newairValue = 15;
    $currentTimestamp = date('Y-m-d H:i:s');
    if($result["airValue"]!=0){
        if ($result["airValue"] == 15) {
            $newairValue = 0;
        } else {
            $newairValue = $result["airValue"] -1;
        }
        $handle = $db->prepare('UPDATE aircondition SET airValue=:airValue,airTime=:airTime WHERE airRoomID = :roomID');
        $handle->bindParam(':airValue', $newairValue);
        $handle->bindParam(':airTime', $currentTimestamp);
        $handle->bindParam(':roomID', $_POST["roomID"]);
        $handle->execute(); 
    }
    header("Location:../".$_POST["link"]);
}

if (isset($_POST['lightoff'])) {
    $value="OFF";
    $handleLight = $db->prepare('UPDATE light SET lightValue=:lightValue,lightTime=:lightTime WHERE lightRoomID = :roomID');
    $handleLight->bindParam(':lightValue', $value);
    $currentTimestamp = date('Y-m-d H:i:s');
    $handleLight->bindParam(':lightTime', $currentTimestamp);
    $handleLight->bindParam(':roomID', $_POST["roomID"]);
    $handleLight->execute();
    header("Location:../".$_POST["link"]);
}
else if(isset($_POST['lighton'])){
    $value="ON";
    $handleLight = $db->prepare('UPDATE light SET lightValue=:lightValue,lightTime=:lightTime WHERE lightRoomID = :roomID');
    $handleLight->bindParam(':lightValue', $value);
    $currentTimestamp = date('Y-m-d H:i:s');
    $handleLight->bindParam(':lightTime', $currentTimestamp);
    $handleLight->bindParam(':roomID', $_POST["roomID"]);
    $handleLight->execute();
    header("Location:../".$_POST["link"]);
}
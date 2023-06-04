
<?php
include("connectdb.php");

$sqlbedroom = "SELECT * FROM viewconsumer WHERE roomID=4";
$querybedroom = $db->prepare($sqlbedroom);
$querybedroom->execute();
$bedroom = $querybedroom->fetch(PDO::FETCH_ASSOC);



if ($bedroom['airValue'] > 16) {
    $kwh = $bedroom['airKwh'] + 0.2;
    $money = $kwh * 0.2;
    $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
    $uptadeair = $energyair->execute(array(
        "airKwh" => $kwh,
        "airMoney" => $money,
        "airID" => 4
    ));
}
if ($bedroom["lightValue"] == "ON") {
    $kwh = $bedroom['lightKwh'] + 0.1;
    $money = $kwh * 0.2;
    $energylight = $db->prepare("UPDATE light SET lightKwh=:lightKwh,lightMoney=:lightMoney WHERE lightID=:lightID");
    $uptadelight = $energylight->execute(array(
        "lightKwh" => $kwh,
        "lightMoney" => $money,
        "lightID" => 4
    ));
}
if ($bedroom["humValue"] > 0) {
    $kwh = $bedroom['humKwh'] + 0.05;
    $money = $kwh * 0.2;
    $energyhum = $db->prepare("UPDATE humidity SET humKwh=:humKwh,humMoney=:humMoney WHERE humID=:humID");
    $uptadehum = $energyhum->execute(array(
        "humKwh" => $kwh,
        "humMoney" => $money,
        "humID" => 4
    ));
}

$sqlchildren = "SELECT * FROM viewconsumer WHERE roomID=3";
$querychildren = $db->prepare($sqlchildren);
$querychildren->execute();
$children = $querychildren->fetch(PDO::FETCH_ASSOC);

if ($children['airValue'] > 16) {
    $kwh = $children['airKwh'] + 0.2;
    $money = $kwh * 0.2;
    $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
    $uptadeair = $energyair->execute(array(
        "airKwh" => $kwh,
        "airMoney" => $money,
        "airID" => 3
    ));
}
if ($children["lightValue"] == "ON") {
    $kwh = $children['lightKwh'] + 0.1;
    $money = $kwh * 0.2;
    $energylight = $db->prepare("UPDATE light SET lightKwh=:lightKwh,lightMoney=:lightMoney WHERE lightID=:lightID");
    $uptadelight = $energylight->execute(array(
        "lightKwh" => $kwh,
        "lightMoney" => $money,
        "lightID" => 3
    ));
}
if ($children["humValue"] > 0) {
    $kwh = $children['humKwh'] + 0.05;
    $money = $kwh * 0.2;
    $energyhum = $db->prepare("UPDATE humidity SET humKwh=:humKwh,humMoney=:humMoney WHERE humID=:humID");
    $uptadehum = $energyhum->execute(array(
        "humKwh" => $kwh,
        "humMoney" => $money,
        "humID" => 3
    ));
}

$sqlkitchen = "SELECT * FROM viewconsumer WHERE roomID=2";
$querykitchen = $db->prepare($sqlkitchen);
$querykitchen->execute();
$kitchen = $querykitchen->fetch(PDO::FETCH_ASSOC);

if ($kitchen['airValue'] > 16) {
    $kwh = $kitchen['airKwh'] + 0.2;
    $money = $kwh * 0.2;
    $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
    $uptadeair = $energyair->execute(array(
        "airKwh" => $kwh,
        "airMoney" => $money,
        "airID" => 2
    ));
}
if ($kitchen["lightValue"] == "ON") {
    $kwh = $kitchen['lightKwh'] + 0.1;
    $money = $kwh * 0.2;
    $energylight = $db->prepare("UPDATE light SET lightKwh=:lightKwh,lightMoney=:lightMoney WHERE lightID=:lightID");
    $uptadelight = $energylight->execute(array(
        "lightKwh" => $kwh,
        "lightMoney" => $money,
        "lightID" => 2
    ));
}
if ($kitchen["humValue"] > 0) {
    $kwh = $kitchen['humKwh'] + 0.05;
    $money = $kwh * 0.2;
    $energyhum = $db->prepare("UPDATE humidity SET humKwh=:humKwh,humMoney=:humMoney WHERE humID=:humID");
    $uptadehum = $energyhum->execute(array(
        "humKwh" => $kwh,
        "humMoney" => $money,
        "humID" => 2
    ));
}

$sqlliving = "SELECT * FROM viewconsumer WHERE roomID=1";
$queryliving = $db->prepare($sqlliving);
$queryliving->execute();
$living = $queryliving->fetch(PDO::FETCH_ASSOC);

if ($living['airValue'] > 16) {
    $kwh = $living['airKwh'] + 0.2;
    $money = $kwh * 0.2;
    $energyair = $db->prepare("UPDATE aircondition SET airKwh=:airKwh,airMoney=:airMoney WHERE airID=:airID");
    $uptadeair = $energyair->execute(array(
        "airKwh" => $kwh,
        "airMoney" => $money,
        "airID" => 1
    ));
}
if ($living["lightValue"] == "ON") {
    $kwh = $living['lightKwh'] + 0.1;
    $money = $kwh * 0.2;
    $energylight = $db->prepare("UPDATE light SET lightKwh=:lightKwh,lightMoney=:lightMoney WHERE lightID=:lightID");
    $uptadelight = $energylight->execute(array(
        "lightKwh" => $kwh,
        "lightMoney" => $money,
        "lightID" => 1
    ));
}
if ($living["humValue"] > 0) {
    $kwh = $living['humKwh'] + 0.05;
    $money = $kwh * 0.2;
    $energyhum = $db->prepare("UPDATE humidity SET humKwh=:humKwh,humMoney=:humMoney WHERE humID=:humID");
    $uptadehum = $energyhum->execute(array(
        "humKwh" => $kwh,
        "humMoney" => $money,
        "humID" => 1
    ));
}

for ($i = 1; $i <= 4; $i++) {
    $handlepull = $db->prepare('SELECT airValue, heatValue,roomID from viewconsumer WHERE roomID=:roomID');
    $handlepull->bindParam(':roomID', $i);
    $handlepull->execute();
    $result = $handlepull->fetch(\PDO::FETCH_ASSOC);
    $roomTemp = $result["heatValue"];
    
    $fanTemp = $result["airValue"];
    echo $fanTemp;
    
    if ($fanTemp > 0) {
        if ($roomTemp > $fanTemp) {
            $newRoomTemp = $roomTemp - 1;
            $handle = $db->prepare('UPDATE heat SET heatValue=:heatValue WHERE heatRoomID = :heatRoomID');
            $handle->bindParam(':heatValue', $newRoomTemp);
            $handle->bindParam(':heatRoomID', $i);
            
            $handle->execute();
            
        } else {
            $newRoomTemp = $roomTemp + 1;
            $handle = $db->prepare('UPDATE heat SET heatValue=:heatValue WHERE heatRoomID = :heatRoomID');
            $handle->bindParam(':heatValue', $newRoomTemp);
            $handle->bindParam(':heatRoomID', $i);
            $handle->execute();
        }
    }
}


<?php
include("connectdb.php");

//Light Update
$sqllight = $db->prepare('UPDATE sensor SET sensorKwh = sensorKwh + 0.1,sensorMoney=sensorKwh*0.2 WHERE sensorType = "Light" AND sensorValue=1;');
$sqllight->execute();

//Humidity Update
$sqlhum = $db->prepare('UPDATE sensor SET sensorKwh = sensorKwh + 0.2,sensorMoney=sensorKwh*0.2 WHERE sensorType = "Humidity" AND sensorValue>30;');
$sqlhum->execute();

//Air Update
$sqlair = $db->prepare('UPDATE sensor SET sensorKwh = sensorKwh + 0.3,sensorMoney=sensorKwh*0.2 WHERE sensorType = "Air Condition" AND sensorValue>15;');
$sqlair->execute();

//Tempature Update
$sqlair = $db->prepare('UPDATE sensor
SET sensorValue = sensorValue + 1
WHERE column1 > column2;');
$sqlair->execute();








for ($i = 1; $i <= 4; $i++) {
    $handlepull = $db->prepare('SELECT airValue, heatValue,roomID from viewconsumer WHERE roomID=:roomID');
    $handlepull->bindParam(':roomID', $i);
    $handlepull->execute();
    $result = $handlepull->fetch(\PDO::FETCH_ASSOC);
    $roomTemp = $result["heatValue"];
    $fanTemp = $result["airValue"];
    if ($fanTemp > 0) {
        if ($roomTemp > $fanTemp) {
            $newRoomTemp = $roomTemp - 1;
            $handle = $db->prepare('UPDATE heat SET heatValue=:heatValue,heatTime=:heatTime WHERE heatRoomID = :heatRoomID');
            $handle->bindParam(':heatValue', $newRoomTemp);
            $currentTimestamp = date('Y-m-d H:i:s');
            $handle->bindParam(':heatTime', $currentTimestamp);
            $handle->bindParam(':heatRoomID', $i);

            $handle->execute();
        } else {
            $newRoomTemp = $roomTemp + 1;
            $handle = $db->prepare('UPDATE heat SET heatValue=:heatValue,heatTime=:heatTime WHERE heatRoomID = :heatRoomID');
            $handle->bindParam(':heatValue', $newRoomTemp);
            $currentTimestamp = date('Y-m-d H:i:s');
            $handle->bindParam(':heatTime', $currentTimestamp);
            $handle->bindParam(':heatRoomID', $i);
            $handle->execute();
        }
    }
}

for ($i = 1; $i <= 4; $i++) {
    $handlepull = $db->prepare('SELECT humValue from humidity WHERE humRoomID=:roomID');
    $handlepull->bindParam(':roomID', $i);
    $handlepull->execute();
    $result = $handlepull->fetch(\PDO::FETCH_ASSOC);
    $humValue = $result["humValue"];
    if ($humValue > 28) {
        $options = array(1, 2, 3, -1, -2, -3);
        $randomIndex = array_rand($options);
        $randomValue = $options[$randomIndex];
        $newHumValue = $humValue + $randomValue;
        $handle = $db->prepare('UPDATE humidity SET humValue=:humValue,humTime=:humTime WHERE humRoomID = :humRoomID');
        $currentTimestamp = date('Y-m-d H:i:s');
        $handle->bindParam(':humTime', $currentTimestamp);
        $handle->bindParam(':humValue', $newHumValue);
        $handle->bindParam(':humRoomID', $i);
        $handle->execute();
    } elseif ($humValue <= 28) {
        $options = array(1, 2, 3, 4, 5, 6);
        $randomIndex = array_rand($options);
        $randomValue = $options[$randomIndex];
        $newHumValue = $humValue + $randomValue;
        $handle = $db->prepare('UPDATE humidity SET humValue=:humValue,humTime=:humTime WHERE humRoomID = :humRoomID');
        $handle->bindParam(':humValue', $newHumValue);
        $currentTimestamp = date('Y-m-d H:i:s');
        $handle->bindParam(':humTime', $currentTimestamp);
        $handle->bindParam(':humRoomID', $i);
        $handle->execute();
    }
    elseif($humValue>70){
        $options = array(-1, -2, -3, -4, -5, -6);
        $randomIndex = array_rand($options);
        $randomValue = $options[$randomIndex];
        $newHumValue = $humValue + $randomValue;
        $handle = $db->prepare('UPDATE humidity SET humValue=:humValue,humTime=:humTime WHERE humRoomID = :humRoomID');
        $handle->bindParam(':humValue', $newHumValue);
        $currentTimestamp = date('Y-m-d H:i:s');
        $handle->bindParam(':humTime', $currentTimestamp);
        $handle->bindParam(':humRoomID', $i);
        $handle->execute();
    }
}


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
/*$sqltemp = $db->prepare('UPDATE sensor
SET sensorValue = sensorValue - 1
WHERE t.sensorValue > a.sensorValue ;');
$sqltemp->execute();*/

//Random Humidity Update
$options = array(1,-1);
$randomIndex = array_rand($options);
$randomValue = $options[$randomIndex];
if($randomValue==1){
    $sqlupdatehum=$db->prepare("UPDATE sensor SET sensorValue=sensorValue+1 WHERE sensorType='Humidity' AND sensorValue<90");
}
elseif($randomValue==-1){
    $sqlupdatehum=$db->prepare("UPDATE sensor SET sensorValue=sensorValue-1 WHERE sensorType='Humidity' AND sensorValue>30");
}

//Random Temperature Update
$options = array(1,-1);
$randomIndex = array_rand($options);
$randomValue = $options[$randomIndex];
if($randomValue==1){
    $sqlupdatehum=$db->prepare("UPDATE sensor SET sensorValue=sensorValue+1 WHERE sensorType='Temperature' AND sensorValue<40");
}
elseif($randomValue==-1){
    $sqlupdatehum=$db->prepare("UPDATE sensor SET sensorValue=sensorValue-1 WHERE sensorType='Temperature' AND sensorValue>0");
}






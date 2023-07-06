<?php
include("connectdb.php");
if(isset($_POST["lighton"])){
    $value=1;
    $sqllight=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqllight->bindParam(":sensorValue",$value);
    $sqllight->bindParam(":sensorID",$_POST["sensorID"]);
    $sqllight->execute();
    
}
if(isset($_POST["lightoff"])){
    $value=0;
    $sqllight=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqllight->bindParam(":sensorValue",$value);
    $sqllight->bindParam(":sensorID",$_POST["sensorID"]);
    $sqllight->execute();
    
}
if(isset($_POST["airon"])){
    $value=16;
    $sqlair=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorValue",$value);
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    
}
if(isset($_POST["airoff"])){
    $value=0;
    $sqlair=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorValue",$value);
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    
}
if(isset($_POST["airup"])){
    $sqlair=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    $value=$sqlair->fetch(PDO::FETCH_ASSOC);
    if($value<35) {
        $value=$value+1;
    }
    $sqlairupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlairupdate->bindParam(":sensorValue",$value);
    $sqlairupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlairupdate->execute();
    
}
if(isset($_POST["airdown"])){
    $sqlair=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    $value=$sqlair->fetch(PDO::FETCH_ASSOC);
    if($value>15) {
        $value=$value-1;
    }
    $sqlairupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlairupdate->bindParam(":sensorValue",$value);
    $sqlairupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlairupdate->execute();
    
}
if(isset($_POST["humup"])){
    $sqlhum=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlhum->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhum->execute();
    $value=$sqlhum->fetch(PDO::FETCH_ASSOC);
    if($value<100) {
        $value=$value+1;
    }
    $sqlhumupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlhumupdate->bindParam(":sensorValue",$value);
    $sqlhumupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhumupdate->execute();
    
}
if(isset($_POST["humdown"])){
    $sqlhum=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlhum->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhum->execute();
    $value=$sqlhum->fetch(PDO::FETCH_ASSOC);
    if($value>0) {
        $value=$value-1;
    }
    $sqlhumupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlhumupdate->bindParam(":sensorValue",$value);
    $sqlhumupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhumupdate->execute();
    
}

header("Location:../roomP.php");


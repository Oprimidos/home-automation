<?php
include("connectdb.php");
if(isset($_POST["lighton"])){
    $value=1;
    $sqllight=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqllight->bindParam(":sensorValue",$value);
    $sqllight->bindParam(":sensorID",$_POST["sensorID"]);
    $sqllight->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}
if(isset($_POST["lightoff"])){
    $value=0;
    $sqllight=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqllight->bindParam(":sensorValue",$value);
    $sqllight->bindParam(":sensorID",$_POST["sensorID"]);
    $sqllight->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}
if(isset($_POST["airon"])){
    $value=16;
    $sqlair=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorValue",$value);
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}
if(isset($_POST["airoff"])){
    $value=0;
    $sqlair=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorValue",$value);
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}
if(isset($_POST["airup"])){
    $sqlair=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    $air=$sqlair->fetch(PDO::FETCH_ASSOC);
    $exvalue=$air["sensorValue"];
    if($exvalue<35) {
        $value=$exvalue+1;
    }
    if($exvalue==35){
        $value=$exvalue;
    }

    $sqlairupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlairupdate->bindParam(":sensorValue",$value);
    $sqlairupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlairupdate->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}
if(isset($_POST["airdown"])){
    $sqlair=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlair->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlair->execute();
    $air=$sqlair->fetch(PDO::FETCH_ASSOC);
    $exvalue=$air["sensorValue"];
    if($exvalue>15) {
        $value=$exvalue-1;
    }
    if($exvalue==15){
        $value=$exvalue;
    }
    $sqlairupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlairupdate->bindParam(":sensorValue",$value);
    $sqlairupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlairupdate->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}
if(isset($_POST["humup"])){
    $sqlhum=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlhum->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhum->execute();
    $hum=$sqlhum->fetch(PDO::FETCH_ASSOC);
    $exvalue=$hum["sensorValue"];
    if($exvalue<100) {
        $value=$exvalue+1;
    }
    $sqlhumupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlhumupdate->bindParam(":sensorValue",$value);
    $sqlhumupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhumupdate->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}
if(isset($_POST["humdown"])){
    $sqlhum=$db->prepare("SELECT sensorValue FROM sensor WHERE sensorID=:sensorID");
    $sqlhum->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhum->execute();
    $value=$sqlhum->fetch(PDO::FETCH_ASSOC);
    $hum=$sqlhum->fetch(PDO::FETCH_ASSOC);
    $exvalue=$hum["sensorValue"];
    if($exvalue<100) {
        $value=$exvalue+1;
    }
    $sqlhumupdate=$db->prepare("UPDATE sensor SET sensorValue=:sensorValue WHERE sensorID=:sensorID");
    $sqlhumupdate->bindParam(":sensorValue",$value);
    $sqlhumupdate->bindParam(":sensorID",$_POST["sensorID"]);
    $sqlhumupdate->execute();
    $url="Location:../roomP.php?roomID=";
    $roomID=$_POST['roomID'];
    header($url.$roomID);
    
}




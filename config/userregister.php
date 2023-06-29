<?php
include("connectdb.php");
if (isset($_POST["registerC"])) {
    if (isset($_FILES["homePhoto"])) {
        echo "here\n";
        $upload = "../assets/images/";
        $type = "Consumer";

        //Save file into file and database
        $stmt = $db->query("SELECT MAX(homeID) AS max_id FROM home");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxId = $row['max_id'] + 1;
        $oldFileName = $_FILES["homePhoto"]["name"];
        $Extension = pathinfo($oldFileName, PATHINFO_EXTENSION);
        $_FILES["homePhoto"]["name"] = $maxId . "." . $Extension;
        $file = $_FILES["homePhoto"]["name"];
        @move_uploaded_file($_FILES["homePhoto"]["tmp_name"], $upload . $file);
        $sqlpicture = $upload . $file;

        $insertregister = $db->prepare("INSERT INTO register 
        (regFirstName, regLastName,regMail,regPassword,regType,regHomeName,regHomePhoto,regHomeID) 
        VALUES (:regFirstName, :regLastName,:regMail,:regPassword,:regType,:regHomePhoto,:regHomeName,:regHomeID)");
        $insertregister->bindParam(':regFirstName', $_POST["userFirstName"]);
        $insertregister->bindParam(':regLastName', $_POST["userLastName"]);
        $insertregister->bindParam(':regMail', $_POST["userMail"]);
        $insertregister->bindParam(':regPassword', $_POST["userPassword"]);
        $insertregister->bindParam(':regType', $type);
        $insertregister->bindParam(':regHomeName', $_POST["homeName"]);
        $insertregister->bindParam(':regHomePhoto', $sqlpicture);
        $insertregister->bindParam(':regHomeID', $maxId);
        $insertregister->execute();
    }
    header("Location:../register.php?islem=ok");
}
else {
    header("Location:../register.php?islem=no");
}
if (isset($_POST["registerP"])) {
    $type = "Producer";
    $stmt = $db->query("SELECT MAX(homeID) AS max_id FROM home");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxId = $row['max_id'] + 1;
    $insertregister = $db->prepare("INSERT INTO register 
        (regFirstName, regLastName,regMail,regPassword,regType,regHomeID) 
        VALUES (:regFirstName, :regLastName,:regMail,:regPassword,:regType,:regHomeID)");
    $insertregister->bindParam(':regFirstName', $_POST["userFirstName"]);
    $insertregister->bindParam(':regLastName', $_POST["userLastName"]);
    $insertregister->bindParam(':regMail', $_POST["userMail"]);
    $insertregister->bindParam(':regPassword', $_POST["userPassword"]);
    $insertregister->bindParam(':regType', $type);
    $insertregister->bindParam(':regHomeID', $_POST["homeID"]);
    $insertregister->execute();
    header("Location:../registerP.php?islem=ok");
}
else{
    header("Location:../registerP.php?islem=no");
}

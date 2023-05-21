<?php
try{
	$db=new PDO("mysql:host=localhost;dbname=home_automation_db","root","");
	//echo "Connected Succesfully";
}
catch(Exception $e){
	echo "Bir hata oluştu: ".$e->getMessage();
}

?>
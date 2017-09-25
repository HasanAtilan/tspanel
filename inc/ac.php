<?php

session_start();

require 'baglanti/database.php';

if( isset($_SESSION['girisyap']) && !empty($_SESSION['girisyap']) ){

	$records = $conn->prepare('SELECT id,email,password,token,port,credits FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['girisyap']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}
else
{
	header("Location: giris.php");
	die();
}

?>

<?php
require_once("baglanti/framework/TeamSpeak3.php");
require_once("baglanti/framework/Node/Host.php");


$ts3_VirtualServer = TeamSpeak3::factory("serverquery://serveradmin:YATQA SİFRE@YATQA İP:10011/");
$portunuz= $user['port'];
$isim=$ts3_VirtualServer->serverIdGetByPort($portunuz);
$ts3_VirtualServer->serverStart($isim);

header('Location: index.php');
  exit();
  
	?>
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

// load framework files
require_once("baglanti/framework/TeamSpeak3.php");



$ts3_VirtualServer = TeamSpeak3::factory("serverquery://serveradmin:YATQA SİFRE@YATQA İP:10011/?server_port=".$user['port']."");
$ts3_VirtualServer->stop();

header('Location: index.php');
  exit();
  
	?>
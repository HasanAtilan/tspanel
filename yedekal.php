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



// load framework files
require_once("baglanti/framework/TeamSpeak3.php");
/* 
  CHANGE THIS LINE WITH YOUR TS3 QUERY INFOS
*/

$ts3_VirtualServer = TeamSpeak3::factory("serverquery://serveradmin:YATQA SİFRE@YATQA İP:10011/?server_port=".$user['port']."");
$ts_host = '127.0.0.1';
$datayedek = $ts3_VirtualServer->snapshotCreate();
if( $datayedek != FALSE) {
	file_put_contents('yedekler/yedek_'.str_replace('.','',$ts_host).'_'.$user['port'].'_'.time().'.snapshot', $datayedek);
	$sql_query = "INSERT INTO yedekler(id,yedekadi,yedekaciklama,port) VALUES (".$_SESSION['girisyap'].", '".('yedekler/yedek_'.str_replace('.','',$ts_host).'_'.$user['port'].'_'.time().'.snapshot')."', 'YEDEK (".date('d.m.Y - H:i:s').") ALINDI', ".$user['port'].")";
	$conn->query($sql_query);
  $_SESSION['flash']['danger'] = "YEDEK BAŞARIYLA ALINDI!";
  header('Location: yedekkur.php');
  exit();
}

?>
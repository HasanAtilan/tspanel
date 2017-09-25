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


	// create a top-level channel and get its ID
require_once("baglanti/framework/TeamSpeak3.php");





$port = rand(1,350); 

	

$slotcount = '50';



// query baglanti
try {
	TeamSpeak3::init();
require_once("baglanti/baglan.php");


if(isset($user["credits"]) && $user["credits"] >= 1):
	// server olustur
	$new_sid = $ts3_ServerInstance->serverCreate(array(
	  "virtualserver_name"               => $_POST["username"],
	  "virtualserver_maxclients"         => '50',
	  "virtualserver_port"               => $port,
	));

	// bilgi ciktisi
	$token = (string)$new_sid["token"];
	$port = (string)$new_sid["virtualserver_port"];

	// Enter the new user in the database

	$credidendus = floatval(floatval($user["credits"]) - floatval(1));
	$sql = "UPDATE users SET token=:token, port=:port, credits=:credits WHERE id = :id";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':token', $token);
	$stmt->bindParam(':port', $port);
	$stmt->bindParam(':credits', $credidendus);
	$stmt->bindParam(':id', $_SESSION['girisyap']);
	$stmt->execute();

	

	
	// create a top-level channel and get its IDs
	require_once("baglanti/framework/TeamSpeak3.php");
$ts3_VirtualServer = TeamSpeak3::factory("serverquery://serveradmin:YATQA SİFRE@YATQA İP:10011/?server_port=".$port);

$nome_sala         = $_POST['nsala'];


// create a top-level channel and get its ID
$top_cid1 = $ts3_VirtualServer->channelCreate(array(
  'channel_name'           => "[spacer]┌──────────────────────────────┐",
  'channel_topic'          => "$nome_sala",
  'channel_codec'          => TeamSpeak3::CODEC_SPEEX_WIDEBAND,
  'channel_flag_permanent' => TRUE,

  ));
  

// create a top-level channel and get its ID
$top_cid2 = $ts3_VirtualServer->channelCreate(array(
  'channel_name'           => "[spacer]├ ▪$nome_sala @ Yönetim",
  'channel_topic'          => "$nome_sala",
  'channel_codec'          => TeamSpeak3::CODEC_SPEEX_WIDEBAND,
  'channel_flag_permanent' => TRUE,

  ));
 
 $top_cid3 = $ts3_VirtualServer->channelCreate(array( 
   'channel_name'           => "[spacer]├ ▪$nome_sala @ Toplanti",
  'channel_topic'          => "$nome_sala",
  'channel_codec'          => TeamSpeak3::CODEC_SPEEX_WIDEBAND,
  'channel_flag_permanent' => TRUE,
));
   $top_cid4 = $ts3_VirtualServer->channelCreate(array(
  'channel_name'           => "[spacer]├ ▪$nome_sala @ Oyun Odasi",
  'channel_topic'          => "$nome_sala",
  'channel_codec'          => TeamSpeak3::CODEC_SPEEX_WIDEBAND,
  'channel_flag_permanent' => TRUE,
  
  ));
 
 $top_cid5 = $ts3_VirtualServer->channelCreate(array(
  'channel_name'           => "[spacer]├ ▪$nome_sala @ Destek Odasi",
  'channel_topic'          => "$nome_sala",
  'channel_codec'          => TeamSpeak3::CODEC_SPEEX_WIDEBAND,
  'channel_flag_permanent' => TRUE,
 ));

 $top_cid6 = $ts3_VirtualServer->channelCreate(array(
  'channel_name'           => "[spacer]├ ▪$nome_sala @ Kurallarimiz",
  'channel_topic'          => "$nome_sala",
  'channel_codec'          => TeamSpeak3::CODEC_SPEEX_WIDEBAND,
  'channel_flag_permanent' => TRUE,
));

$top_cid7 = $ts3_VirtualServer->channelCreate(array(
  'channel_name'           => "[spacer]└──────────────────────────────┘",
  'channel_topic'          => "$nome_sala",
  'channel_codec'          => TeamSpeak3::CODEC_SPEEX_WIDEBAND,
  'channel_flag_permanent' => TRUE,

  ));
  
  header('Location: ?sayfa=anasayfa');
  
else:
	header('Location: ?sayfa=anasayfa');
endif;
	} catch(Exception $e) {
	
	}

	
	
?>
	
	








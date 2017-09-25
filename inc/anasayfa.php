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

if(!defined('6755682621')) {

   die('Direct access not permitted');

}

?>

<?php

function ping($host, $port, $timeout) { 
  $tB = microtime(true); 
  $fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
  if (!$fP) { return "down"; } 
  $tA = microtime(true); 
  return round((($tA - $tB) * 1000), 0)." ms"; 
}

//Echoing it will display the ping if the host is up, if not it'll say "down".


?>

<?php

// load framework files
require_once("baglanti/framework/TeamSpeak3.php");

// connect to local server, authenticate and spawn an object for the virtual server on port 9987

require_once("baglanti/panelbaglan.php");


	
$name = $ts3_VirtualServer->virtualserver_name;	
	
	
	?>
	
<!-- ust -->
	<div class="ust">
		<table>
			<tr>

				<th><center>Durum</th>
				<th><center>Sunucu Adı</th>
				<th><center>Port</th>
				<th><center>İP</th>
				<th><center>Oyuncu</th>
				<th><center>Bağlan</th>
			</tr>
			<tr>

				<td><?= $server_status = $ts3_VirtualServer->virtualserver_status ?></td>
				<td><?php echo $name; ?></td>
				<td><? echo $user['port']; ?></td>
				<td>5.135.235.132</td>
				<td><?= $server_status = $server_actuallyusers = $ts3_VirtualServer->virtualserver_clientsonline - $ts3_VirtualServer->virtualserver_queryclientsonline; ?>/<?=  $server_status = $ts3_VirtualServer->virtualserver_maxclients ?></td>
				<td><a href="ts3server://5.135.235.132:<? echo $user['port']; ?>"><img src="tasarim/baglan.png"></a></td>
			</tr>
		</table>
		<div>
		<center>TS3 Kontrol Paneline Hoşgeldiniz</center>
		</div>
	</div>



 <br><div class="panel panel-default">
  <div class="panel-heading">Ana Sayfa</div>
<div class="panel-body"> 

<strong>TS3.WEB.TR</strong> <p>Hoşgeldiniz Değerli Müşterimiz !</p> <p>Teamspeak 3 Kontrol Panelimiz <strong>Aktif Edilmiştir</strong> </p> <li> 1.adım<strong> Yardım ve Destek İçin Destek Talebi Oluşturunuz </strong> </li><li> 2.adım<strong> Sunucu İsmine Küfür,Argo,VS Yazanların Uyarısız Kapatılır!  </strong> </li><li> 3.adım<strong> Panel Şifrenizi Kimseye Vermeyin Yetkililerimiz Asla Sizden Şifre İstemez! </strong> </li><li> 4.adım<strong> Herkez Kendi Sunucusundan Sorumludur! </strong></li><li> 5.adım<strong> Herkez Kurallarımızı Okumuş Sayılır Bizi Tercih Ettiğiniz İçin Teşekkür Ederiz. </strong><br> &nbsp; <p><strong></strong></p> <br> </li></div> </div>
<div class="panel panel-default">

                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i>Güncellemeler
                            </div>

                            <div class="panel-body">
                                <div class="list-group">

      
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-cloud-upload"></i> Gelişmiş Panelimiz Aktif Edildi.
                                    <span class="pull-right text-muted small"><em>25 Mayıs 2017</em>
                                    </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-shield"></i> Yedek Al Yedek Yükle Eklenmistir.
                                    <span class="pull-right text-muted small"><em>25 Mayıs 2017</em>
                                    </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-support"></i> Destek İçin Ticket Açınız!
                                    <span class="pull-right text-muted small"><em>25 Mayıs 2017</em>
                                    </span>
                                    </a>
                                    </a>
                                </div>
                            </div>
  </div>

</div>



        </div>
		
      </div>
	  
    </div>
	
  </body>
</html>
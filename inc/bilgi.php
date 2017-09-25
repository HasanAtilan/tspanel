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

// connect to local server, authenticate and spawn an object for the virtual server on port 9987

require_once("baglanti/panelbaglan.php");


	
	
	
	
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
				
<div class="panel panel-default">

  <div class="panel-heading">Sunucu Bilgisi</div>

<div class="panel panel-default">


							<div class="list-group">

        
           <a class="list-group-item">
            <i class="fa fa-bolt fa-fw"></i> Anlık Sunucu Version: <b class="ng-binding">2.0.1</b>
        
        		
        <a class="list-group-item ng-binding">
            <i class="fa fa-refresh fa-spin fa-fw"></i> Anlık Genel Ping: <b class="ng-binding"><?php echo ping("5.135.235.132", 80, 10); ?></b>
        
        <a class="list-group-item ng-binding">
            <i class="fa fa-users fa-fw"></i> Aktif Kişiler: <b class="ng-binding"><?= $server_status = $server_actuallyusers = $ts3_VirtualServer->virtualserver_clientsonline - $ts3_VirtualServer->virtualserver_queryclientsonline; ?></b>
       </a>        
                       
					    <a class="list-group-item ng-binding">
            <i class="fa fa-download fa-fw"></i> Anklık İndirme: <b class="ng-binding"><?=  $server_status = $ts3_VirtualServer->connection_bytes_received_total ?></b>
       </a>  
	   
	    <a class="list-group-item ng-binding">
            <i class="fa fa-bullseye fa-fw"></i> Anlık Yükleme: <b class="ng-binding"><?=  $server_status = $ts3_VirtualServer->connection_bytes_sent_total ?></b>
       </a>  
	   
	    <a class="list-group-item ng-binding">
            <i class="fa fa-thermometer-full fa-fw"></i> Max Slot: <b class="ng-binding"><?=  $server_status = $ts3_VirtualServer->virtualserver_maxclients ?></b>
       </a>  
	   
	    <a class="list-group-item ng-binding">
            <i class="fa fa-rss fa-fw"></i> Sunucu Durumu: <b class="ng-binding"><?= $server_status = $ts3_VirtualServer->virtualserver_status ?></b>
       </a>  
	   
	   <a class="list-group-item ng-binding">
            <i class="fa fa-adjust fa-fw"></i> Anlık Online: <b class="ng-binding"><?= $server_status = $server_actuallyusers = $ts3_VirtualServer->virtualserver_clientsonline - $ts3_VirtualServer->virtualserver_queryclientsonline; ?></b>
       </a>  
 </div>

</div>
													</div>
					</div>
					
				</div>
		</div>
		
	</div>

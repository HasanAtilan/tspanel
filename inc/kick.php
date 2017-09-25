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

// connect to local server, authenticate and spawn an object for the virtual server on port 9987

require_once("baglanti/panelbaglan.php");

if(isset($_POST['kick'])) {
		
		$reason = $_POST['reason'];
		$nick = $_POST['client'];
		$time = $_POST['time'];
		$ts3_VirtualServer->clientGetByName($nick)->kick(TeamSpeak3::KICK_SERVER, $reason);
	}
	
	
?>


				
<div class="panel panel-default">

  <div class="panel-heading">Kullanici Kick</div>

<div class="panel panel-default">


  <div class="panel-body">
<form class="form-signin" method="POST">
            <header>
			</header>					
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title"></h3>
						</div>
						<div class="box-body">
						<?php if(isset($_POST['kick'])) { 
								
								$razon = $_POST['reason'];
								$nick = $_POST['client'];
								$time = $_POST['time'];
								if($time == 0){$timefinal = "Permanent";} else{$timefinal = $time;}
							?>	
							<div class="alert alert-success"><b></div>
							<meta http-equiv="refresh" content="3" >
							
							<?php }else{?>
							
							<form role="form" method="post" >

								<div class="form-group">
									<center><label>Kullanici Sec</label>
									<select name="client" placeholder="100" class="form-control" style="width: 100%;
    background-clip: border-box;">
	
	<?php 
											
											foreach($ts3_VirtualServer->clientList() as $tsclient) {
												if($tsclient['client_type'] == 1) continue;
												echo"<option value=$tsclient>".$tsclient."</option>";
											}
										?>
																			</select>
								</div>
								
								<div class="form-group">
									<center><label>Kickleme Nedeni</label></center>
									<input type="text" class="form-control" name="reason" placeholder="Nedeni">
								</div>
						
								<div class="box-footer">
									
									<center><label>Kickleme Süresi</label></center>
									<input type="text" class="form-control" name="time" placeholder="Nedeni">
									
									<br><center><input type="submit" name="kick" class="btn btn-lg btn-primary btn-block" value="Kickle!" />
								</div>
							</form>
							
							<?php } ?>
													</div>
					</div>
					
				</div>
		</div>
		
	</div>

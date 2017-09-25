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

if(isset($_POST['gonder'])) {
		$message = $_POST['message'];
		$ts3_VirtualServer->message("[b][color=green]".$message."[/color][/b]   [COLOR=#ff0000] Yönetim Panelinden Gönderildi.[/COLOR]");
		
		
	}
	
	
?>


				
<div class="panel panel-default">

  <div class="panel-heading">Sunucuya Mesaj Gönder</div>

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
						<? if(isset($_POST['gonder'])) { ?>	
							<div class="alert alert-success"><b></div>
							<meta http-equiv="refresh" content="3" >
							
							<?php }else{?>
							
							<form role="form" method="post" >

								<div class="form-group">
									
								</div>
								<div class="form-group">
									<center><label>Sunucuya Mesaj Gönder</label></center>
									<input type="text" class="form-control" name="message" placeholder="Buraya Mesaj Yazın">
								</div>
						
								<div class="box-footer">
									
								
									<br><center><input type="submit" name="gonder" class="btn btn-lg btn-primary btn-block" value="Gönder!" />
								</div>
							</form>
							
							<?php } ?>
													</div>
					</div>
					
				</div>
		</div>
		
	</div>

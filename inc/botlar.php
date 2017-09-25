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


	
?>


				
<div class="panel panel-default">

  <div class="panel-heading">Bot Yönetimi</div>

<div class="panel panel-default">


  <div class="panel-body">

							
							
						<div class="col-md-4 col-sm-4 col-xs-8">
    <div class="panel panel-danger">
         <div class="panel-heading">Saat Bot Kur</div>              
            <div class="panel-body">     
			
         <?php $Serverport = $ts3_VirtualServer->virtualserver_port; ?>
		 	<form action="http://185.114.23.83/timebot.php" method="POST">
			<img src="https://i.hizliresim.com/qW9mJd.png" width="200" height="100">


					<div class="form-group">										 
					<input readonly="" required="" type="hidden" class="form-control" id="port" name="port" value="<?php echo $Serverport; ?>">
					 
			
										 					 

 
		  <button type="submit" name="Start" class="btn btn-success btn-block">Kur </button>
		  
				</form>							
		

							</form>
							

	
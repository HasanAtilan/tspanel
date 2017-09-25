<?php
error_reporting(0);
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


	if(isset($_SESSION["server"])){
	$ts3_VirtualServer = unserialize($_SESSION["server"]);}
	else {echo'<meta content="12;url=setting.php">';}
	$ts3_VirtualServer->selfUpdate(array('client_nickname'=>"Web Panel"));
	$zero = $one = $two = $three = '';
if (isset($_POST['edit'])){
	$name = $_POST['nameofserver'];
    $welcomemessage = $_POST['welcomemessage'];
	$gfximgurl = $_POST['gfximgurl'];
	$gfxurl = $_POST['gfxurl'];
	$hostmessage = $_POST['hostmessage'];

$edit = array("virtualserver_welcomemessage=$welcomemessage","virtualserver_name=$name",
"virtualserver_hostbanner_gfx_url=$gfximgurl",
"virtualserver_hostbanner_url=$gfxurl","virtualserver_hostmessage=$hostmessage");
$ts3_VirtualServer->modify($edit);
}
	$name = $ts3_VirtualServer->virtualserver_name;
	$welcomemessage = $ts3_VirtualServer->virtualserver_welcomemessage;
	$gfximgurl = $ts3_VirtualServer->virtualserver_hostbanner_gfx_url;
	$gfxurl = $ts3_VirtualServer->virtualserver_hostbanner_url;
	$hostmessage = $ts3_VirtualServer->virtualserver_hostmessage;
	
	
	?>
				
<div class="panel panel-default">

  <div class="panel-heading">Sunucu Düzenle</div>

  <div class="panel-body">

<form class="form-horizontal" action="" method="post">

  <fieldset>

     <div class="form-group">

      <label for="nameofserver" class="col-lg-2 control-label">Sunucu adı</label>

      <div class="col-lg-10">

        <input required type="text" class="form-control" id="nameofserver" name="nameofserver" value="<?php echo $name; ?>">

      </div>

    </div>

<fieldset>

    <div class="form-group">

      <label for="welcomemessage" class="col-lg-2 control-label">Hoşgeldin mesajı</label>
      <div class="col-lg-10">

        <input required type="text" class="form-control" id="welcomemessage" name="welcomemessage" placeholder="<?php echo $welcomemessage; ?>">

      </div>

    </div>

	<div class="form-group">

      <label for="hostmessage" class="col-lg-2 control-label">Host Mesajı</label>

      <div class="col-lg-10">

	  <input required type="text" class="form-control" id="hostmessage" name="hostmessage" value="<?php echo $hostmessage; ?>">
	  
        

      </div>
	  
  </div>

  <div class="form-group">

      <label for="gfximgurl" class="col-lg-2 control-label">Sunucu banner resmi</label>

      <div class="col-lg-10">

	  <input required type="text" class="form-control" id="gfximgurl" name="gfximgurl" value="<?php echo $gfximgurl; ?>">
	  
        

      </div>
	  
  </div>
  
  <div class="form-group">

      <label for="gfxurl" class="col-lg-2 control-label">Sunucu banner link</label>

      <div class="col-lg-10">

	  <input required type="text" class="form-control" id="gfxurl" name="gfxurl" value="<?php echo $gfxurl; ?>">
	  
        

      </div>
	  
  </div>
  
    <div class="form-group">

	<div class="form-actions">
					            <center><button type="submit" name="edit" class="btn btn-primary btn-large">Kaydet</button>
					          </div>
					        </fieldset>
							
  </fieldset>

</form>

</form>

</div>

</div>

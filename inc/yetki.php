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
/* 
  CHANGE THIS LINE WITH YOUR TS3 QUERY INFOS
*/

require_once("baglanti/panelbaglan.php");
/* 
  CHANGE THIS LINE WITH YOUR TS3 QUERY INFOS
*/


	try {	
		$permList = $ts3_VirtualServer->serverGroupList();
		$tokenList = $ts3_VirtualServer->privilegeKeyList(true);
	} catch( Exception $e ) {
		$tokenList = array();
	}

	if( isset($_GET['kaldirID']) ) {
		$_SESSION['flash']['success'] = "Token Kaldırıldı (TokenID: ".$_GET['kaldirID'].")";
		$ts3_VirtualServer->privilegeKeyDelete($_GET['kaldirID']);
		header('Location: tokenlist.php');
		exit();
	} elseif( isset($_POST['permidd']) ) {
		if( $_POST['permidd'] > 0 ) {
			$var = false;
			foreach($permList as $permm): 
				if($permm['type'] == 1 && $permm['sgid'] == (int)$_POST['permidd']) {
					$var = true;
					break;
				}
			endforeach;
			if( $var ) {
				$arr_ServerGroup = $ts3_VirtualServer->serverGroupGetById((int)$_POST['permidd']);
				$ts3_PrivilegeKey = $arr_ServerGroup->privilegeKeyCreate();
				$_SESSION['flash']['success'] = "Token Oluşturuldu! (TOKEN: ".$ts3_PrivilegeKey.")";
				header('Location: ?sayfa=yetkikodu');
				exit();
			} else {
				$_SESSION['flash']['danger'] = "Token Oluşturulamadı!";
				header('Location: ?sayfa=yetkikodu');
				exit();
			}
	
}
	}


?>
  
  <div class="panel panel-default">

  <div class="panel-heading">Yetki Kodu Oluştur</div>

  <div class="panel-body">

<form class="form-horizontal" action="?sayfa=yetkikodu" method="post">

  <fieldset>


      <div class="form-group">
									<center><label>Yetki Seç</label>
									<select name="permidd"  placeholder="100" class="form-control" style="width: 100%;
    background-clip: border-box;">
	
	<?php foreach($permList as $permm): if($permm['type'] != 1) continue; ?>
				<option value="<?=$permm['sgid']?>"><?php echo '(ID '.$permm['sgid'].') '.$permm['name']; ?></option>
				<?php endforeach; ?>
																			</select>
								</div>
		</center><button class="btn btn-success btn-block" style="color:white;">TOKEN OLUŞTUR</button>
				
      </div>

    </div>



		<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
	


<div class="panel panel-info">	
<div class="panel-heading">
					<h2 class="panel-title">Token Listesi</h2>
				</div>				
<div class="panel-body"><table class="table table-striped table-hover">
	<thead>
	<tr>
		<th>Token</th>
		<th>Tip</th>
		<th>Yetki 1</th>
		<th>Tarih</th>
	</tr>
	</thead>
	<tbody>
	<?php if(count($tokenList) > 0): foreach($tokenList as $tokenn): ?>
	<tr>
		<td><?php echo $tokenn['token']; ?></td>
		<td><?php echo $tokenn['token_type'] ? 'Channel (Kanal)' : 'Server' ?></td>
		<td><?php echo $tokenn['token_id1'] ? $tokenn['token_id1'] : '-' ?></td>
		<td><?php echo date('d.m.Y - H:i:s', $tokenn['token_created']); ?></td>

	</tr>
	<?php endforeach; else: ?>
	<tr>
		<td colspan="7" style="text-align:center;">Token Listesi tertemiz!</td>
	</tr>
	<?php endif; ?>
	</tbody>
</table>





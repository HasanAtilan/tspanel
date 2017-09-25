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

$cfg = include('ayar.php');

$veri1 = $conn->prepare("select * from yedekler where id=?");
$veri1->execute(array($_SESSION['girisyap']));
$ts33 = $veri1->fetch();



$idd = $_SESSION['girisyap'];

// load framework files
require_once("baglanti/framework/TeamSpeak3.php");
require_once("baglanti/panelbaglan.php");
$sql_query = "Select * From yedekler WHERE id = ".$idd;
$ts3array = array();
	$sql_query = $conn->query($sql_query);
	if( $sql_query->rowCount() > 0 ) {
		while($fetch = $sql_query->fetch(PDO::FETCH_ASSOC)) {
        	$ts3array[$fetch['id']] = $fetch;
        }
    }


if( isset($_GET['yedek']) ) {
	if( isset($ts3array[$_GET['yedek']]) ) {
		$data = file_get_contents($ts3array[$_GET['yedek']]['yedekadi']);

		if($data != '') {
			$sonuc = $ts3_VirtualServer->snapshotDeploy($data);
			$msg = 'Yedeğiniz Başarıyla Kuruldu.';
		}
	}
} elseif( isset($_GET['yedeks']) ) {
	if( isset($ts3array[$_GET['yedeks']]) ) {
		$sql_query = "DELETE From yedekler WHERE id = ".$_GET['yedeks'];
		if( $conn->query($sql_query) ) {
			echo '';
			unlink($ts3array[$_GET['yedeks']]['yedekadi']);
			unset($ts3array[$_GET['yedeks']]);
		}
	}
}


?> 

<html dir="ltr" lang="tr-TR">


<head>
		<title>TS3.web.tr » Ücretsiz TeamSpeak3</title>
		<meta content="freeddosprotection, ddos protection, free ts3, bedava ts3 koruma, ddos korumalı, TS3.web.tr" name="keywords">
		<meta content="TS3.web.tr, Ücretsiz TeamSpeak 3 Hizmeti. Sunucularınızı ücretsiz teamspeak3 kullanarak yönetebilirsiniz." name="description">
		<meta name="author" content="nepix~">
		<meta name="copyright" content="nepix">
		<meta name="rating" content="General">
		<meta name="revisit-after" content="5 days">
		<meta name="robots" content="ALL">
		<meta name="distribution" content="Global">
		<meta http-equiv="Content-Language" content="tr">
		<meta http-equiv="reply-to" content="info@TS3.web.tr">
		<meta http-equiv="pragma" content="no-cache"> 
		<meta http-equiv="Content-Type" content="text/html">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta charset="utf-8">

<link href="index/cdn/css/bootstrap.min.css" rel="stylesheet">
		<link href="index/cdn/css/font-awesome.min.css" rel="stylesheet">
		<link href="index/cdn/css/font-awesome.min.css" rel="stylesheet">
		<link href="index/cdn/css/style.min.css" rel="stylesheet">
	    <link href="assets/nepix.css" rel="stylesheet">
		<link href="tasarim/stil.css" rel="stylesheet">
</head>
	<body>
		<div id="particles-js"></div>
		<div class="alert-box success">
			<div class="bilgidiv">
			</div>
		</div>
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">
								Menü							</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html">
							<i class="fa fa-server"></i> TS3.<span style="color: #008cba;">web.tr</span>						</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

							<li>
								<a href="index.php">
									Ana Sayfa								</a>
							</li>
							<li>
								<a href="http://panel.ts3.web.tr/kayitol.php">
									Kayıt Ol								</a>
							</li>		
							
							<li>
								<a href="http://panel.ts3.web.tr/giris.php">
									Giriş Yap								</a>
							</li>
							
							
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<main>
			<section class="register">
				<!--<div class="tp-dottedoverlay twoxtwo" style="z-index:-99"></div>
				<video autoplay="" loop="" poster="video.jpg" class="bgvid">
					<source src="/video.mp4" type="video/mp4">
				</video> -->
				<div class="container">
						
						<div class="row">
							<div class="col-sm-offset-1 col-sm-10 text-center">
								<h1>ÜCRETSİZ TEAMSPEAK 3 HİZMETİ</h1>
								<h2>Kendi Sunucunuzu Oluşturun</h2>
							</div>
							<div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
															</div>
							
						</div>
									<center><span class="input-group-btn">
										<a class="btn btn-register" href="http://panel.ts3.web.tr/kayitol.php">Kayıt Ol</a>
										
									</span>
								</div>
							</div>
						</div>
					</form>
				</div>
			</section>


			<section class="main-content bg-light">
				<div class="container text-center">
					<h2 class="page-header text-center">Hoşgeldiniz</h2>
					<p>TS3.web.tr Hizmetlerini kullandığınız için teşekkür ederiz</p><p>TS3.web.tr TeamSpeak 3 Hizmeti tamamen ücretsiz ve tüm insanlığa açık bir hizmettir.</p><p>Düşünceleriniz, önerileriniz ve eleştirileriniz bizim için çok önemlidir. İletişim seçeneklerimizden bize bildirim yapabilirsiniz.</p>				</div>
			</section>

			
			 <body background="tasarim/bg_page.png">


     

    </div>



    <div class="container">

      <div class="row">

        <div class="col-sm-3">

          <div class="panel panel-default">

            <div class="panel-heading">Linkler</div>

            <div class="list-group">

              <a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=anasayfa"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Ana Sayfa</a>

              <a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=sunucuyuduzenle"><i class="fa fa-server fa-fw" aria-hidden="true"></i>&nbsp; Sunucu Düzenle</a>

			  <a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=yetkikodu"><i class="fa fa-server fa-fw" aria-hidden="true"></i>&nbsp; Yetkiler</a>
			  
              <a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=kullanicikick"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Kullanıcı Kickle</a>
			  
			  <a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=kullaniciban"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>&nbsp; Kullanıcı Yasakla</a>
			  
			  <a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=sunucumesaj"><i class="fa fa-wrench fa-fw" aria-hidden="true"></i>&nbsp; Sunucuya Mesaj Gönder</a>

			  <a class="list-group-item" href="?sayfa=sunucubilgi"><i class="fa fa-support fa-fw" aria-hidden="true"></i>&nbsp; Sunucu Bilgisi</a>
			  
<a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=sunucuharitasi"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i>&nbsp; Sunucu Haritası</a>

<a class="list-group-item" href="http://panel.ts3.web.tr/yedekkur.php"><i class="fa fa-close fa-fw" aria-hidden="true"></i>&nbsp; Yedek Yönetimi</a>

<a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=botyonetim"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Bot Yönetimi</a>

<a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=sunucuyuac" style="color: red;"></i><a href="http://panel.ts3.web.tr/index.php?sayfa=sunucuyuac"class="btn btn-success btn-block" role="button">Sunucuyu Başlat!</a></a>

<a class="list-group-item" href="http://panel.ts3.web.tr/index.php?sayfa=sunucuyukapat" style="color: red;"></i><a href="http://panel.ts3.web.tr/index.php?sayfa=sunucuyukapat" class="btn btn-danger btn-block" role="button">Sunucuyu Kapat!</a></a>


            </div>

          </div>
        </div>

        <div class="col-sm-9">
				
<div class="panel panel-default">

  <div class="panel-heading">Yedeklerim</div>

  <div class="panel-body">
<?php if( count($ts3array) > 0):?>
<div class="col-sm-12">
<div class="widget">
	<div class="widget-content widget-content-mini themed-background-dark text-light-op">
	<span class="pull-right text-muted"></span>
<form class="form-signin" method="POST">
	<center><br> Bu Bölümde Oluşturdugunuz Yedekleri Görebilirsiniz!
	</div>
	 <?php if (@$msg){ echo '<br><center><div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'.@$msg.'</strong></div></center>';} ?>
	<br><div style="position: relative; width: auto" class="slimScrollDiv">
		<div id="stats">
			<table class="table table-striped">
			<?php foreach($ts3array as $ts33): ?>
				<table class="table table-hover table-striped">
	<tbody>
	<?php foreach($ts3array as $ts33): ?>
	<tr>
		<td><?=$ts33["yedekaciklama"]; ?></td>
		
		<td><a href="yedekkur.php?yedek=<?=$ts33['id']?>" class="btn btn-xs btn-success">Bu Yedeği Kur</a> <a href="yedekkur.php?yedeks=<?=$ts33['id']?>" onclick="confirm('Bu işlemi yapmak istediğinize emin misiniz?')" class="btn btn-xs btn-danger">Bu Yedeği Sil</a></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>
						
<?php endforeach; ?>				
				</tbody>
				<?php else:?>
	<div class="alert alert-info"><strong>HİÇ YEDEĞİNİZ BULUNMAMAKTADIR! <a href="yedekal.php" style="color: red;"></i>Yedek Almak İçin Tıklayın!</strong></div>
<?php endif; ?>
			</table>
		</div>
	</div>
</div>
</div>

 	
		</main>
		<script src="index/cdn/js/jquery.min.js"></script>
		<script src="index/cdn/js/bootstrap.min.js"></script>
		<script src="index/cdn/js/notiny.min.js"></script><div class="notiny"><div class="notiny-container" style="top: 10px; left: 10px;"></div><div class="notiny-container" style="bottom: 10px; left: 10px;"></div><div class="notiny-container" style="top: 10px; right: 10px;"></div><div class="notiny-container" style="bottom: 10px; right: 10px;"></div><div class="notiny-container notiny-container-fluid-top" style="top: 0px; left: 0px; right: 0px;"></div><div class="notiny-container notiny-container-fluid-bottom" style="bottom: 0px; left: 0px; right: 0px;"></div></div>
		<script src="index/cdn/js/myfreets3.min.js"></script>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h4>
							TS3.web.tr Hakkında						</h4>
						<p>
							TS3.web.tr firmasının dağıttığı TS3.web.tr yazılımı çok pratik ve hızlıdır. Mikrotik üzerinden çalışan bu yazılım, tamamen ücretsiz, kolay ve hızlı kullanım ile TS3.web.tr güvencesiyle hizmetinizdedir..						</p>
					</div>
					<div class="col-sm-3">
						<h4>
							İletişim						</h4>
						<ul>
							<li>
								<a href="https://facebook.com/ucretsizts3" target="_blank">
									<i class="fa fa-facebook-official" aria-hidden="true"></i>ᅠ@ucretsizts3
								</a>
							</li>
							<li>
								<a href="mailto:info@TS3.web.tr" target="_blank">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>ᅠinfo@ts3.web.tr (
									Destek)
								</a>
							</li>
							<li>
								<a target="_blank">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>ᅠ+90 (0850) 557 80 56.
								</a>
							</li>
						</ul>
					</div>
				</div>
				<hr>
					<div class="row copyline">
						<div class="col-sm-6">
							<p>Copyright © 2017 TS3.web.tr - 
								Tüm hakları mahfuzdur ve mahfuz acı verir..							</p>

						</div>
						<div class="col-sm-6 text-right">
							<p>
								<a href="gizlilik.html">
									Gizlilik								</a>
							</p>
						</div>
					</div>
				</div>
			</footer>

	
		<div id="mrjwg9h-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; position: fixed !important; border: 0px !important; min-height: 0px !important; min-width: 0px !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: auto !important; z-index: 2000000000 !important; cursor: auto !important; float: none !important; bottom: 0px !important; left: 0px !important; right: auto !important; display: block;"><iframe id="H14aEER-1486297661162" src="about:blank" frameborder="0" scrolling="no" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: auto !important; left: auto !important; position: static !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 320px !important; height: 400px !important; z-index: 999999 !important; cursor: auto !important; float: none !important; display: none !important;"></iframe><iframe id="FB9SwlA-1486297661164" src="about:blank" frameborder="0" scrolling="no" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; z-index: 1000001 !important; cursor: auto !important; float: none !important; height: 40px !important; min-height: 40px !important; max-height: 40px !important; width: 320px !important; min-width: 320px !important; max-width: 320px !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center 0px !important; margin: 0px !important; top: auto !important; bottom: 0px !important; left: 10px !important; right: auto !important; display: block !important;"></iframe><iframe id="Smno28Y-1486297661164" src="about:blank" frameborder="0" scrolling="no" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; top: auto !important; bottom: 40px !important; left: 10px !important; right: auto !important; width: 320px !important; max-width: 320px !important; min-width: 320px !important; height: 37px !important; max-height: 37px !important; min-height: 37px !important;"></iframe><div id="vh0MeDi-1486297661160" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none rgb(255, 255, 255) !important; opacity: 0 !important; top: 1px !important; bottom: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: auto !important; height: 45px !important; display: block !important; z-index: 999997 !important; cursor: move !important; float: none !important; left: 0px !important; right: 96px !important;"></div><div id="U1D5MCk-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 96px !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important;"></div><div id="m1rdEYe-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: e-resize !important; float: none !important;"></div><div id="wuIp22K-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important;"></div><div id="MC1caeV-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: s-resize !important; float: none !important;"></div><div id="XdIOaGj-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important;"></div><div id="yqm4Nax-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: ne-resize !important; float: none !important;"></div><div id="lIXuM8T-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: auto !important; bottom: 0px !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: sw-resize !important; float: none !important;"></div><div id="fLfkLqp-1486297661161" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: auto !important; right: 0px !important; bottom: 0px !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999999 !important; cursor: se-resize !important; float: none !important;"></div><div class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important;"></div></div><iframe src="about:blank" style="display: none !important;"></iframe></body>


</html>



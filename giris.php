<?php


session_start();

if( isset($_SESSION['girisyap']) ){
	header("Location: index.php?sayfa=sunucuolustur");
}

require 'baglanti/database.php';
$cfg = include('ayar.php');

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['girisyap'] = $results['id'];
		header("Location: index.php?sayfa=sunucuolustur");

	} else {
		$message = '<center><h4>Yazdıgınız Bilgiler Malesef Uyuşmuyor!!</center></h4>';
	}

endif;

?>

<!DOCTYPE html>

<html lang="en">
  	
<!-- Source created by NEPİX  -->
<head>
	    <meta charset="utf-8">
	    <title><?php echo $cfg->baslik->baslik2; ?> - Giriş Yap</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <!-- Bootstrap core CSS -->
	    <link href="tasarim/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Font Awesome -->
		<link href="tasarim/css/font-awesome.min.css" rel="stylesheet">

		<!-- ionicons -->
		<link href="tasarim/css/ionicons.min.css" rel="stylesheet">
		
		<!-- Simplify -->
		<link href="tasarim/css/simplify.min.css" rel="stylesheet">
	
  	</head>

  	<body class="overflow-hidden light-background">
		<div class="wrapper no-navigation preload">
			<div class="sign-in-wrapper">
				<div class="sign-in-inner">
					<div class="login-brand text-center">
						<i class="fa fa-refresh fa-spin m-right-xs"></i> TS3.<strong class="text-skin">WEB.TR</strong>
					</div>
<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
					<form action="giris.php" method="POST">
						<div class="form-group m-bottom-md">
							<input type="text" class="form-control" id="email" name="email"  placeholder="Email Adresiniz">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Şifreniz">
						</div>

						<div class="form-group">
							<div class="custom-checkbox">
								<input type="checkbox" id="chkRemember">
								<label for="chkRemember"></label>
							</div>
							Hatırla
						</div>

						<div class="m-top-md p-top-sm">
							<center><button class="btn btn-success block">Giriş Yap</button></center>
						</div>
					</form>
						<div class="m-top-md p-top-sm">
							<div class="font-12 text-center m-bottom-xs">Hesabınız Yok Mu?</div>
						<form action="kayitol.php">
							<center><button class="btn btn-default block">Hesap Oluştur</button></center>
						</form>
						</div>
				</div><!-- ./sign-in-inner -->
			</div><!-- ./sign-in-wrapper -->
		</div><!-- /wrapper -->

		<a href="#" id="scroll-to-top" class="hidden-print"><i class="icon-chevron-up"></i></a>

	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		
		<!-- Jquery -->
		<script src="tasarim/js/jquery-1.11.1.min.js"></script>
		
		<!-- Bootstrap -->
	    <script src="tasarim/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll -->
		<script src='tasarim/js/jquery.slimscroll.min.js'></script>
		
		<!-- Popup Overlay -->
		<script src='tasarim/js/jquery.popupoverlay.min.js'></script>

		<!-- Modernizr -->
		<script src='tasarim/js/modernizr.min.js'></script>
		
		<!-- Simplify -->
		<script src="tasarim/js/simplify/simplify.js"></script>
	
  	</body>

<!-- Source created by NEPİX  -->
</html>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter44791243 = new Ya.Metrika({
                    id:44791243,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/44791243" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<?php
session_start();

if( isset($_SESSION['girisyap']) ){
	header("Location: index.php");
}

require 'baglanti/database.php';
$cfg = include('ayar.php');

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])):
	if($_POST['password'] != $_POST['confirm_password'])
	{
		$message = "<center><h4>Şifreler eşleşmiyor!</center></h4>";
	}
	else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$message = "<center><h4>Yazdığınız e-posta adresini kontrol edin.</center></h4>";
	}
	else
	{
	
		$records = $conn->prepare('SELECT id,email,password,credits FROM users WHERE email = :email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		if( count($results) > 0 && $results){
			$message = "<center><h4>Yazdığınız e-posta adresi zaten kayıtlı!</center></h4>";
		}
		else
		{
			
			

		
			// veritabani ayari
			$credits = '1';
			$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$postmail = $_POST['email'];

			
			
			
			$sql = "INSERT INTO users (email, password, credits) VALUES (:email, :password, :credits)";
			$stmt = $conn->prepare($sql);

			$stmt->bindParam(':email', $postmail);
			$stmt->bindParam(':credits', $credits);
			$stmt->bindParam(':password', $pass);

			if( $stmt->execute() ):
				$message = '<center><h4>Hesabınız başarıyla oluşturuldu!</center></h4>';
			else:
				$message = '<center><h4>Hesabınızı oluştururken bir sorun oluştu!</center></h4>';
			endif;
			}
		}
	
	
endif;


				  
?>

<!DOCTYPE html>
<html lang="en">
  	
<!-- Source created by NEPİX  -->
<head>
	    <meta charset="utf-8">
	    <title><?php echo $cfg->baslik->baslik2; ?> - Kayit Ol</title>
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
					<form action="kayitol.php" method="POST">
					
					<div class="form-group m-bottom-md">
							<input type="text" id="email" name="email" class="form-control" placeholder="Email Adresiniz" required>
						</div>
						<div class="form-group m-bottom-md">
							<input type="password" id="password" name="password" class="form-control" placeholder="Şifreniz" required>
						</div>
						<div class="form-group">
							<input type="password" id="confirm_password" name="confirm_password" minlength="4" class="form-control" placeholder="Tekrar Şifreniz" required>
						</div>
						<div class="form-group">
							<div class="custom-checkbox">
								<input type="checkbox" id="chkAccept" required>
								<label for="chkAccept"></label>
							</div>
							Sözleşmeyi Kabul Et
						</div>
						<div class="m-top-md p-top-sm">
							<center><button type="submit" class="btn btn-success block">Hesap Oluştur</button></center>
						</div>
					</form>
					<form action="giris.php" method="POST">
						<div class="m-top-md p-top-sm">
							<div class="font-12 text-center m-bottom-xs">Hesabınız Var Mı?</div>
							<center><button href="giris.php" class="btn btn-default block">Giriş Yapın</button></center>
						</div>
					</form>
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

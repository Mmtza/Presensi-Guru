<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Administrator</title>
	<meta name="description" content="">
	<meta name="author" content="templatemo">
	<link rel="icon" href="images/logo-sekolah-dasar2.png">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/templatemo-style.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/custom.css">
	<link href="css/soon.css" rel="stylesheet">


	<style>
		.text-shadow {
			color: #454545;
			font-weight: 600;
		}

		.masuk {
			background-color: #0275d8;
			border: 1px solid #0275d8;
			color: white;
			border-radius: 5px;
			padding: 10px 30px;
			text-transform: uppercase;
			transition: all 0.3s ease;
			width: 100%;
		}

		.masuk:hover {
			border: 1px solid #0275d8;
			background-color: white;
			color: #0275d8;
		}
	</style>
</head>
<?php
session_start();
include('database.php');
error_reporting(0);
$login = $_POST['login'];
// $pass = addslashes($_POST['password']);
// $user = addslashes(trim($_POST['username']));
// $pass = $database->real_escape_string($_POST['password']);
// $user = $database->real_escape_string(md5($_POST['username']));
$username = $_POST['username'];
$password = MD5($_POST['password']);
if ($login) {
	$query = mysqli_query($database, "select * from users where username='$username' and password='$password'");
	if ($query) {
		$cek = mysqli_num_rows($query);
		if ($cek > 0) {
			$_SESSION['login'] = 12;
			$_SESSION['username'] = $username;
			header('Location: administrator.php?type=home');
		} else {
			$alert = "
									<script>
										$('#alert').css('display','block');
									</script>
									<strong>Maaf!</strong> Username atau Password yang Anda masukan salah!!";
		}
	}
}
?>

<body style="background-image: url('images/bebatuan.gif');background-size: cover;">
	<br>
	<section id="header" style="margin-top: 2em;">
		<div class="container">
			<div class="templatemo-content-widget shadow templatemo-login-widget templatemo-register-widget white-bg">
				<header class="text-center">
					<br>
					<img src="images/logo-sekolah-dasar.png" width="150px" />
					<br>
					<h1 class="text-shadow" style="margin-top:10px;">LOGIN ADMINISTRATOR</h1>
					<div class="text-shadow" style="font:arial;font-size:18px; margin-top:20px;margin-bottom:-10px;">Silahkan Login</div>
				</header>

				<form action="" method="post" class="templatemo-login-form">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
							<input type="text" name="username" class="form-control" placeholder="Username">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="blue-button">
					</div>
				</form><br>
				<div id="alert" style="display:none" class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $alert; ?>
				</div>
			</div>
			<div class="templatemo-content-widget shadow3 templatemo-login-widget templatemo-register-widget white-bg">
				<p style="color:#454545;font-weight:600;">&copy; 2023 - SDN KLEGO 01 </p>
			</div>
		</div>
		<div id="layer"></div>
	</section>
	<!-- END HEADER -->

	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/jquery.themepunch.revolution.min.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>
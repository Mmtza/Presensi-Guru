<div class="templatemo-flex-row flex-content-row" style="position:static">
	<?php
	session_start();
	$username = $_SESSION['username'];
	$login			= $_SESSION['login'];

	if ($login != 12) {
		session_destroy();
		header('Location: login.php');
	}
	$form = $_GET['form'];
	$form1 = $_GET['form1'];
	if ($form == 'edit_jam_presensi') {
		include 'setting/ubah_jam_presensi.php';
	} else {
		include 'setting/lihat_jam_presensi.php';
	}
	?>

</div>
<div class="templatemo-flex-row flex-content-row" style="position:static">
	<?php
	$form3 = $_GET['form3'];
	if ($form3 == 'edit_denda') {
		include 'setting/ubah_denda.php';
	} else {
		include 'setting/lihat_denda.php';
	}
	?>

</div>
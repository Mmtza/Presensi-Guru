<html>

<head>
	<script src="js/sweetalert.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/templatemo-style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link rel="stylesheet" href="css/custom.css">
	<title>PRESENSI GURU SD</title>

	<link rel="icon" href="images/logo-sekolah-dasar2.png">
	<style>
		body {
			background: url('images/bebatuan.gif');
			background-size: cover;
		}
	</style>
</head>

<body>

	<?php
	include 'database.php';
	$query = mysqli_query($database, "select * from setting where no='1'");
	$row = mysqli_fetch_array($query);
	$nip = $_POST['nip'];
	$cari_nip = mysqli_query($database, "select * from guru where nip = '" . $nip . "'");
	$data = mysqli_fetch_array($cari_nip);
	$foto = "images/" . $data['foto'];
	$cek_nip = mysqli_num_rows($cari_nip);
	if ($cek_nip > 0) {
		$nip = $_POST['nip'];
		$jabatan = $data['jabatan'];
		date_default_timezone_set("Asia/Jakarta");
		$hari_ini = date('Y-m-d');
		$cek_presensi = mysqli_query($database, "select * from presensi where nip ='" . $nip . "' and tanggal = '" . $hari_ini . "' and keterangan != 'Belum Hadir'");
		$setting = mysqli_query($database, "select * from setting");
		$cek_presensi_hari_ini = mysqli_num_rows($cek_presensi);
		if ($cek_presensi_hari_ini < 1) {
			$jam = date("H");
			$menit = date("i");
			if ($jabatan = $data['jabatan']) {
				date_default_timezone_set("Asia/Jakarta");
				$jam_sekarang = date('G');
				$menit_sekarang = date('i');
				$telat_jam = $jam_sekarang - $row['jam_presensi'];
				$telat_menit = $menit - $row['menit_presensi'];
				$telat_total = $telat_menit + ($telat_jam * 60);
				$jam_batas_presensi = $row['jam_batas_presensi'];
				$menit_batas_presensi = $row['menit_batas_presensi'];
				$batas_presensi = $jam_batas_presensi + $menit_batas_presensi;
				if ($telat_total < 1) {
					$keterangan = "Tepat Waktu";
				} else if ($telat_total < $row['telat_menit_presensi']) {
					$keterangan = "Telat Sebentar";
				} else {
					$keterangan = "Telat Lama";
				}
			}
			if ($jam_sekarang > $jam_batas_presensi) {
				echo "
				<script>
										swal({
											title: \"Maaf ! " . $data['nama'] . "\",
											text: \"<p style='color:black;'>" . $data['jabatan'] . " tidak diperbolehkan presensi di atas jam <b style='color:#0275d8;'>" . $row['jam_batas_presensi'] . " : " . $row['menit_batas_presensi'] . " WIB</b>  </p><br><br><a href='index.php'><span class='blue-button'> OK </span></a>\",
											type: 'error',
											showConfirmButton: false,
											html: true
										});
									
						</script>
						";
			} else {
				$presended = mysqli_query($database, "select * from presensi where nip ='" . $nip . "' and tanggal = '" . $hari_ini . "'");
				$cek_presended = mysqli_num_rows($presended);
				if ($cek_presended < 1) {
					$input = mysqli_query($database, "insert into presensi values('','" . $nip . "','H',now(),now(),'" . $keterangan . "')");
				} else {
					$input = mysqli_query($database, "update presensi set kehadiran='H', jam = now(), tanggal = now(), keterangan = '" . $keterangan . "' where nip='" . $nip . "' and tanggal = '" . $hari_ini . "'");
				}

				if ($input) {
					$jam = date("H");
					$menit = date("i");
					$telat_jam = $jam - $row['jam_presensi'];
					$telat_menit = $menit - $row['menit_presensi'];
					$telat_total = $telat_menit + ($telat_jam * 60);
					if ($jabatan = 'guru' && $jabatan = 'administrator') {
						if ($telat_total < 1) {
							echo "
										<script>
											swal({
												title: \"<img src='" . $foto . "' style='width:200px;height:200px;border:5px solid;border-radius:50%;border-color:#731514;'><br>" . $data['nama'] . "\",
												text: \"<p style='color:black;'>Kamu sudah berangkat tepat waktu <br> Tetap jaga kedisiplinan yaa :)</p><br><br><a href='index.php'><span style='background-color: #0275d8;border: 1px solid #0275d8;color: white;border-radius: 5px;padding: 10px 30px;text-transform: uppercase;transition: all 0.3s ease;'> OK </span></a>\",
												showConfirmButton: false,
												html: true
											});
										</script>
									";
						} else {
							echo "
										<script>
											swal({
												title: \"<img src='" . $foto . "' style='width:200px;height:200px;border:5px solid;border-radius:50%;border-color:#731514;'><br><h2>" . $data['nama'] . "</h2>\",
												text: \"<p style='color:black;'>Sayang sekali hari ini Kamu  terlambat <b style='color:#0275d8;'>" . $telat_total . " menit</b> :( <br> Besok lagi jangan terlambat yaa.. </p><br><br><a href='index.php'><span class='blue-button'> OK </span></a>\",
												showConfirmButton: false,
												html: true
											});
										</script>
									";
						}
					}
				} else {
					echo "maaf terjadi kesalahan, coba lagi";
				}
			}
		} else {
			echo "
								<script>
									swal({
										title: \"<img src='" . $foto . "' style='width:200px;height:200px;border:5px solid;border-radius:50%;border-color:#731514;'><br><h2>" . $data['nama'] . "</h2>\",
										text: \"<p style='color:black;'>Kamu sudah presensi hari ini :) </p><br><br><a href='index.php'><span class='blue-button'>OK</span></a>\",
										showConfirmButton: false,
										html: true
									});
								</script>
							";
		}
	} else {
		echo "	<script>
									location.href = 'index.php'
					</script>
				";
	}
	?>
	<script>
		setTimeout("location.href = 'index.php';", 10000);
	</script>
</body>

</html>
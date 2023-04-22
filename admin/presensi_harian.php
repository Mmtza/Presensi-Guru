<?php
error_reporting(0);
session_start();
$username = $_SESSION['username'];
$login			= $_SESSION['login'];

if ($login != 12) {
	session_destroy();
	header('Location: login.php');
}

$nip = $_GET['nip'];
$lihat = mysqli_query($database, "select * from guru where nip ='" . $nip . "'");
$data = mysqli_fetch_array($lihat);
$nama = $data['nama'];


?>


<div class="modal fade" id="myModal3" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Input presensi untuk <?php echo $nama; ?></h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<table align="center" class="table_input">
						<tr>
							<td width="20%"><label for="nip">Kehadiran</label></td>
							<td>:</td>
							<td>
								<select name="kehadiran" class="form-control">
									<option value="H">Hadir</option>
									<option value="S">Sakit</option>
									<option value="I">Ijin</option>
									<option value="A">Alpha</option>
								</select>
							</td>
						</tr>
						<tr></tr>
						<tr>
							<td width="20%"><label for="nip">Keterlambatan</label></td>
							<td>:</td>
							<td><select name="keterangan" class="form-control">
									<option value="Tepat Waktu">Tepat Waktu</option>
									<option value="Telat Sebentar">Telat Sebentar</option>
									<option value="Telat Lama">Telat Lama</option>
								</select>
							</td>
						</tr>
					</table>

			</div>
			<div class="modal-footer">
				<center><input type="submit" class="btn btn-primary" name="input" value="Input">
					<button type="button" class="btn btn-warning" onclick="window.history.back();">Cancel</button>
				</center>
			</div>
		</div>
		</form>
	</div>
</div>

<?php
$input = $_POST['input'];
$kehadiran = $_POST['kehadiran'];
if ($kehadiran == 'A') {
	$keterangan = 'Tidak Hadir';
} else if ($kehadiran == 'S') {
	$keterangan = 'Sakit';
} else if ($kehadiran == 'I') {
	$keterangan = 'Ijin';
} else {
	$keterangan = $_POST['keterangan'];
}
date_default_timezone_set("Asia/Jakarta");
$jam = date('H:i:s');
$tanggal = date('Y-m-d');
$tgl = $_GET['tgl'];
$tgl_edit1 = mb_substr($tgl, 0, 2);
$tgl_edit2 = mb_substr($tgl, 3, 2);
$tgl_edit3 = mb_substr($tgl, 6, 4);
$tgl_presensi = $tgl_edit3 . "-" . $tgl_edit2 . "-" . $tgl_edit1;
if ($input) {
	$update = mysqli_query($database, "update presensi set kehadiran = '" . $kehadiran . "', keterangan = '" . $keterangan . "' where nip = '" . $nip . "' and tanggal = '" . $tgl_presensi . "'");
	if ($update) {
		echo "<script>
					window.location.href = 'administrator.php?type=input_presensi&tgl_presensi=" . $tgl . "&submit=LIHAT';
				</script>
			";
	}
} else {
	echo '
		<script>
		$(document).ready(function(){
			
				$("#myModal3").modal({backdrop: "static"});
		});
		</script>';
}
?>

</body>

</html>
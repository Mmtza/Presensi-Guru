<?php
session_start();
$username = $_SESSION['username'];
$login			= $_SESSION['login'];

if ($login != 12) {
	session_destroy();
	header('Location: login.php');
}
$lihat = mysqli_query($database, "select * from setting where no='1'");
$data = mysqli_fetch_array($lihat);
?>

<div class="templatemo-content-widget white-bg col-2" style="position:inherit">
	<div style="background-color: #731514; padding: 15px; color: #fff; border-radius: 5px;">
		<i class="fa fa-money fa-lg"></i> &nbsp
		<h2 class="templatemo-inline-block">DENDA PELANGGARAN</h2>
	</div>
	<hr>
	<form action="" method="post">
		<table class="ttable table_input" align="center">
			<tr>
				<td><label for="jam">Tidak Masuk Tanpa Keterangan (Alpha)</label></td>
				<td>:</td>
				<td>
					<div class="input-group">
						<span class="input-group-addon">
							Rp.
						</span>
						<input class="form-control" type="text" value="<?php echo $data['denda_alpha']; ?>" name="alpha" title="harus diisi" required="">
					</div>
				</td>
			</tr>
			<tr>
				<td><label for="tjam">Terlambat Sebentar</label></td>
				<td>:</td>
				<td>
					<div class="input-group">
						<span class="input-group-addon">
							Rp.
						</span>
						<input class="form-control" type="text" value="<?php echo $data['denda_telat_sebentar']; ?>" name="ts" title="harus diisi" required="">
					</div>
				</td>
			</tr>
			<tr>
				<td><label for="tjam">Terlambat Lama</label></td>
				<td>:</td>
				<td>
					<div class="input-group">
						<span class="input-group-addon">
							Rp.
						</span>
						<input class="form-control" type="text" value="<?php echo $data['denda_telat_lama']; ?>" name="tl" title="harus diisi" required="">
					</div>
				</td>
			</tr>
			<tr>
			<tr>
				<td colspan="4"><br>
					<center><input class="blue1-button" type="submit" name="kirim" value="SIMPAN"> &nbsp <a href="administrator.php?type=setting" value="UBAH" class="red-button">BATAL</a></CENTER>
				<td>
		</table>
	</form>
</div>
<?php
$alpha = $_POST['alpha'];
$tl = $_POST['tl'];
$ts = $_POST['ts'];
$kirim = $_POST['kirim'];

if ($kirim) {
	$update = mysqli_query($database, "update setting  set denda_alpha ='" . $alpha . "', denda_telat_lama='" . $tl . "', denda_telat_sebentar='" . $ts . "' where no='1'");
	if ($update) {
		echo "	<script>
									window.location.href = 'administrator.php?type=setting';
								
								</script>
							";
	}
}
?>
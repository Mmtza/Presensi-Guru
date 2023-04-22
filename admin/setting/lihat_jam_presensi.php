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
		<i class="fa fa-clock-o fa-lg"></i> &nbsp
		<h2 class="templatemo-inline-block">JAM MASUK</h2>
	</div>

	<hr>
	<table class="ttable table_input" align="center">
		<tr>
			<td><label for="jam">Jam Masuk</label></td>
			<td>:</td>
			<td><input type="text" class="form-control" value="Jam : <?php echo $data['jam_presensi']; ?>" disabled>
			</td>
			<td><input type="text" class="form-control" value="Menit : <?php echo $data['menit_presensi']; ?>" disabled>
			</td>
		</tr>
		<tr>
			<td><label for="tjam">Batas Waktu Terlambat Sebentar</label></td>
			<td>:</td>
			<td><input type="text" class="form-control" value="Jam : <?php echo $data['telat_jam_presensi']; ?>" disabled>
			</td>
			<td><input type="text" class="form-control" value="Menit : <?php echo $data['telat_menit_presensi']; ?>" disabled>
			</td>
		</tr>
		<tr>
			<td><label for="tjam">Batas Waktu Presensi</label></td>
			<td>:</td>
			<td><input type="text" class="form-control" value="Jam : <?php echo $data['jam_batas_presensi']; ?>" disabled>
			</td>
			<td><input type="text" class="form-control" value="Menit : <?php echo $data['menit_batas_presensi']; ?>" disabled>
			</td>
		</tr>
		<tr>
			<td colspan="4"><br>
				<center><a href="administrator.php?type=setting&form=edit_jam_presensi"><input type="submit" name="kirim" value="UBAH" class="btn" style="background-color: #731514; color: #fff;"></a></CENTER>
			<td>
		</tr>
	</table>
</div>
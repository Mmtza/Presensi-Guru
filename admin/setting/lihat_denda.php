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
	<table class="ttable table_input" align="center">
		<tr>
			<td><label for="jam">Tidak Masuk Tanpa Keterangan (Alpha)</label></td>
			<td>:</td>
			<td>
				<div class="input-group">
					<span class="input-group-addon">
						Rp.
					</span>
					<input class="form-control" type="text" disabled value="<?php echo number_format($data['denda_alpha'], 2, '.', '.'); ?>" name="alpha" title="harus diisi" required="">
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
					<input class="form-control" type="text" disabled value="<?php echo number_format($data['denda_telat_sebentar'], 2, '.', '.'); ?>" name="ts" title="harus diisi" required="">
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
					<input class="form-control" type="text" disabled value="<?php echo number_format($data['denda_telat_lama'], 2, '.', '.'); ?>" name="tl" title="harus diisi" required="">
				</div>
			</td>
		</tr>
		<tr>
		<tr>
			<td colspan="4"><br>
				<center><a href="administrator.php?type=setting&form3=edit_denda"><input type="submit" name="kirim" value="UBAH" class="btn" style="background-color: #731514;color: #fff;"></a></CENTER>
			<td>
	</table>
</div>
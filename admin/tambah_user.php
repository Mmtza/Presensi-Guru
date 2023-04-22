<div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
	<div class="panel-heading templatemo-position-relative togle" data-target="#input" data-toggle="collapse" style="position:static;cursor:pointer;background-color:#292b2c">
		<h2 class="text-uppercase">INPUT DATA USER <i style="float:right;" class="fa fa-min fa-chevron-down"></i></h2>
	</div>
	<div style="padding:10px" id="input" class="collapse">
		<form action="" name="form_tambah" method="post" enctype="multipart/form-data" class="templatemo-login-form">
			<table style="width:80%" class="ttable table_input" align="center">
				<tr>
					<td width="20%"><label for="nip">NIP</label></td>
					<td>:</td>
					<td>
						<input type="text" required title="COTOH NIP YANG BENAR = 11111111111 " class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
					</td>
				</tr>
				<tr>
					<td><label for="nama">NAMA</label></td>
					<td>:</td>
					<td>
						<input type="text" required title="Nama Harus diIsi" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
					</td>
				</tr>
				<tr>
					<td><label for="tgl_lahir">TANGGAL LAHIR</label></td>
					<td>:</td>
					<td>
						<div class="input-group">
							<input name="tgl_lahir" placeholder="Masukkan tanggal lahir dengan format dd/mm/yyy" class="form-control" type="text">
							<span class="input-group-addon"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form_tambah.tgl_lahir);return false;">
									<i class="fa fa-calendar bigger-110" style="color: black;"></i></a>
							</span>
						</div>
						<iframe width=174 height=170 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
						</iframe>
					</td>
				</tr>
				<tr>
					<td><label for="jabatan">JABATAN</label></td>
					<td>:</td>
					<td>
						<select name="jabatan" id="jabatan" required title="Jabatan Harus diIsi" class="form-control">
							<option selected default disabled>Pilih Jabatan</option>
							<option value="administrator"> Administrator</option>
							<option value="guru"> Guru</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="alamat">ALAMAT</label></td>
					<td>:</td>
					<td><textarea placeholder="Masukkan Alamat" name="alamat" id="alamat" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td><label for="kota">KOTA/KABUPATEN</label></td>
					<td>:</td>
					<td><input type="text" class="form-control" name="kota" id="kota" placeholder="Masukkan Kota/Kabupaten"></td>
				</tr>
				<tr>
					<td><label for="no_hp">NO HP/WA</label></td>
					<td>:</td>
					<td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No HP/WA"></td>
				</tr>
				<tr>
					<td><label for="email">ALAMAT EMAIL</label></td>
					<td>:</td>
					<td><input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email"></td>
				</tr>
				<tr>
					<td><label for="foto">FOTO</label></td>
					<td>:</td>
					<td><input type="file" title="Hanya diperbolehkan mengupload file gambar" accept="image/*" name="foto" id="foto" title="Upload Foto"></td>
				</tr>
				<tr>
					<td colspan="3"><br>
						<center><input type="submit" name="kirim" value="SIMPAN" class="biru-button">&nbsp <input type="reset" value="CLEAR" class="merah-button"></CENTER>
					<td>
			</table>
		</form>
	</div>
</div>
<?php
error_reporting(0);
session_start();
$username = $_SESSION['username'];
$login			= $_SESSION['login'];

if ($login != 12) {
	session_destroy();
	header('Location: login.php');
}

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$tgl = $_POST['tgl_lahir'];
$tgl_edit1 = mb_substr($tgl, 0, 2);
$tgl_edit2 = mb_substr($tgl, 3, 2);
$tgl_edit3 = mb_substr($tgl, 6, 4);
$tgl_lahir = $tgl_edit3 . "/" . $tgl_edit2 . "/" . $tgl_edit1;
$jabatan = $_POST['jabatan'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$foto = $_FILES['foto']['name'];
if ($foto == '') {
	$foto = 'user.jpg';
}
$kirim = $_POST['kirim'];
if ($kirim) {
	$cek = mysqli_query($database, "select * from guru where nip = '" . $nip . "'");
	$cek_nip = mysqli_num_rows($cek);
	if ($cek_nip > 0) {
		echo "	<script>
									swal({
										title: \"Maaf!!!\",
										text: \"NIP " . $nip . " sudah terdaftar!  <br><br><a href='administrator.php?type=input_user'><span class='templatemo-blue-button'> OK </span></a>\",
										type: 'error',
										showConfirmButton: false,
										html: true
									});
								
								</script>
							";
	} else {
		$input = mysqli_query($database, "insert into guru values('','" . $nip . "','" . $nama . "','" . $tgl_lahir . "','" . $jabatan . "','" . $alamat . "','" . $kota . "','" . $no_hp . "','" . $email . "','" . $foto . "')");
		if ($input) {
			$tmp = $_FILES['foto']['tmp_name'];
			$upload_foto = move_uploaded_file($tmp, "images/" . $foto);
			echo "	<script>
									swal({
										title: \"Success\",
										text: \"Data berhasil diinput  <br><br><a href='administrator.php?type=input_user'><span class='templatemo-blue-button'> OK </span></a>\",
										type: 'success',
										showConfirmButton: false,
										html: true
									});
								
								</script>
							";
		} else {
			echo "	<script>
									swal({
										title: \"Maaf!!!\",
										text: \"Terjadi kesalahan, silahkan coba lagi <br><br><a href='administrator.php?type=input_user'><span class='templatemo-blue-button'> OK </span></a>\",
										type: 'error',
										showConfirmButton: false,
										html: true
									});
								
								</script>
							";
		}
	}
}
?>
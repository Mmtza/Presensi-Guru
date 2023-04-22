			<?php
			error_reporting(0);
			session_start();
			$username = $_SESSION['username'];
			$login			= $_SESSION['login'];

			if ($login != 12) {
				session_destroy();
				header('Location: login.php');
			}

			$no = $_GET['no'];
			$lihat = mysqli_query($database, "select * from guru where no ='" . $no . "'");
			$data = mysqli_fetch_array($lihat);
			$tgl_tampil = $data['tgl_lahir'];
			$tgl_tampil1 = mb_substr($tgl_tampil, 0, 4);
			$tgl_tampil2 = mb_substr($tgl_tampil, 5, 2);
			$tgl_tampil3 = mb_substr($tgl_tampil, 8, 2);

			$tgl_lahir_tampil = $tgl_tampil3 . "/" . $tgl_tampil2 . "/" . $tgl_tampil1;



			$nip = $_POST['nip'];
			$nama = $_POST['nama'];
			$tgl = $_POST['tgl_lahir'];
			$tgl_edit1 = mb_substr($tgl, 0, 2);
			$tgl_edit2 = mb_substr($tgl, 3, 2);
			$tgl_edit3 = mb_substr($tgl, 6, 4);
			$tgl_lahir = $tgl_edit3 . "-" . $tgl_edit2 . "-" . $tgl_edit1;

			$jabatan = $_POST['jabatan'];
			$alamat = $_POST['alamat'];
			$kota = $_POST['kota'];
			$no_hp = $_POST['no_hp'];
			$email = $_POST['email'];
			$foto = $_FILES['foto']['name'];
			$kirim = $_POST['kirim'];
			if ($kirim) {
				if ($foto == '') {
					$foto = $data['foto'];
				} else {
					unlink('images/' . $data["foto"]);
				}

				$ubah = mysqli_query($database, "update guru set nip='" . $nip . "', nama='" . $nama . "',tgl_lahir='" . $tgl_lahir . "',jabatan='" . $jabatan . "',alamat='" . $alamat . "',kota='" . $kota . "',no_hp='" . $no_hp . "',email='" . $email . "',foto='" . $foto . "' where no='" . $no . "'");
				if ($ubah) {
					$tmp = $_FILES['foto']['tmp_name'];
					$upload_foto = move_uploaded_file($tmp, "images/" . $foto);
					echo "	<script>
									swal({
										title: \"Success\",
										text: \"Data berhasil dirubah  <br><br><a href='administrator.php?type=input_user'><span class='blue-button'> OK </span></a>\",
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
										text: \"Terjadi kesalahan, silahkan coba lagi <br><br><a href='administrator.php?type=input_user'><span class='blue-button'> OK </span></a>\",
										type: 'error',
										showConfirmButton: false,
										html: true
									});
								
								</script>
							";
				}
			}
			?>


			<div class="panel panel-default margin-10 ">
				<div class="panel-heading" style="background-color:#292b2c">
					<h2 class="text-uppercase">EDIT DATA USER</h2>
				</div>
				<div class="panel-body">
					<form action="" method="post" name="form_edit" enctype="multipart/form-data" class="templatemo-login-form">
						<table style="width:80%" name="form_edit" class="ttable table_input" align="center">
							<tr>
								<td><label for="nip">NIP</label></td>
								<td>:</td>
								<td>
									<input value="<?php echo $data['nip']; ?>" type="text" required title="NIP Harus diIsi" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
								</td>
							</tr>
							<tr>
								<td><label for="nama">NAMA</label></td>
								<td>:</td>
								<td><input value="<?php echo $data['nama']; ?>" type="text" required title="Nama Harus diIsi" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama"></td>
							</tr>
							<tr>
								<td><label for="tgl_lahir">TANGGAL LAHIR</label></td>
								<td>:</td>
								<td>
									<div class="input-group">
										<input name="tgl_lahir" value="<?php echo $tgl_lahir_tampil; ?>" placeholder="Masukkan tanggal lahir dengan format dd/mm/yyy" class="form-control" type="text">
										<span class="input-group-addon"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form_edit.tgl_lahir);return false;">
												<i class="fa fa-calendar bigger-110"></i></a>
										</span>
									</div>
									<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
									</iframe>
								</td>
							</tr>
							<tr>
								<td><label for="jabatan">JABATAN</label></td>
								<td>:</td>
								<td><select name="jabatan" id="jabatan" required title="Jabatan Harus diIsi" class="form-control">
										<option default disabled>Pilih Jabatan</option>
										<option <?php if ($data['jabatan'] == 'administrator') {
													echo "selected";
												}; ?> value="administrator"> Administrator</option>
										<option <?php if ($data['jabatan'] == 'guru') {
													echo "selected";
												} ?> value="guru"> Guru</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="alamat">ALAMAT</label></td>
								<td>:</td>
								<td><textarea name="alamat" id="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea></td>
							</tr>
							<tr>
								<td><label for="kota">KOTA/KABUPATEN</label></td>
								<td>:</td>
								<td><input value="<?php echo $data['kota']; ?>" type="text" class="form-control" name="kota" id="kota" placeholder="Masukkan Kota/Kabupaten"></td>
							</tr>
							<tr>
								<td><label for="no_hp">NO HP</label></td>
								<td>:</td>
								<td><input value="<?php echo $data['no_hp']; ?>" type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No HP"></td>
							</tr>
							<tr>
								<td><label for="email">ALAMAT EMAIL</label></td>
								<td>:</td>
								<td><input value="<?php echo $data['email']; ?>" type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email"></td>
							</tr>
							<tr>
								<td><label for="foto">FOTO</label></td>
								<td>:</td>
								<td><input value="<?php echo $data['foto']; ?>" type="file" title="Hanya diperbolehkan mengupload file gambar" accept="image/JPEG" name="foto" id="foto" title="Upload Foto"></td>
							</tr>
							<tr>
								<td colspan="3"><br>
									<center>
										<input type="submit" name="kirim" value="SIMPAN" class="biru-button">&nbsp
										<a href="administrator.php?type=input_user" class="merah-button">BATAL</a>
									</CENTER>
								<td>
						</table>
					</form>
				</div>
			</div>
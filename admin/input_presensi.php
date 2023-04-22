<div class="panel panel-default margin-10">
	<div class="panel-heading" style="background-color: #731514;">
		<h2 class="text-uppercase">INPUT PRESENSI </h2>
	</div>
	<div class="panel-body">
		<form name="form_tgl_presensi" method="get" action="administrator.php">
			<table class="table_input">
				<tr>
					<td>Tanggal Presensi :</td>
					<td>
						<div class="input-group">
							<input type="hidden" value="input_presensi" name="type">
							<input required title="Tanggal harus diisi" name="tgl_presensi" value="<?php echo $_GET['tgl_presensi']; ?>" placeholder="Tanggal dd/mm/yyy" class="form-control" type="text">
							<span class="input-group-addon">
								<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form_tgl_presensi.tgl_presensi);return false;">
									<i class="fa fa-calendar bigger-110" style="color: #731514;"></i>
								</a>
							</span>
						</div>
						<iframe width=174 height=170 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
						</iframe>
					</td>
					<td> <input type="submit" value="LIHAT" name="submit" class="btn" style="background-color: #731514; color:#fff"></td>
				</tr>
			</table>
		</form>
		<table id="input_presensi" width="100%" class="display table table-striped table-bordered templatemo-user-table">
			<thead>
				<tr style="background-color:#731514">
					<td width="10%" align="center"><a class="white-text templatemo-sort-by"># <span class="caret"></span></a></td>
					<td width="10%" align="center"><a class="white-text templatemo-sort-by">NIP <span class="caret"></span></a></td>
					<td width="25%"> <a class="white-text templatemo-sort-by">NAMA <span class="caret"></span></a></td>
					<td width="25%" align="center"><a class="white-text templatemo-sort-by">PRESENSI <span class="caret"></span></a></td>
					<td width="20%" align="center"><a class="white-text templatemo-sort-by">KETERANGAN <span class="caret"></span></a></td>
					<td width="10%" align="center"><a class="white-text templatemo-sort-by">JABATAN <span class="caret"></span></a></td>
				</tr>
			</thead>
			<tbody>
				<?php
				error_reporting(0);
				session_start();
				$username = $_SESSION['username'];
				$login			= $_SESSION['login'];

				if ($login != 12) {
					session_destroy();
					header('Location: login.php');
				}
				$tgl = $_GET['tgl_presensi'];
				$submit = $_GET['submit'];
				$tgl_edit1 = mb_substr($tgl, 0, 2);
				$tgl_edit2 = mb_substr($tgl, 3, 2);
				$tgl_edit3 = mb_substr($tgl, 6, 4);
				$tgl_presensi = $tgl_edit3 . "-" . $tgl_edit2 . "-" . $tgl_edit1;
				if ($submit) {
					$daftar_guru = mysqli_query($database, "select * from guru order by nip asc");
					while ($data_guru = mysqli_fetch_array($daftar_guru)) {
						$daftar_presensi = mysqli_query($database, "select * from presensi where nip='" . $data_guru['nip'] . "' and tanggal='" . $tgl_presensi . "'");
						$cek_daftar_presensi = mysqli_num_rows($daftar_presensi);
						if ($cek_daftar_presensi < 1) {
							$input = mysqli_query($database, "insert into presensi values('','" . $data_guru['nip'] . "','Belum Hadir',now(),'" . $tgl_presensi . "','Belum Hadir')");
						}
					}
				}



				$lihat = mysqli_query($database, "select nip, nama, jabatan, kehadiran, jam, keterangan from guru left outer join presensi using(nip) where tanggal = '" . $tgl_presensi . "' order by jam");
				$no = 1;
				while ($data = mysqli_fetch_array($lihat)) {
					if ($data['kehadiran'] == "H") {
						$presensi = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='hijau-button templatemo-edit-btn'>Hadir</a>";
					} else if ($data['kehadiran'] == "I") {
						$presensi = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='biru-button templatemo-edit-btn'>Ijin</a>";
					} else if ($data['kehadiran'] == "A") {
						$presensi = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='merah-button templatemo-edit-btn'>Alpha</a>";
					} else if ($data['kehadiran'] == "S") {
						$presensi = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='biru-button templatemo-edit-btn'>Sakit</a>";
					} else {
						$presensi = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='merah-button templatemo-edit-btn'>Belum Hadir</a>";
					}

					if ($data['keterangan'] == 'Tepat Waktu') {
						$keterangan = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='hijau-button templatemo-edit-btn'>Tepat Waktu</a>";
					} else if ($data['keterangan'] == 'Telat Sebentar') {
						$keterangan = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='orange_btn templatemo-edit-btn'>Telat Sebentar</a>";
					} else if ($data['keterangan'] == 'Telat Lama') {
						$keterangan = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='merah-button templatemo-edit-btn'>Telat Lama</a>";
					} else if ($data['keterangan'] == 'Tidak Hadir') {
						$keterangan = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='merah-button templatemo-edit-btn'>Tidak Hadir</a>";
					} else if ($data['keterangan'] == 'Ijin') {
						$keterangan = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='biru-button templatemo-edit-btn'>Ijin</a>";
					} else if ($data['keterangan'] == 'Sakit') {
						$keterangan = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='biru-button templatemo-edit-btn'>Sakit</a>";
					} else {
						$keterangan = "<a href='administrator.php?type=presensi_harian&nip=" . $data['nip'] . "&tgl=" . $tgl . "' class='merah-button templatemo-edit-btn'>Belum Hadir</a>";
					};
					$jabatan = $data['jabatan'];
					echo "
						  <tr>
							<td align='center'>" . $no++ . "</td>
							<td align='center'>" . $data['nip'] . "</td>
							<td>" . $data['nama'] . "</td>
							<td align='center'>" . $presensi . "</td>
							<td align='center'>" . $keterangan . "</td>
							<td align='center'>" . $jabatan . "</td>
						  </tr>";
				}

				?>
			</tbody>
		</table>
	</div>
</div>
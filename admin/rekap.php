			<style>
				td {
					white-space: nowrap;
					text-overflow: ellipsis;
					overflow: hidden;
					padding: 5px !important;
				}

				.col-sm-12 {
					overflow: hidden;
					overflow-x: auto;
				}
			</style>
			<div class="panel panel-default margin-10">
				<div class="panel-heading" style="background-color: #731514;">
					<h2 class="text-uppercase">REKAP PRESENSI</h2>
				</div>
				<div class="panel-body">
					<form name="form_rekap" method="post" action="">
						<table class="table_input">
							<tr>
								<td>Dari Tanggal :</td>
								<td>
									<div class="input-group">
										<input type="hidden" value="rekap" name="type">
										<input required title="Tanggal harus diisi" name="from" value="<?php echo $_POST['from']; ?>" placeholder="Tanggal dd/mm/yyy" class="form-control" type="text">
										<span class="input-group-addon"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form_rekap.from);return false;">
												<i class="fa fa-calendar bigger-110" style="color: #731514;"></i></a>
										</span>
									</div>
									<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
									</iframe>
								</td>
								<td>Sampai Tanggal :</td>
								<td>
									<div class="input-group">
										<input required title="Tanggal harus diisi" name="to" value="<?php echo $_POST['to']; ?>" placeholder="Tanggal dd/mm/yyy" class="form-control" type="text">
										<span class="input-group-addon"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form_rekap.to);return false;">
												<i class="fa fa-calendar bigger-110" style="color: #731514;"></i></a>
										</span>
									</div>
									<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
									</iframe>
								</td>
								<td> <input type="submit" value="LIHAT" name="submit" class="btn" style="background-color: #731514; color: #fff;"></td>
							</tr>
						</table>
					</form>
					<table width="100%" id="rekap" class="display table table-striped table-bordered table-responsive templatemo-user-table">
						<thead>
							<tr style="background-color:#731514">
								<td width="10%" align="center"><a class="white-text templatemo-sort-by">NIP <span class="caret"></span></a></td>
								<td width="20%"> <a class="white-text templatemo-sort-by">NAMA <span class="caret"></span></a></td>
								<td width="5%" align="center"><a class="white-text templatemo-sort-by">HADIR <span class="caret"></span></a></td>
								<td width="5%" align="center"><a class="white-text templatemo-sort-by">IJIN <span class="caret"></span></a></td>
								<td width="5%" align="center"><a class="white-text templatemo-sort-by">SAKIT <span class="caret"></span></a></td>
								<td width="5%" align="center"><a class="white-text templatemo-sort-by">ALPHA <span class="caret"></span></a></td>
								<td width="5%" align="center"><a class="white-text templatemo-sort-by">TELAT SEBENTAR <span class="caret"></span></a></td>
								<td width="5%" align="center"><a class="white-text templatemo-sort-by">TELAT LAMA <span class="caret"></span></a></td>
								<td width="10%" align="center"><a class="white-text templatemo-sort-by">DENDA<span class="caret"></span></a></td>
								<td width="10%" align="center"><a class="white-text templatemo-sort-by">ACTION<span class="caret"></span></a></td>
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

							$query = mysqli_query($database, "select * from setting where no='1'");
							$row = mysqli_fetch_array($query);

							$tgl_from = $_POST['from'];
							$tgl_from1 = mb_substr($tgl_from, 0, 2);
							$tgl_from2 = mb_substr($tgl_from, 3, 2);
							$tgl_from3 = mb_substr($tgl_from, 6, 4);
							$from = $tgl_from3 . "-" . $tgl_from2 . "-" . $tgl_from1;

							$tgl_to = $_POST['to'];
							$tgl_to1 = mb_substr($tgl_to, 0, 2);
							$tgl_to2 = mb_substr($tgl_to, 3, 2);
							$tgl_to3 = mb_substr($tgl_to, 6, 4);
							$to = $tgl_to3 . "-" . $tgl_to2 . "-" . $tgl_to1;

							$submit = $_POST['submit'];

							$lihat = mysqli_query($database, "select nip, nama from guru order by jabatan");
							$no = 1;
							if ($submit) {
								while ($data = mysqli_fetch_array($lihat)) {
									$lihat_total = mysqli_query($database, "select count(nip) as jml from presensi where nip = '" . $data['nip'] . "'  and  tanggal between '" . $from . "'  and '" . $to . "';");
									$jm_tot = mysqli_fetch_array($lihat_total);
									$lihat_hadir = mysqli_query($database, "select nip, kehadiran, count(kehadiran) as hadir from presensi where nip = '" . $data['nip'] . "' and kehadiran = 'H' and  tanggal between '" . $from . "'  and '" . $to . "';");
									$data_lihat_hadir = mysqli_fetch_array($lihat_hadir);
									$lihat_ijin = mysqli_query($database, "select nip, kehadiran, count(kehadiran) as ijin from presensi where nip = '" . $data['nip'] . "' and kehadiran = 'I' and  tanggal between '" . $from . "'  and '" . $to . "';");
									$data_lihat_ijin = mysqli_fetch_array($lihat_ijin);
									$lihat_sakit = mysqli_query($database, "select nip, kehadiran, count(kehadiran) as sakit from presensi where nip = '" . $data['nip'] . "' and kehadiran = 'S' and  tanggal between '" . $from . "'  and '" . $to . "';");
									$data_lihat_sakit = mysqli_fetch_array($lihat_sakit);
									$lihat_alpha = mysqli_query($database, "select nip, kehadiran, count(kehadiran) as alpha from presensi where nip = '" . $data['nip'] . "' and kehadiran = 'A' and  tanggal between '" . $from . "'  and '" . $to . "';");
									$data_lihat_alpha = mysqli_fetch_array($lihat_alpha);
									$lihat_telat_ts = mysqli_query($database, "select nip, kehadiran, count(kehadiran) as ts from presensi where nip = '" . $data['nip'] . "' and keterangan = 'Telat Sebentar' and  tanggal between '" . $from . "'  and '" . $to . "';");
									$data_lihat_ts = mysqli_fetch_array($lihat_telat_ts);
									$lihat_telat_tl = mysqli_query($database, "select nip, kehadiran, count(kehadiran) as tl from presensi where nip = '" . $data['nip'] . "' and keterangan = 'Telat Lama' and  tanggal between '" . $from . "'  and '" . $to . "';");
									$data_lihat_tl = mysqli_fetch_array($lihat_telat_tl);
									$denda = ($data_lihat_alpha['alpha'] * $row['denda_alpha']) + ($data_lihat_ts['ts'] * $row['denda_telat_sebentar']) + ($data_lihat_tl['tl'] * $row['denda_telat_lama']);

									$persen_hadir = number_format((100 * $data_lihat_hadir['hadir']) / $jm_tot['jml'], 1, '.', '.');
									$persen_izin = number_format((100 * $data_lihat_ijin['ijin']) / $jm_tot['jml'], 1, '.', '.');
									$persen_sakit = number_format((100 * $data_lihat_sakit['sakit']) / $jm_tot['jml'], 1, '.', '.');
									$persen_alpha = number_format((100 * $data_lihat_alpha['alpha']) / $jm_tot['jml'], 1, '.', '.');
									$persen_telat1 = number_format((100 * $data_lihat_ts['ts']) / $jm_tot['jml'], 1, '.', '.');
									$persen_telat2 = number_format((100 * $data_lihat_tl['tl']) / $jm_tot['jml'], 1, '.', '.');
									echo "
						  <tr>
							<td align='center'>" . $data['nip'] . " - " . $jm_tot['jml'] . "</td>
							<td>" . $data['nama'] . "</td>
							<td align='center'>" . $data_lihat_hadir['hadir'] . " (" . $persen_hadir . "%) </td>
							<td align='center'>" . $data_lihat_ijin['ijin'] . " (" . $persen_izin . "%)</td>
							<td align='center'>" . $data_lihat_sakit['sakit'] . " (" . $persen_sakit . "%)</td>
							<td align='center'>" . $data_lihat_alpha['alpha'] . " (" . $persen_alpha . "%)</td>
							<td align='center'>" . $data_lihat_ts['ts'] . " (" . $persen_telat1 . "%)</td>
							<td align='center'>" . $data_lihat_tl['tl'] . " (" . $persen_telat2 . "%)</td>
							<td align='right'> Rp. " . number_format($denda, 2, '.', '.') . "</td>
							<td align='right'><a target='_blank' class='btn' style='background-color:#731514;color:#fff' href='administrator.php?type=rekap_detail&nip=" . $data['nip'] . "&bln=" . $tgl_from2 . "'>DETAIL</a></td>
						  </tr>";
									$total_hadir = $total_hadir + $data_lihat_hadir['hadir'];
									$total_ijin = $total_ijin + $data_lihat_ijin['ijin'];
									$total_sakit = $total_sakit + $data_lihat_sakit['sakit'];
									$total_alpha = $total_alpha + $data_lihat_alpha['alpha'];
									$total_telats = $total_telats + $data_lihat_ts['ts'];
									$total_telatl = $total_telatl + $data_lihat_tl['tl'];
									$total_denda = $total_denda + $denda;
								}
							}
							?>
						</tbody>
					</table>
					<?php
					if ($submit) {
						echo "<br>";
						echo "<h2>TOTAL DENDA : Rp. " . number_format($total_denda, 2, '.', '.') . "</h2><BR>";

						echo '<a class="btn" style="background-color:#731514; color:#fff" href="admin/rekap_excel.php?from=' . $from . '&to=' . $to . '"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Export To Excel</a>';
						echo '<br>';
						echo '<br>';
					}
					?>
				</div>
			</div>
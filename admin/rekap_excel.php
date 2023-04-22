<?php
session_start();
$username = $_SESSION['username'];
$login			= $_SESSION['login'];

if ($login != 12) {
	session_destroy();
	header('Location: login.php');
}
include '../database.php';
$from = $_GET['from'];
$to = $_GET['to'];
$get_denda = mysqli_query($database, "select * from setting where no=1");
$dattttdasfduyast = mysqli_fetch_array($get_denda);
$tgl__from_tampil = $from;
$tgl_tampil1 = mb_substr($tgl__from_tampil, 0, 4);
$tgl_tampil2 = mb_substr($tgl__from_tampil, 5, 2);
$tgl_tampil3 = mb_substr($tgl__from_tampil, 8, 2);
$tgl_from_tampil = $tgl_tampil3 . "/" . $tgl_tampil2 . "/" . $tgl_tampil1;

$tgl__to_tampil = $to;
$tgl_to_tampil1 = mb_substr($tgl__to_tampil, 0, 4);
$tgl_to_tampil2 = mb_substr($tgl__to_tampil, 5, 2);
$tgl_to_tampil3 = mb_substr($tgl__to_tampil, 8, 2);
$tgl_to_tampil = $tgl_to_tampil3 . "/" . $tgl_to_tampil2 . "/" . $tgl_to_tampil1;

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekap_presensi_" . $tgl_from_tampil . "__" . $tgl_to_tampil . ".xls");
?>
<table border="1">
	<thead>
		<caption>
			<h2>REKAP PRESENSI GURU </h2>
			<h3>DARI TANGGAL <?php echo $tgl_from_tampil; ?> SAMPAI TANGGAL <?php echo $tgl_to_tampil; ?></h3>
		</caption>
		<tr>
			<th height='40' style="background-color:#731514;color:white">NO</th>
			<th height='40' style="background-color:#731514;color:white">NIP</th>
			<th height='40' style="background-color:#731514;color:white">NAMA</th>
			<th height='40' style="background-color:#731514;color:white">HADIR</th>
			<th height='40' style="background-color:#731514;color:white">IJIN</th>
			<th height='40' style="background-color:#731514;color:white">SAKIT</th>
			<th height='40' style="background-color:#731514;color:white">ALPHA</th>
			<th height='40' style="background-color:#731514;color:white">TELAT SEBENTAR</th>
			<th height='40' style="background-color:#731514;color:white">TELAT LAMA</th>
			<th height='40' style="background-color:#731514;color:white">DENDA</th>
		</tr>
	</thead>
	<tbody>
		<?php

		error_reporting(0);
		if ($from == '--') {
			$lihat = mysqli_query($database, "select * from presensi where tanggal = '-'");
		} else {
			$lihat = mysqli_query($database, "select nip, nama from guru order by jabatan");
		}
		$no = 1;

		while ($data = mysqli_fetch_array($lihat)) {
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
			$denda = ($data_lihat_alpha['alpha'] * $dattttdasfduyast['denda_alpha']) + ($data_lihat_ts['ts'] * $dattttdasfduyast['denda_telat_sebentar']) + ($data_lihat_tl['tl'] * $dattttdasfduyast['denda_telat_lama']);
			$nip = $data['nip'];

			echo "
						  <tr>
							<td align='center'>" . $no++ . "</td>
							<td align='center'>`" . $nip . "</td>
							<td>" . $data['nama'] . "</td>
							<td align='center'>" . $data_lihat_hadir['hadir'] . "</td>
							<td align='center'>" . $data_lihat_ijin['ijin'] . "</td>
							<td align='center'>" . $data_lihat_sakit['sakit'] . "</td>
							<td align='center'>" . $data_lihat_alpha['alpha'] . "</td>
							<td align='center'>" . $data_lihat_ts['ts'] . "</td>
							<td align='center'>" . $data_lihat_tl['tl'] . "</td>
							<td align='right'> Rp. " . number_format($denda, 2, '.', '.') . "</td>
						  </tr>";
			$total_hadir = $total_hadir + $data_lihat_hadir['hadir'];
			$total_ijin = $total_ijin + $data_lihat_ijin['ijin'];
			$total_sakit = $total_sakit + $data_lihat_sakit['sakit'];
			$total_alpha = $total_alpha + $data_lihat_alpha['alpha'];
			$total_telats = $total_telats + $data_lihat_ts['ts'];
			$total_telatl = $total_telatl + $data_lihat_tl['tl'];
			$total_denda = $total_denda + $denda;
		}
		?>
		<tr style="font-weight:bold;text-align:center;" height='30'>
			<th style="background-color:#292b2c;color:white" colspan='3'> JUMLAH </th>
			<th style="background-color:#292b2c;color:white"><?php echo $total_hadir; ?></th>
			<th style="background-color:#292b2c;color:white"><?php echo $total_ijin; ?></th>
			<th style="background-color:#292b2c;color:white"><?php echo $total_sakit; ?></th>
			<th style="background-color:#292b2c;color:white"><?php echo $total_alpha; ?></th>
			<th style="background-color:#292b2c;color:white"><?php echo $total_telats; ?></th>
			<th style="background-color:#292b2c;color:white"><?php echo $total_telatl; ?></th>
			<th style="background-color:#292b2c;color:white">Rp. <?php echo  number_format($total_denda, 2, '.', '.') ?></th>

		</tr>
	</tbody>
</table>
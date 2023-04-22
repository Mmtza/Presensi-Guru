<?php
include '../database.php';
error_reporting(0);
$nip = $_GET['nip'];
$bln = $_GET['bln'];
$lihat = mysqli_query($database, "select * from guru where nip='" . $nip . "'");
$data = mysqli_fetch_array($lihat);
$month = $bln;
$year = date("Y");
$day = date("d");
// t digunakan untuk menghitung jumlah seluruh hari pada bulan ini
//ini digunakan untuk menampilkan semua tanggal pada bulan ini
$endDate = date("t", mktime(0, 0, 0, $month, $day, $year));
//membuat tabel kalender 
$bulan = date("F Y ", mktime(0, 0, 0, $month, $day, $year));
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekap_presensi_" . $data['nama'] . "__" . $bulan . ".xls");
?>

<?php


?>

<?php
//membuat tebel baris nama-nama hari
echo '<table border="1"  cellpadding=30 cellspacing=0 style="border:1px solid #39ADB4">
	<thead>
	<caption> <h2> Rekap Presensi ' . $data['nama'] . '</h2>
    <h3>' . date("F Y ", mktime(0, 0, 0, $month, $day, $year)) . '</h3></caption>
  <tr bgcolor="white" style="color:black">
  <th style="text-align:center;width:14.2%; background-color: #731514"><font color=white>MINGGU</font></th>
  <th style="text-align:center;width:14.2%;">SENIN</th>
  <th style="text-align:center;width:14.2%;">SELASA</th>
  <th style="text-align:center;width:14.2%;">RABU</th>
  <th style="text-align:center;width:14.2%;">KAMIS</th>
  <th style="text-align:center;width:14.2%;">JUMAT</th>
  <th style="text-align:center;width:14.2%;">SABTU</th>
  </tr>
  </thead>';
//cek tanggal 1 hari sekarang
$s = date("w", mktime(0, 0, 0, $month, 1, $year));
for ($ds = 1; $ds <= $s; $ds++) {
	echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFFFFF\">
</td>";
}
for ($d = 1; $d <= $endDate; $d++) {

	//jika variabel w= 0 disini 0 adalah hari minggu akan membuat baris baru dengan </tr>
	if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 0) {
		echo "<tr>";
	}
	$bgColor = "#C7C7C7";
	$comment = "Libur";
	//menentukan warna pada tanggal hari biasa
	if (date("D", mktime(0, 0, 0, $month, $d, $year)) == "Sun") {
		$bgColor = "red";
	}
	$lihat = mysqli_query($database, "select * from presensi where nip='" . $nip . "' and tanggal='2023-" . $month . "-" . $d . "'");
	while ($data = mysqli_fetch_array($lihat)) {
		$keterangan = $data['kehadiran'];
		if ($keterangan == 'A') {
			$bgColor = "#FF0055";
			$comment = "Alpha";
		} else if ($keterangan == "S") {
			$bgColor = "#2A7FFF";
			$comment = "Sakit";
		} else if ($keterangan == "I") {
			$bgColor = "#7F00FF";
			$comment = "Ijin";
		} else if ($keterangan == "H") {
			$bgColor = "#24C624";
			if ($data['keterangan'] == "Telat Lama") {
				$comment = "Telat Lama";
				$bgColor = "#6AE46A";
			} else if ($data['keterangan'] == "Telat Sebentar") {
				$comment = "Telat Sebentar";
				$bgColor = "#3EDC3E";
			} else if ($data['keterangan'] == "Tepat Waktu") {
				$comment = "Tepat Waktu";
				$bgColor = "#24C624";
			}
		}
	}
	echo "<td style=\"font-family:arial;background-color:$bgColor;color:#333333\" align=center valign=middle> <span style=\"color:white\">$d<BR>$comment</span></td>";
	//jika variabel w= 6 disini 6 adalah hari sabtu maka akan pindah baris dengan menutup baris </tr>
	if (date("w", mktime(0, 0, 0, $month, $d, $year)) == 6) {
		echo "</tr>";
	}
}
echo '</table>';
?>
<br>
<span style="font-weight:bold; ">Keterangan : </span>
<table>
	<tr>
		<td style="background-color:#24C624;width:150px;height:20px;text-align:center;">Hadir Tepat Waktu </td>
		<td>: <?php $lihat_tp = mysqli_query($database, "select nip, count(keterangan) as jml from presensi where nip='" . $nip . "' and keterangan='Tepat Waktu' and tanggal between '" . $year . "-" . $bln . "-01' and '" . $year . "-" . $bln . "-31' ");
				$data_tp = mysqli_fetch_array($lihat_tp);
				echo $data_tp['jml'];
				?></td>
	</tr>
	<tr>
		<td style="background-color:#3EDC3E;width:80px;height:20px;text-align:center;"> Hadir Telat Sebentar</td>
		<td>: <?php $lihat_ts = mysqli_query($database, "select nip, count(keterangan) as jml from presensi where nip='" . $nip . "' and keterangan='Telat Sebentar' and tanggal between '" . $year . "-" . $bln . "-01' and '" . $year . "-" . $bln . "-31' ");
				$data_ts = mysqli_fetch_array($lihat_ts);
				echo $data_ts['jml'];
				?></td>
	</tr>
	<tr>
		<td style="background-color:#6AE46A;width:80px;height:20px;text-align:center;"> Hadir Telat Lama</td>
		<td>: <?php $lihat_tl = mysqli_query($database, "select nip, count(keterangan) as jml from presensi where nip='" . $nip . "' and keterangan='Telat Lama' and tanggal between '" . $year . "-" . $bln . "-01' and '" . $year . "-" . $bln . "-31' ");
				$data_tl = mysqli_fetch_array($lihat_tl);
				echo $data_tl['jml'];
				?></td>
	</tr>
	<tr>
		<td style="background-color:#FF0055;width:80px;height:20px;text-align:center;"> Alpha</td>
		<td>: <?php $lihat_a = mysqli_query($database, "select nip, count(kehadiran) as jml from presensi where nip='" . $nip . "' and kehadiran='A' and tanggal between '" . $year . "-" . $bln . "-01' and '" . $year . "-" . $bln . "-31' ");
				$data_a = mysqli_fetch_array($lihat_a);
				echo $data_a['jml'];
				?></td>
	</tr>
	</tr>
	<tr>
		<td style="background-color:#2A7FFF;width:80px;height:20px;text-align:center;"> Sakit</td>
		<td>: <?php $lihat_s = mysqli_query($database, "select nip, count(kehadiran) as jml from presensi where nip='" . $nip . "' and kehadiran='S' and tanggal between '" . $year . "-" . $bln . "-01' and '" . $year . "-" . $bln . "-31' ");
				$data_s = mysqli_fetch_array($lihat_s);
				echo $data_s['jml'];
				?></td>
	</tr>
	</tr>
	<tr>
		<td style="background-color:#7F00FF;width:80px;height:20px;text-align:center;"> Ijin</td>
		<td>: <?php $lihat_i = mysqli_query($database, "select nip, count(kehadiran) as jml from presensi where nip='" . $nip . "' and kehadiran='I' and tanggal between '" . $year . "-" . $bln . "-01' and '" . $year . "-" . $bln . "-31' ");
				$data_i = mysqli_fetch_array($lihat_i);
				echo $data_i['jml'];
				?></td>
	</tr>
</table>
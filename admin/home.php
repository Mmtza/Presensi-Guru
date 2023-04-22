<?php
include '../database.php';
error_reporting(0);
session_start();
$username = $_SESSION['username'];
$login      = $_SESSION['login'];

if ($login != 12) {
  session_destroy();
  header('Location: login.php');
}

date_default_timezone_set("Asia/Jakarta");
$tgl_ini = date('Y-m-d');


?>

<div class="templatemo-flex-row flex-content-row" style="position:static">

</div>
<div class="templatemo-flex-row flex-content-row">
  <div class="col-1">
    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
      <div class="panel-heading templatemo-position-relative togle" data-target="#ijin" data-toggle="collapse" style="position:static;cursor:pointer;background-color:#731514;">
        <h2 class="text-uppercase">Ijin Hari Ini <i style="float:right;" class="fa fa-min fa-chevron-down"></i></h2>
      </div>
      <div style="padding:10px" id="ijin" class="collapse">
        <?php
        $ijin = mysqli_query($database, "select guru.no,nip, nama from presensi inner join guru using(nip) where kehadiran = 'I'  and tanggal='" . $tgl_ini . "'");
        while ($data_ijin = mysqli_fetch_array($ijin)) {
          echo '<a href="admin.php?type=detail_user&no=' . $data_ijin["no"] . '" class="btn" style="margin:3px;background-color:#731514;color:#ffffff;">' . $data_ijin["nama"] . '</a>';
        }
        ?>
      </div>
    </div>
    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
      <div class="panel-heading templatemo-position-relative togle" data-target="#sakit" data-toggle="collapse" style="position:static;cursor:pointer;background-color:#292b2c">
        <h2 class="text-uppercase">Sakit Hari Ini <i style="float:right;" class="fa fa-min fa-chevron-down"></i></h2>
      </div>
      <div style="padding:10px" id="sakit" class="collapse">
        <?php
        $sakit = mysqli_query($database, "select guru.no,nip, nama from presensi inner join guru using(nip) where kehadiran = 'S'  and tanggal='" . $tgl_ini . "'");
        while ($data_sakit = mysqli_fetch_array($sakit)) {
          echo '<a href="admin.php?type=detail_user&no=' . $data_sakit["no"] . '" class="btn" style="margin:3px;background-color:black;color:#ffffff;"">' . $data_sakit["nama"] . '</a>';
        }
        ?>
      </div>
    </div>
    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
      <div class="panel-heading templatemo-position-relative togle" data-target="#telat" data-toggle="collapse" style="position:static;cursor:pointer;background-color: #731514;">
        <h2 class="text-uppercase">Telat Hari Ini <i style="float:right;" class="fa fa-min fa-chevron-down"></i></h2>
      </div>
      <div style="padding:10px" id="telat" class="collapse">
        <?php
        $telat = mysqli_query($database, "select guru.no,nip, nama from presensi inner join guru using(nip) where (keterangan = 'Telat Sebentar' or keterangan = 'Telat Lama')  and tanggal='" . $tgl_ini . "'");
        while ($data_telat = mysqli_fetch_array($telat)) {
          echo '<a href="admin.php?type=detail_user&no=' . $data_telat["no"] . '" class="btn btn-primary" style="margin:3px;background-color:#731514;">' . $data_telat["nama"] . '</a>';
        }
        ?>
      </div>
    </div>
    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
      <div class="panel-heading templatemo-position-relative togle" data-target="#urgent" data-toggle="collapse" style="position:static;cursor:pointer;background-color:#292b2c;">
        <h2 class="text-uppercase">Paling Banyak telat bulan Ini <i style="float:right;" class="fa fa-min fa-chevron-down"></i></h2>
      </div>
      <div style="padding:10px" id="urgent" class="collapse">

        <table id="rekap" width="100%" class="display table table-striped table-bordered templatemo-user-table">
          <thead>
            <tr style="background-color:#292b2c">
              <td width="30%" align="center"> <a class="white-text templatemo-sort-by">NAMA <span class="caret"></span></a></td>
              <td width="20%" align="center"><a class="white-text templatemo-sort-by">Jumlah Terlambat <span class="caret"></span></a></td>
            </tr>
          </thead>
          <tbody>
            <?php


            $thn = date('Y');
            $bln = date('m');
            $from = $thn . "-" . $bln . "-01";
            $to = $thn . "-" . $bln . "-31";
            $lihat_t = mysqli_query($database, "select nip, count(keterangan) as Jumlah, nama from presensi inner join guru using(nip) where (keterangan='telat lama' or keterangan='telat sebentar') and (tanggal between '" . $from . "' and '" . $to . "') group by nip order by Jumlah desc limit 5 ");
            while ($data_t = mysqli_fetch_array($lihat_t)) {

              echo "
						  <tr>
							<td>" . $data_t['nama'] . "</td>
							<td align='center'>" . $data_t['Jumlah'] . "</td>
						  </tr>";
            }
            ?>
          </tbody>
        </table>


      </div>
    </div>
    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
      <div class="panel-heading templatemo-position-relative togle" data-target="#urgent1" data-toggle="collapse" style="position:static;cursor:pointer;background-color: #731514;">
        <h2 class="text-uppercase">Paling Banyak Alpha Bulan Ini <i style="float:right;" class="fa fa-min fa-chevron-down"></i></h2>
      </div>
      <div style="padding:10px;" id="urgent1" class="collapse">
        <table id="rekap" width="100%" class=" display table table-striped table-bordered templatemo-user-table">
          <thead>
            <tr style="background-color:#731514">
              <td width="30%" align="center"> <a class="white-text templatemo-sort-by">NAMA <span class="caret"></span></a></td>
              <td width="20%" align="center"><a class="white-text templatemo-sort-by">Jumlah Alpha <span class="caret"></span></a></td>
            </tr>
          </thead>
          <tbody>
            <?php


            $thn = date('Y');
            $bln = date('m');
            $from = $thn . "-" . $bln . "-01";
            $to = $thn . "-" . $bln . "-31";
            $lihat_a = mysqli_query($database, "select nip, count(keterangan) as Jumlah, nama from presensi inner join guru using(nip) where kehadiran='A' and tanggal between '" . $from . "' and '" . $to . "' group by nip order by Jumlah desc limit 5 ");
            while ($data_a = mysqli_fetch_array($lihat_a)) {

              echo "
						  <tr>
							<td>" . $data_a['nama'] . "</td>
							<td align='center'>" . $data_a['Jumlah'] . "</td>
						  </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-1">
    <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
      <div class="panel-heading templatemo-position-relative" style="position:static;background-color: #731514;">
        <h2 class="text-uppercase">KEHADIRAN HARI INI</h2>
      </div>
      <div style="padding:5px;">
        <table id="kehadiran_hari_ini" class=" display table table-striped table-bordered">
          <thead>
            <tr style="background-color:#731514;text-align:center; color:white;">
              <td>No. <span class="caret"></span></td>
              <td>NAMA <span class="caret"></span></td>
              <td>JAM <span class="caret"></span></td>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            date_default_timezone_set("Asia/Jakarta");
            $tgl_presensi = date('Y-m-d');
            $lihat = mysqli_query($database, "select nama,jabatan, kehadiran,  jam, keterangan from guru inner join presensi using(nip) where tanggal = '" . $tgl_presensi . "' and kehadiran = 'H' order by jam");
            while ($data = mysqli_fetch_array($lihat)) {
              $jabatan = $data['jabatan'];
              echo "
              <tr>
            	<td aling='center'>" . $no++ . "</td>
            	<td>" . $data['nama'] . "</td>
            	<td align='center'>" . $data['jam'] . "</td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <footer class="text-right">
      <p>Copyright &copy; <?= date('Y') ?> </a></p>
    </footer>
  </div>
</div>
<!-- Second row ends -->
<!-- <style>
  .dataTables_paginate>ul.pagination>li.paginate_button>a {
    color: #fff;
    background-color: #731514;
  }
</style> -->
<script>
  // let table = new DataTable('#rekap');
  // $(function() {
  //   $('#rekap').DataTable({
  //     "paging": false,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": false,
  //     "autoWidth": true
  //   });
  // });
</script>
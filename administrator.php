<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator SDN KLEGO 01</title>
  <link rel="icon" href="images/logo-sekolah-dasar.png">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/select2.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

  <script src="js/jquery.min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/templatemo-script.js"></script> <!-- Templatemo Script -->
  <script type="text/javascript" src="js/jquery.sticky-kit.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.fixedColumns.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <style>
    .templatemo-left-nav a:hover {
      border-left: 8px solid #731514;
      ;
    }
  </style>
</head>

<body>
  <!-- Left column -->
  <div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
      <header class="templatemo-site-header" style="text-align:center;">
        <h1>PRESENSI GURU SDN KLEGO 01</h1>
      </header>
      <div class="profile-photo-container">
        <center>
          <img src="images/logo-sekolah-dasar2.png" alt="Profile Photo" width="200px" class="img-responsive" style="border:5px solid #a94442; border-radius: 50%;">
          <!-- <div class="profile-photo-overlay"></div> -->
        </center>
      </div>
      <br>
      <div style="text-align:center;color:white;font-size:20px; margin-bottom:10px;">Administrator</div>
      <!-- Search box -->

      <div class="mobile-menu-icon">
        <i class="fa fa-bars"></i>
      </div>
      <nav>
        <ul class="templatemo-left-nav">

          <li><a href="administrator.php?type=home" style="<?php if ($_GET['type'] == 'home') {
                                                              echo 'background-color: #a94442';
                                                            } ?>"><i class="fa fa-tachometer fa-fw"></i>Dashboard</a></li>
          <li><a href="administrator.php?type=input_presensi" style="<?php if ($_GET['type'] == 'input_presensi') {
                                                                        echo 'background-color: #a94442';
                                                                      } ?>"><i class="fa fa-book fa-fw"></i>INPUT PRESENSI</a></li>
          <li><a href="administrator.php?type=input_user" style="<?php if ($_GET['type'] == 'input_user') {
                                                                    echo 'background-color: #a94442';
                                                                  } ?>"><i class="fa fa-users fa-fw"></i>DATA USER</a></li>
          <li><a href="administrator.php?type=rekap" style="<?php if ($_GET['type'] == 'rekap' or $_GET['type'] == 'rekap_detail') {
                                                              echo 'background-color: #a94442';
                                                            } ?>"><i class="fa  fa-archive fa-fw"></i>REKAP PRESENSI</a></li>
          <li><a href="administrator.php?type=setting" style="<?php if ($_GET['type'] == 'setting') {
                                                                echo 'background-color: #a94442';
                                                              } ?>"><i class="fa  fa-cogs  fa-fw"></i>SETTING PRESENSI</a></li>
          <li><a href="admin/logout.php"><i class="fa fa-sign-out fa-fw"></i>Sign Out</a></li>
        </ul>
      </nav>
    </div>
    <!-- Main content -->
    <div class="templatemo-content col-1 light-gray-bg">

      <div class="templatemo-content-container" style="padding:10px;">
        <?php
        error_reporting(0);
        session_start();
        $username = $_SESSION['username'];
        $login      = $_SESSION['login'];

        if ($login != 12) {
          session_destroy();
          header('Location: login.php');
        }

        include 'database.php';
        if ($_GET['type'] == 'home') {
          include 'admin/home.php';
        } else if ($_GET['type'] == '') {
          header("Location: administrator.php?type=home");
        } else if ($_GET['type'] == 'input_user') {
          include 'admin/input_user.php';
        } else if ($_GET['type'] == 'input_presensi') {
          include 'admin/input_presensi.php';
        } else if ($_GET['type'] == 'lihat_presensi') {
          include 'admin/lihat_presensi.php';
        } else if ($_GET['type'] == 'detail_user') {
          include 'admin/detail_user.php';
        } else if ($_GET['type'] == 'hapus_user') {
          include 'admin/hapus_user.php';
        } else if ($_GET['type'] == 'presensi_harian') {
          include 'admin/presensi_harian.php';
        } else if ($_GET['type'] == 'rekap') {
          include 'admin/rekap.php';
        } else if ($_GET['type'] == 'setting') {
          include 'admin/setting.php';
        } else if ($_GET['type'] == 'rekap_detail') {
          include 'admin/rekap_detail.php';
        } else {
          include 'admin/home.php';
        }
        ?>
      </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


    </script>
    <script>
      // let table = new DataTable('#input_presensi');
      $(document).ready(function() {
        $('table.display').DataTable();
      });
    </script>

    <script>
      // $(function() {
      //   $('#input_presensi').DataTable({
      //     "paging": false,
      //     "lengthChange": false,
      //     "searching": true,
      //     "ordering": true,
      //     "info": false,
      //     "autoWidth": true
      //   });
      //   $('#kehadiran_hari_ini').DataTable({
      //     "paging": true,
      //     "lengthChange": true,
      //     "searching": true,
      //     "ordering": true,
      //     "info": true,
      //     "autoWidth": false
      //   });
      //   $('#data_user').DataTable({
      //     "paging": true,
      //     "lengthChange": true,
      //     "searching": true,
      //     "ordering": true,
      //     "info": true,
      //     "autoWidth": false
      //   });
      // });
    </script>
</body>

</html>
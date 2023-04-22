<?php
require "database.php";

$result = mysqli_query($database, "SELECT * FROM guru");
?>
<!DOCTYPE html>
<html>

<head>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PRESENSI GURU SDN KLEGO 01</title>

    <link rel="icon" href="images/logo-sekolah-dasar2.png">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <link href="css/soon.css" rel="stylesheet">

    <link href="css/templatemo-style.css" rel="stylesheet">
    <style>
      .text-shadow {
        color: #454545;
        font-weight: 600;
      }

      .masuk {
        background-color: #0275d8;
        border: 1px solid #0275d8;
        color: white;
        border-radius: 5px;
        padding: 10px 30px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        width: 100%;
      }

      .masuk:hover {
        border: 1px solid #0275d8;
        background-color: white;
        color: #0275d8;
      }
    </style>

  </head>

<body style="background-image: url('images/bebatuan.gif'); background-size: cover; background-repeat: no-repeat;">
  <!-- START HEADER -->
  <section id="header" style="margin-top: 8em;">
    <div class="container">
      <div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
        <img src="images/logo-sekolah-dasar.png" width="150px">
        <h2 class="text-shadow">PRESENSI GURU SDN KLEGO 01</h2>
      </div>
      <div class="templatemo-content-widget templatemo-login-widget white-bg">
        <header class="text-center">
          <h1 class="text-shadow"> Silahkan Presensi</h1>
        </header>
        <form action="presensi.php" method="post" class="templatemo-login-form">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user fa-fw"></i>
              </div>
              <select id="nip" name="nip" title="PILIH NIP ANDA" class="form-control" placeholder="SILAHKAN PILIH NIP">
                <?php if (mysqli_num_rows($result) > 0) {
                  // output data dari setiap baris
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<option value = " . $row["nip"] . ">" . $row["nip"] . " - " . $row["nama"] . "</option><br>";
                  }
                } else {
                  echo "Data Tidak Ditemukan";
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="templatemo-blue-button width-100 masuk">MASUK</button>
          </div>
        </form>
        <p style="color:black; padding-top:24px; margin-bottom: -24px;">&copy; 2023 - PRESENSI GURU SDN KLEGO 01</p>
      </div>

    </div>
    <div id="layer"></div>
  </section>
  <!-- END HEADER -->

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/modernizr.custom.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.themepunch.revolution.min.js"></script>
  <script src="js/custom.js"></script>



</body>
<!-- END BODY -->

</html>
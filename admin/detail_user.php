<?php
error_reporting(0);
session_start();
$username = $_SESSION['username'];
$login      = $_SESSION['login'];

if ($login != 12) {
  session_destroy();
  header('Location: login.php');
}
$no = $_GET['no'];
$lihat = mysqli_query($database, "select * from guru where no ='" . $no . "'");
$data = mysqli_fetch_array($lihat);

?>


<div class="templatemo-content-widget white-bg col-2">
  <div class="media margin-bottom-30">
    <div class="media-left padding-right-25">
      <a href="images/<?php echo $data['foto']; ?>">
        <div style="border:5px solid;border-radius:50%;padding:1px;border-color:#731514;">
          <div style="width:160px;height:160px;border:2px solid white;border-radius:50%;background-size:160px;background-image: url('images/<?php echo $data["foto"]; ?>')"></div>
        </div>
      </a>
    </div>
    <div class="media-body">
      <h2 class="media-heading text-uppercase" style="font-weight:bold;color:#731514;"><?php echo $data['nama'] ?></h2>
      <p style="font-size:16px;font-weight:600;"><?php echo ucwords($data['jabatan']); ?></p>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
      <tbody>
        <tr>
          <td width="10%">
            <div class="circle" style="background-color:#731514;"></div>
          </td>
          <td width="20%">NIP</td>
          <td width="10%">:</td>
          <td width="60%"><?php echo $data['nip']; ?></td>
        </tr>
        <tr>
          <td>
            <div class="circle" style="background-color:#292b2c;"></div>
          </td>
          <td>Nama Lengkap</td>
          <td width="15%">:</td>
          <td><?php echo $data['nama']; ?></td>
        </tr>
        <tr>
          <td>
            <div class="circle" style="background-color:#731514;"></div>
          </td>
          <td>Jabatan</td>
          <td width="15%">:</td>
          <td><?php echo ucwords($data['jabatan']); ?></td>
        </tr>
        <tr>
          <td>
            <div class="circle" style="background-color:#292b2c;"></div>
          </td>
          <td>Alamat</td>
          <td width="15%">:</td>
          <td><?php echo $data['alamat']; ?></td>
        </tr>
        <tr>
          <td>
            <div class="circle" style="background-color:#731514;"></div>
          </td>
          <td>Kota</td>
          <td width="15%">:</td>
          <td><?php echo ucfirst($data['kota']); ?></td>
        </tr>
        <tr>
          <td>
            <div class="circle" style="background-color:#292b2c;"></div>
          </td>
          <td>No Hp/WA</td>
          <td width="15%">:</td>
          <td><?php echo $data['no_hp']; ?></td>
        </tr>
        </tr>
        <tr>
          <td>
            <div class="circle" style="background-color:#731514;"></div>
          </td>
          <td>Email</td>
          <td width="15%">:</td>
          <td><?php echo $data['email']; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <br>
  <a href="javascript:history.back()" class="btn btn-md" style="background-color: #731514; color:#fff"><i class="fa fa-angle-double-left"> </i> &nbsp KEMBALI</a>
</div>
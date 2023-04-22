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
unlink('images/' . $data["foto"]);
$hapus = mysqli_query($database, "DELETE FROM guru WHERE no='" . $no . "'");
if ($hapus) {
	echo "	<script>
									swal({
										title: \"Berhasil\",
										text: \"Data telah berhasil dihapus  <br><br><a href='administrator.php?type=input_user'><span class='blue-button'> OK </span></a>\",
										type: 'success',
										showConfirmButton: false,
										html: true
									});
								
					</script>
				";
} else {
	echo "	<script>
									swal({
										title: \"Maaf!!\",
										text: \"Data gagal dihapus, silahkan coba lagi! <br><br><a href='administrator.php?type=input_user'><span class='blue-button'> OK </span></a>\",
										type: 'error',
										showConfirmButton: false,
										html: true
									});
								
					</script>
				";
}

<?php
$database = mysqli_connect('localhost', 'root', '', 'presensi');

if (!$database) {
	die('Koneksi database error : ' . mysqli_connect_errno() . ' --- ' . mysqli_connect_error());
}

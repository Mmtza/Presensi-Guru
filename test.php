<?php

include 'database.php';

$q = mysqli_query($database, "select * from makul group by makul");
$no = 1;
while ($data = mysqli_fetch_array($q)) {
	echo $no++ . " .  " . $data['makul'];
	echo "<br>";
}

?>
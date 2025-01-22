<?php
$mysqli = new mysqli("localhost","root","","dbretail3");
 if ($mysqli->connect_error) {
die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
<?php
$mysqli = new mysqli("nama_host", "username", "password", "nama_database"); 
if ($mysqli->connect_error) { 
    die("Koneksi gagal: " . $mysqli->connect_error); 
} else { 
    echo "Koneksi ke database berhasil."; 
 }
 ?> 
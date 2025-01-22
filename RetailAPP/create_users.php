<?php 
include "koneksi.php"; 
$query = "SELECT * FROM users"; 
$result = $mysqli->query($query);
$cek = $result->num_rows;
if($cek == 0){
    $username = "anisa"; 
     $nama_lengkap = "Anisa Herlina Putri";
     $password = md5('1234'); 
     $level = "admin"; 
     $query = "INSERT INTO users (username,nama_lengkap,password,level) VALUES('$username', '$nama_lengkap', '$password', '$level')"; 
     $mysqli->query($query);
     header('location:index.php');
}else{
    header('location:index.php');
}
?>
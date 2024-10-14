<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
</head>
<body>

<h2>Aplikasi Kalkulator Sederhana</h2>

<form method="post">
    <h3>Masukkan Bilangan Pertama:</h3>
    <input type="number" name="bilangan1"><br><br>

    <h3>Masukkan Bilangan Kedua:</h3>
    <input type="number" name="bilangan2"><br><br>

    <h3>Pilih Operasi:</h3><br>
    <input type="radio" name="operasi" value="tambah"> Penjumlahan (+)<br>
    <input type="radio" name="operasi" value="kurang"> Pengurangan (-)<br>
    <input type="radio" name="operasi" value="kali"> Perkalian (×)<br>
    <input type="radio" name="operasi" value="bagi"> Pembagian (÷)<br><br>

    <input type="submit" name="submit" value="Hitung">
    <hr>
</form>

<?php
$bilangan1 = $_POST['bilangan1']?? 0;
$bilangan2 = $_POST['bilangan2']?? 0;
$operasi = $_POST['operasi']?? '';
$hasil = '';


switch ($operasi) {
    case "tambah":
        $hasil = $bilangan1 + $bilangan2;
        break;
    case "kurang":
        $hasil = $bilangan1 - $bilangan2;
        break;
    case "kali":
        $hasil = $bilangan1 * $bilangan2;
        break;
    case "bagi":
        $hasil = $bilangan1 / $bilangan2;
        break;
}

    echo "<h3>Hasil Perhitungan: $hasil</h3>";

?>

</body>
</html
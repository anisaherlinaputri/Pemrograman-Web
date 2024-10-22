<?php
$buah = array(
    "apel",
    "pisang",
    "durian",
    "semangka",
    "pepaya",
    "manggis"
);
foreach ($buah as $buahan){
    echo $buahan.'<br>';
}
echo "<hr />";
$siswa = array(
    "nama" => "Anisa Herlina Putri br Sembiring",
    "umur" => "19",
    "kota" => "Lincun",
    "jurusan" => "Sistem Informasi"
);

echo '<table border="1">';
echo '<tr>';
echo '<th>Nama Siswa</th>';
echo '<th>Umur Siswa</th>';
echo '<th>Kota Siswa</th>';
echo '<th>Jurusan Siswa</th>';
echo '</tr>';
echo '<tr>';
echo '<td>' . $siswa['nama'] . '</td>';
echo '<td>' . $siswa['umur'] . '</td>';
echo '<td>' . $siswa['kota'] . '</td>';
echo '<td>' . $siswa['jurusan'] . '</td>';
echo '</tr>';
echo '</table>'; 
?>
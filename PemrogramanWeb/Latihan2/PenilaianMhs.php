<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Penilaian Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <h1>Aplikasi Penilaian Mahasiswa</h1>
    </header>
    
    <main>
    <form method="post">
        <label for="Nilai1"> Masukkan Nilai Mata Kuliah 1 </label>
        <input type="number" name="nilai1"></br></br>

        <label for="Nilai1"> Masukkan Nilai Mata Kuliah 2 </label>
        <input type="number" name="nilai2"></br></br>
       
        <label for="Nilai1"> Masukkan Nilai Mata Kuliah 3 </label>
       <input type="number" name="nilai3"></br>
       </br>

       <input type="submit" name="submit"></br>
    
    </form>
    </main>

    <footer>
    <?php
    if (isset($_POST['submit'])) {
        $nilai1 = $_POST['nilai1'];
        $nilai2 = $_POST['nilai2'];
        $nilai3 = $_POST['nilai3'];

        $RataRata = ($nilai1 + $nilai2 + $nilai3) / 3;

       if($RataRata >=60){
        $statusKelulusan = "Lulus";
       }else{
        $statusKelulusan = "Tidak Lulus";
       }

        echo "<h3>Nilai Rata-Rata: $RataRata </h3>";
        echo "<h3>Status Kelulusan: $statusKelulusan</h3>";
    }
    ?>
    </footer>
</body>
</html>
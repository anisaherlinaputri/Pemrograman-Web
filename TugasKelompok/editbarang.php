<?php
// File JSON untuk menyimpan data barang
$file = 'data_barang.json';

// Fungsi untuk membaca data dari file JSON
function bacaData() {
    global $file;
    if (file_exists($file)) {
        $data = file_get_contents($file);
        return json_decode($data, true);
    }
    return [];
}

// Fungsi untuk menyimpan data ke file JSON
function simpanData($data) {
    global $file;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// Ambil data barang dari file JSON
$barang = bacaData();

// Ambil ID barang dari URL
$id_barang = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id_barang) {
    header("Location: index.php"); // Ganti dengan halaman utama Anda
    exit();
}

// Cari data barang berdasarkan ID
$item_barang = null;
foreach ($barang as $item) {
    if ($item['id_barang'] === $id_barang) {
        $item_barang = $item;
        break;
    }
}

// Jika barang tidak ditemukan, redirect kembali
if (!$item_barang) {
    header("Location: index.php"); // Ganti dengan halaman utama Anda
    exit();
}

// Proses edit data barang
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($barang as &$item) {
        if ($item['id_barang'] === $id_barang) {
            $item['nama_barang'] = $_POST['nama_barang'];
            $item['harga'] = $_POST['harga'];
            $item['stok'] = $_POST['stok'];
            $item['deskripsi'] = $_POST['deskripsi'];
            break;
        }
    }

    // Simpan perubahan ke file JSON
    simpanData($barang);
    header("Location: tambahbarang.php"); // Redirect ke halaman utama
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            width: 50%;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Edit Barang</h1>

    <form action="" method="POST">
        <label for="id_barang">ID Barang:</label>
        <input type="text" id="id_barang" name="id_barang" value="<?= htmlspecialchars($item_barang['id_barang']); ?>" readonly>

        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($item_barang['nama_barang']); ?>" required>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($item_barang['harga']); ?>" required>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" value="<?= htmlspecialchars($item_barang['stok']); ?>" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" rows="4"><?= htmlspecialchars($item_barang['deskripsi']); ?></textarea>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>

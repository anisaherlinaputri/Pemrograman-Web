<?php
// Array untuk menyimpan data barang
$barang = [];

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    // Tambahkan data barang ke array
    $barang[] = [
        'id_barang' => $id_barang,
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'stok' => $stok,
        'deskripsi' => $deskripsi,
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
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
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Tambah Barang</h1>

    <form action="" method="POST">
        <label for="id_barang">ID Barang:</label>
        <input type="text" id="id_barang" name="id_barang" required>

        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" rows="4"></textarea>

        <button type="submit">Tambah Barang</button>
    </form>

    <?php if (!empty($barang)): ?>
        <h2 style="text-align:center;">Daftar Barang</h2>
        <table>
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
            <?php foreach ($barang as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id_barang']); ?></td>
                    <td><?= htmlspecialchars($item['nama_barang']); ?></td>
                    <td>Rp <?= number_format($item['harga'], 2, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($item['stok']); ?></td>
                    <td><?= htmlspecialchars($item['deskripsi']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>

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

// Proses tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    // Tambahkan data baru
    $barang[] = [
        'id_barang' => $id_barang,
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'stok' => $stok,
        'deskripsi' => $deskripsi,
    ];

    // Simpan data ke file JSON
    simpanData($barang);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Proses hapus barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barang = array_filter($barang, function ($item) use ($id) {
        return $item['id_barang'] !== $id;
    });

    // Simpan data ke file JSON
    simpanData($barang);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Proses edit barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id_barang = $_POST['id_barang'];
    foreach ($barang as &$item) {
        if ($item['id_barang'] === $id_barang) {
            $item['nama_barang'] = $_POST['nama_barang'];
            $item['harga'] = $_POST['harga'];
            $item['stok'] = $_POST['stok'];
            $item['deskripsi'] = $_POST['deskripsi'];
            break;
        }
    }

    // Simpan data ke file JSON
    simpanData($barang);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
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

        form, table {
            width: 80%;
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
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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

        <button type="submit" name="tambah">Tambah Barang</button>
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
                <th>Aksi</th>
            </tr>
            <?php foreach ($barang as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id_barang']); ?></td>
                    <td><?= htmlspecialchars($item['nama_barang']); ?></td>
                    <td>Rp <?= number_format($item['harga'], 2, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($item['stok']); ?></td>
                    <td><?= htmlspecialchars($item['deskripsi']); ?></td>
                    <td>
                        <a href="?hapus=<?= htmlspecialchars($item['id_barang']); ?>" onclick="return confirm('Hapus barang ini?')">Hapus</a> | 
                        <a href="editbarang.php?id=<?= htmlspecialchars($item['id_barang']); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>

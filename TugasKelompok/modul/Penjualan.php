<?php
session_start();

// Inisialisasi array penjualan jika belum ada
if (!isset($_SESSION['sales'])) {
    $_SESSION['sales'] = array();
}

// Menangkap data dari form jika ada
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $price = (float)$_POST['price'];
    $quantity = (int)$_POST['quantity'];

    // Simpan transaksi dalam array asosiatif
    $sale = array(
        "product_name" => $product_name,
        "price" => $price,
        "quantity" => $quantity,
        "total" => $price * $quantity
    );

    // Tambahkan ke daftar transaksi
    array_push($_SESSION['sales'], $sale);
}

// Fungsi untuk menghitung total penjualan
function calculateTotalSales($sales) {
    $total_sales = 0;
    foreach ($sales as $sale) {
        $total_sales += $sale['total'];
    }
    return $total_sales;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
</head>
<body>
    <h2>Laporan Penjualan</h2>

    <?php if (empty($_SESSION['sales'])): ?>
        <p>Tidak ada data penjualan.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah Terjual</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['sales'] as $sale): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sale['product_name']); ?></td>
                        <td><?php echo number_format($sale['price'], 2); ?></td>
                        <td><?php echo $sale['quantity']; ?></td>
                        <td><?php echo number_format($sale['total'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>

        <h3>Total Penjualan: <?php echo number_format(calculateTotalSales($_SESSION['sales']), 2); ?></h3>
    <?php endif; ?>
     <a href="index.html">Kembali ke Input Data</a>
</body>
</html>
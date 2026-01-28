<?php
session_start();
include "config.php";

// LOGIC PHP SAJA
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h3>Keranjang kosong</h3>";
    echo "<a href='produk.php'>Belanja</a>";
    exit;
}
?>

<!-- HTML DIMULAI DI SINI -->
<!DOCTYPE html>
<html>
<head>
<title>Keranjang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Keranjang Belanja</h3>

<!-- tombol checkout -->
<a href="checkout.php" class="btn btn-success mb-3">
Checkout
</a>

</div>
</body>
</html>
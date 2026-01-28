<?php
session_start();
include "config.php";

// CEK CART
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: produk.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Checkout - Alamat Pengiriman</h3>

<form action="proses_checkout.php" method="POST" class="card p-3 shadow">

<div class="mb-2">
<label>Nama Lengkap</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-2">
<label>No WhatsApp</label>
<input type="text" name="wa" class="form-control" placeholder="08xxxx" required>
</div>

<div class="mb-2">
<label>Alamat Lengkap</label>
<textarea name="alamat" class="form-control" required></textarea>
</div>

<div class="mb-3">
<label>Catatan (opsional)</label>
<textarea name="catatan" class="form-control"></textarea>
</div>

<button class="btn btn-success w-100">
Kirim Pesanan
</button>

<a href="keranjang.php" class="btn btn-secondary w-100 mt-2">
Kembali
</a>

</form>
</div>

</body>
</html>
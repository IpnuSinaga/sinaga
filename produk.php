<?php
session_start();
include "config.php";;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

$data = mysqli_query($conn, "SELECT * FROM produk");
?>
<!DOCTYPE html>
<html>
<head>
<title>Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
<h3>Produk Grosir Bang Iky</h3>
<a href="keranjang.php" class="btn btn-warning mb-3">Keranjang</a>

<div class="row">
<?php while ($p = mysqli_fetch_assoc($data)) { ?>
    <div class="col-md-4">
        <div class="card mb-3 shadow">
            <div class="card-body">
                <h5><?= $p['nama_produk']; ?></h5>
                <p>Rp<?= number_format($p['harga']); ?></p>
                <a href="?id=<?= $p['id']; ?>" class="btn btn-success w-100">
                    Tambah
                </a>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</div>

</body>
</html>
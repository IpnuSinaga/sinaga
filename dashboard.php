<?php
session_start();

/* =====================
   PROSES LOGOUT
===================== */
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header("Location: login.php");
    exit;
}

/* =====================
   CEK LOGIN
===================== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

/* Proteksi cache (biar tombol back aman) */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand">Grosir Kelontong</span>
        <!-- LOGOUT SATU FILE -->
        <a href="?logout=true" class="btn btn-light btn-sm"
           onclick="return confirm('Yakin ingin logout?')">
           Logout
        </a>
    </div>
</nav>

<div class="container mt-4">
    <h4>
        Selamat datang Grosir Kelontong,
        <b><?= htmlspecialchars($_SESSION['user']['nama']); ?></b>
    </h4>

    <a href="produk.php" class="btn btn-success mt-3">
        Belanja Sekarang
    </a>
</div>

</body>
</html>

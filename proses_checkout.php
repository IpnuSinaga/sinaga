<?php
session_start();
include "config.php";

$nama    = $_POST['nama'];
$wa_user = $_POST['wa'];
$alamat  = $_POST['alamat'];
$catatan = $_POST['catatan'];

$pesan = "Halo Bang Iky, saya ingin pesan:%0A%0A";
$total = 0;

foreach ($_SESSION['cart'] as $id => $qty) {
    $q = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
    $p = mysqli_fetch_assoc($q);

    if (!$p) continue;

    $subtotal = $p['harga'] * $qty;
    $total += $subtotal;

    $pesan .= "- ".$p['nama_produk']." x".$qty." = Rp".$subtotal."%0A";
}

$pesan .= "%0ATotal: Rp".$total;
$pesan .= "%0A%0ANama: ".$nama;
$pesan .= "%0ANo WA: ".$wa_user;
$pesan .= "%0AAlamat: ".$alamat;

if (!empty($catatan)) {
    $pesan .= "%0ACatatan: ".$catatan;
}

// NOMOR ADMIN
$wa_admin = "6285718784414"; // GANTI
$link = "https://wa.me/$wa_admin?text=$pesan";

// OPTIONAL: KOSONGKAN CART
unset($_SESSION['cart']);

header("Location: $link");
exit;
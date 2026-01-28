<?php
include "config.php";
if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users VALUES ('','$nama','$email','$password')");
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card shadow">
<div class="card-body">
<h4 class="text-center">Registrasi</h4>

<form method="POST">
<input type="text" name="nama" class="form-control mb-2" placeholder="Nama">
<input type="email" name="email" class="form-control mb-2" placeholder="Email">
<input type="password" name="password" class="form-control mb-3" placeholder="Password">
<button name="daftar" class="btn btn-primary w-100">Daftar</button>
</form>

</div>
</div>
</div>
</div>
</div>

</body>
</html>
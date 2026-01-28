<?php
session_start();
include "config.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $u = mysqli_fetch_assoc($q);

    if ($u && password_verify($password, $u['password'])) {
        $_SESSION['user'] = $u;
        header("Location: dashboard.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | Grosir Bang Iky</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* ===== BASE ===== */
body {
    margin: 0;
    height: 100vh;
    overflow: hidden;
    background: radial-gradient(circle at bottom, #0d3b2e, #000);
    font-family: 'Segoe UI', sans-serif;
}

/* ===== PARALLAX LAYERS ===== */
.parallax {
    position: fixed;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 0;
}

.layer {
    position: absolute;
    width: 100%;
    height: 100%;
}

.star {
    position: absolute;
    width: 2px;
    height: 2px;
    background: white;
    border-radius: 50%;
}

/* ===== LOGIN CARD ===== */
.login-card {
    position: relative;
    z-index: 10;
    backdrop-filter: blur(12px);
    background: rgba(255,255,255,0.15);
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0,0,0,.5);
    color: white;
}

.form-control {
    background: rgba(255,255,255,.2);
    border: none;
    color: white;
}

.form-control::placeholder { color: #ddd; }
.form-control:focus { box-shadow: none; }

.btn-success {
    background: linear-gradient(45deg,#00c853,#00e676);
    border: none;
}

a { color: #b9ffdf; }
</style>
</head>
<body>

<!-- PARALLAX STAR BACKGROUND -->
<div class="parallax" id="parallax">
    <div class="layer" data-speed="1"></div>
    <div class="layer" data-speed="3"></div>
    <div class="layer" data-speed="6"></div>
</div>

<!-- LOGIN -->
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4">
        <div class="card login-card p-4">
            <h4 class="text-center">🌿 Grosir Bang Iky</h4>
            <p class="text-center mb-4">Login untuk melanjutkan</p>

            <form method="POST">
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
                <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
                <button name="login" class="btn btn-success w-100">Login</button>
            </form>

            <p class="text-center mt-3">
                Belum punya akun?
                <a href="register.php">Daftar</a>
            </p>
        </div>
    </div>
</div>

<!-- STAR + PARALLAX SCRIPT -->
<script>
const layers = document.querySelectorAll('.layer');

/* Generate stars */
layers.forEach(layer => {
    for (let i = 0; i < 60; i++) {
        const star = document.createElement('div');
        star.classList.add('star');
        star.style.left = Math.random() * 100 + 'vw';
        star.style.top = Math.random() * 100 + 'vh';
        star.style.opacity = Math.random();
        star.style.transform = `scale(${Math.random() + 0.5})`;
        layer.appendChild(star);
    }
});

/* Parallax mouse movement */
document.addEventListener('mousemove', e => {
    const x = (window.innerWidth / 2 - e.clientX);
    const y = (window.innerHeight / 2 - e.clientY);

    layers.forEach(layer => {
        const speed = layer.getAttribute('data-speed');
        layer.style.transform =
            `translate(${x * speed / 100}px, ${y * speed / 100}px)`;
    });
});
</script>

</body>
</html>

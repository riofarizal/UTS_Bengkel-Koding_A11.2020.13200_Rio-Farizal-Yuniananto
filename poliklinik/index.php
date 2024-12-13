<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Informasi Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Informasi Poliklinik</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Data Master</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Periksa</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="LoginUser.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h3>Selamat Datang di Sistem Informasi Poliklinik</h3>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Halo, <?= $_SESSION['username']; ?>! Anda telah berhasil login.</p>
    <?php else: ?>
        <p>Silakan <a href="LoginUser.php">login</a> untuk melanjutkan.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

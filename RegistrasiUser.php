<?php
// Import koneksi database
include 'koneksi.php';

$error = ''; // Variabel untuk menampilkan pesan kesalahan
$success = ''; // Variabel untuk menampilkan pesan sukses

// Proses saat tombol Register ditekan
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Pengecekan kesamaan password dan konfirmasi password
    if ($password !== $confirm_password) {
        $error = 'Password dan Konfirmasi Password tidak sama!';
    } else {
        // Cek apakah username sudah ada
        $checkUser = $conn->query("SELECT * FROM user WHERE username='$username'");
        if ($checkUser->num_rows > 0) {
            $error = 'Username sudah digunakan, coba username lain!';
        } else {
            // Hash password sebelum disimpan ke database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";
            
            if ($conn->query($sql) === TRUE) {
                $success = 'Registrasi berhasil! Silakan <a href="Login.php">Login</a>';
            } else {
                $error = 'Terjadi kesalahan. Coba lagi!';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Register</h3>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" action="RegistrasiUser.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>

    <p class="mt-3">Sudah punya akun? <a href="Login.php">Login</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

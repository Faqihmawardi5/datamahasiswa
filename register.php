<?php
include 'koneksi.php'; // Pastikan file koneksi ke database sudah tersedia

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validasi input
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $error = 'Semua kolom harus diisi!';
    } elseif ($password !== $confirmPassword) {
        $error = 'Password dan Konfirmasi Password tidak cocok!';
    } else {
        // Hash password untuk keamanan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Periksa apakah username sudah ada
        $query = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $error = 'Username sudah digunakan!';
        } else {
            // Simpan data admin ke database
            $insertQuery = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
            $insertQuery->bind_param("ss", $username, $hashedPassword);
            if ($insertQuery->execute()) {
                $success = 'Registrasi berhasil! Silakan login.';
            } else {
                $error = 'Terjadi kesalahan saat menyimpan data!';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin</title>
    <link rel="stylesheet" href="atribut/style2.css">
</head>
<body>
    <div class="container">
        <h2><b>Registrasi Admin</b></h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data" class="form-tambah">
            <label for="username"><b>Username:</b></label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password"><b>Password:</b></label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <label for="confirm_password"><b>Konfirmasi Password:</b></label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <br>
            <input type="submit" class="btn-submit" value="Register">
            <a href="login.php" class="btn-batal"><b>Batal</b></a>
        </form>
            <p class="centered-text">
                    Sudah Puya Akun? <a href="<?= base_url('auth/login') ?>Masuk disini</a>
                </p>
    </div>
</body>
</html>

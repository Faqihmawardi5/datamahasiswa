<?php
session_start();
include 'koneksi.php'; // Menghubungkan ke database

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Query untuk memeriksa apakah username ada dalam database
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);  // Bind parameter
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password menggunakan password_hash
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];

                // Set cookie jika Remember Me diaktifkan
                if ($remember) {
                    setcookie('username', $user['username'], time() + (86400 * 30), "/"); // Cookie berlaku 30 hari
                } else {
                    if (isset($_COOKIE['username'])) {
                        setcookie('username', '', time() - 3600, "/"); // Hapus cookie jika Remember Me tidak diaktifkan
                    }
                }

                header("Location: index.php");
                exit();
            } else {
                $error = 'Username atau Password salah.';
            }
        } else {
            $error = 'Username tidak ditemukan.';
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}

// Isi username di input jika cookie tersedia
$savedUsername = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="atribut/style2.css">
</head>
<body>
    <div class="container">
        <h2><b>Login Pengguna</b></h2>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data" class="form-tambah">
            <label for="username"><b>Username:</b></label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($savedUsername); ?>" required>
            <br><br>
            <label for="password"><b>Password:</b></label>
            <input type="password" id="password" name="password" required>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>

            <br><br>
            <input type="submit" class="btn-submit" value="Login">
            <a href="index.php" class="btn-batal"><b>Batal</b></a>
        </form>
        <p class="centered-text">
            Belum punya akun? <a href="register.php">Registrasi di sini</a>
        </p>
    </div>
</body>
</html>

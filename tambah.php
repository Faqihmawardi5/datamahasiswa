<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    // Upload Foto
    $target_dir = "foto/";
    $foto = basename($_FILES["foto"]["name"]);
    $target_file = $target_dir . $foto;
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi format file
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    if (!in_array($file_extension, $allowed_extensions)) {
        echo "<script>
            alert('Hanya file dengan format JPG, JPEG, atau PNG yang diperbolehkan!');
            window.history.back();
        </script>";
        exit();
    }

    // Pindahkan file ke folder tujuan jika valid
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        // Insert Data ke Database
        $sql = "INSERT INTO tb_msh (nama, nim, email, jurusan, photo) VALUES ('$nama', '$nim', '$email', '$jurusan', '$foto')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>
            alert('Terjadi kesalahan saat mengunggah file!');
            window.history.back();
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="atribut/style2.css">
</head>
<body>

<div class="container">
    <h2>Tambah Data Mahasiswa</h2>
    <form method="POST" enctype="multipart/form-data" class="form-tambah">
        Nama: <input type="text" name="nama" required><br>
        NIM: <input type="text" name="nim" required><br>
        Email: <input type="email" name="email" required><br>
        Jurusan: <input type="text" name="jurusan" required><br>
        Foto: <input type="file" name="foto" required><br>
        <input type="submit" class="btn-submit" value="Tambah Data">
        <a href="index.php" class="btn-batal">Batal</a>
    </form>
</div>
</body>
</html>

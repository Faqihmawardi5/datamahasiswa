<?php
include 'koneksi.php';

// Dapatkan ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data mahasiswa berdasarkan ID
    $query = "SELECT * FROM tb_msh WHERE id = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Proses Update Data
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    // Cek apakah ada file foto yang diunggah
    if ($_FILES['foto']['name']) {
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
            // Update query dengan foto baru
            $updateQuery = "UPDATE tb_msh SET nama='$nama', nim='$nim', email='$email', jurusan='$jurusan', photo='$foto' WHERE id=$id";
        } else {
            echo "<script>
                alert('Gagal mengunggah file foto!');
                window.history.back();
            </script>";
            exit();
        }
    } else {
        // Update query tanpa foto
        $updateQuery = "UPDATE tb_msh SET nama='$nama', nim='$nim', email='$email', jurusan='$jurusan' WHERE id=$id";
    }

    if ($conn->query($updateQuery) === TRUE) {
        echo "<script>
            alert('Data berhasil diupdate!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="atribut/style2.css">
</head>
<body>

<div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST" enctype="multipart/form-data" class="form-edit">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        
        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br>
        
        <label for="foto">Foto:</label>
        <input type="file" name="foto"><br>
        
        <input type="submit" name="submit" value="Update" class="btn-submit">

        <a href="index.php" class="btn-batal">Batal</a>
    </form>
</div>


</body>
</html>

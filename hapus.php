<?php
include 'koneksi.php';

// Dapatkan ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berdasarkan ID
    $query = "DELETE FROM tb_msh WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

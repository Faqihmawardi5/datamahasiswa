<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Isi file index Anda -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Semester V TI B</title>
    <link rel="stylesheet" href="atribut/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>

	<!-- Kepala Web -->
    <header>
        <img src="atribut/UMBS.png" alt="Logo Universitas Muhammadiyah Brebes" class="logo">
		<h1> UNIVERSITAS MUHAMMADIYAH BREBES (UMBS)</h1>
    </header>
    
    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="logout.php" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; font-family: 'Indie Flower', cursive; margin-right: 20px;">
            <i class="fas fa-sign-out-alt"></i>&nbsp; Logout
        </a>
    </div>


      <!-- Tambahkan Judul di Atas Tombol Tambah Data dan Cetak -->
    <h2 class="Judul">Daftar Mahasiswa Semester V TI B</h2>
    <!-- Akhir Kepala Web -->
   <!-- Tambahkan Data, Cetak, dan Cari -->
    <div class="center-buttons">
        <a href="tambah.php" class="btn-tambah">
            <i class="fas fa-plus"></i>&nbsp; Tambah Data</a>
        <a href="#" onclick="window.print()" class="btn-cetak">
            <i class="fas fa-print"></i>&nbsp; Cetak</a>

        <!-- Form Pencarian -->
        <form action="" method="GET" class="form-cari" style="display: inline;">
            <input type="text" name="cari" placeholder="Cari data mahasiswa" value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
            <button type="submit" class="btn-cari">
                <i class="fas fa-search"></i>&nbsp; Cari
            </button>
        </form>
    </div>
    <!-- akhir fitur -->

	<!-- Tabel Data -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Foto</th>
                <th>Aksi</th> 
            </tr>
        </thead>
       <tbody>
                <?php
                    include 'koneksi.php';

                    // Ambil kata kunci pencarian
                    $cari = isset($_GET['cari']) ? $_GET['cari'] : '';

                    // Query data dengan atau tanpa pencarian
                    $sql = "SELECT * FROM tb_msh";
                    if (!empty($cari)) {
                        $sql .= " WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%' OR email LIKE '%$cari%' OR jurusan LIKE '%$cari%'";
                    }

                    $result = $conn->query($sql);

                    // Tampilkan data
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td><center>" . $no++ . "</center></td>
                                <td>" . $row['nim'] . "</td>
                                <td>" . $row['nama'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['jurusan'] . "</td>
                                <td style='text-align: center;'>    
                                    <img src='foto/" . $row['photo'] . "' width='60' alt='" . $row['nama'] . "'></td>
                                <td>
                                    <a href='edit.php?id=" . $row['id'] . "' class='btn-edit'><i class='fas fa-pencil-alt'></i>&nbsp;Edit</a>
                                    <a href='hapus.php?id=" . $row['id'] . "' class='btn-danger'><i class='fas fa-trash-alt'></i>&nbsp;Hapus</a>                        
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                    }
                ?>

        </tbody>


    </table>

	<!-- Akhir Tabel -->
	<br></br>

	<!-- Footer -->
	<footer>
    	<p>&copy; 2024 Create by <b>Muhammad Faqih Mawardi</b> || 22.01.0.0051</p>
	</footer>
	<!-- Akhir Footer -->
</body>
</html>

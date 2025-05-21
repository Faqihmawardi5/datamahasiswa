<?php
$servername = "localhost";
$username = "root"; // Ganti sesuai username database
$password = "";     // Ganti sesuai password database
$dbname = "universitas_muh_brebes"; // Ganti sesuai nama database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

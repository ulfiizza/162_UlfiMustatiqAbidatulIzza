<?php
$host = 'localhost'; // Nama host database (biasanya localhost)
$username = 'root'; // Username untuk mengakses database
$password = ''; // Password untuk mengakses database
$database = '162_ulfimustatiqabidatulizza'; // Nama database yang akan digunakan

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Jika koneksi gagal, tampilkan pesan kesalahan
}
?>

<?php
require_once('koneksi.php'); // Mengimpor file koneksi.php yang berisi informasi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah request ke halaman ini adalah metode POST
    
    $judul = $_POST['judul']; // Mengambil nilai judul kegiatan dari form
    $deskripsi = $_POST['deskripsi']; // Mengambil nilai deskripsi kegiatan dari form
    
    // Upload gambar
    $gambar = $_FILES['gambar']['name']; // Mengambil nama file gambar
    $gambar_tmp = $_FILES['gambar']['tmp_name']; // Mengambil lokasi sementara file gambar
    $gambar_path = "images/" . $gambar; // Menentukan lokasi akhir untuk menyimpan gambar
    
    move_uploaded_file($gambar_tmp, $gambar_path); // Memindahkan file gambar dari lokasi sementara ke lokasi akhir

    // Query untuk menyimpan data kegiatan ke database
    $query = "INSERT INTO kegiatan (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')";
    // Query SQL untuk memasukkan data kegiatan ke dalam tabel 'kegiatan'
    
    if ($conn->query($query) === TRUE) {
        // Jika query berhasil dieksekusi, maka data kegiatan berhasil disimpan
        
        // Redirect kembali ke halaman admin.php setelah berhasil menyimpan data
        header("Location: admin.php");
        exit(); // Keluar dari skrip PHP agar tidak melanjutkan eksekusi
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
        // Jika terjadi kesalahan, tampilkan pesan error dan detailnya
    }
}

$conn->close(); // Menutup koneksi ke database
?>
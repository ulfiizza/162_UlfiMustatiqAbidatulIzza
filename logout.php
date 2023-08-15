<?php 
session_start(); // Memulai sesi PHP

// Mengosongkan nilai session_username dan session_password
$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";

// Menghancurkan/Menghapus sesi yang aktif
session_destroy();

// Mengarahkan pengguna kembali ke halaman login.php setelah logout
header("location:index.php");

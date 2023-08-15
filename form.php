<?php include 'koneksi.php'; ?>
<!-- Include file 'koneksi.php' untuk menghubungkan ke database -->

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Kegiatan BPSDMP</title>
    <!-- Set judul halaman yang akan ditampilkan di tab browser -->

    <!-- Tautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <!-- Membuat container dengan margin atas 5 -->
    <h2 class="text-center mb-4">Form Input Kegiatan BPSDMP</h2>
    <!-- Judul halaman yang ditempatkan di tengah dan memiliki margin bawah 4 -->

    <form action="inputKegiatan.php" method="POST" enctype="multipart/form-data">
        <!-- Form untuk menginputkan data kegiatan -->
        <div class="form-group">
            <label for="judul">Judul Kegiatan:</label>
            <!-- Label untuk input judul kegiatan -->
            <input type="text" id="judul" name="judul" class="form-control" required>
            <!-- Input teks untuk memasukkan judul kegiatan -->
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Kegiatan:</label>
            <!-- Label untuk input deskripsi kegiatan -->
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
            <!-- Input textarea untuk memasukkan deskripsi kegiatan -->
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <!-- Label untuk input gambar -->
            <input type="file" id="gambar" name="gambar" class="form-control-file" accept="image/*" required>
            <!-- Input tipe file untuk memasukkan gambar -->
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <!-- Tombol submit untuk menyimpan data kegiatan -->
    </form>
</div>

<!-- Link Bootstrap JS (untuk beberapa fitur Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
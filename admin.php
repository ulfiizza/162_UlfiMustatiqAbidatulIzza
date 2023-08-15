<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan link Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Navbar dengan latar belakang gelap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-top">
            Admin BPSDMP
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bagian judul dan tombol tambah data baru -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Kegiatan BPSDMP</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="form.php" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah Data Baru
            </a>
        </div>
        
        <!-- Tabel untuk menampilkan data kegiatan dengan border -->
        <table class="table table-bordered">
            <thead>
                <!-- Baris pertama sebagai judul kolom-kolom data -->
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Bagian isi tabel dengan baris-baris data -->
                <?php
                require_once('koneksi.php'); // Sertakan file koneksi.php
                $query = "SELECT * FROM kegiatan"; 
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td><img src='images/" . $row['gambar'] . "' alt='Gambar' width='100'></td>";
                        echo "<td>";
                        echo "<a href='action.php?action=edit&id=" . $row['id'] . "' class='btn btn-primary mr-2'><i class='fas fa-edit'></i> Edit</a>";
                        echo "<a href='action.php?action=delete&id=" . $row['id'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')\"><i class='fas fa-trash'></i> Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <!-- Menampilkan total data dengan jumlah baris data yang berhasil diambil -->
        <p class="text-center">Total data: <?php echo $result->num_rows; ?></p>
    </div>

    <!-- Tambahkan link Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

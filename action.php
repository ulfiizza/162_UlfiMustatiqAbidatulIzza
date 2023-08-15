<?php
require_once('koneksi.php'); // Mengimpor file koneksi.php yang berisi informasi koneksi ke database

if (isset($_GET['action']) && isset($_GET['id'])) {
    // Memeriksa apakah parameter action dan id telah diberikan pada URL
    
    $action = $_GET['action']; // Mengambil nilai parameter action dari URL
    $id = $_GET['id']; // Mengambil nilai parameter id dari URL

    if ($action === 'edit') {
        // Jika action adalah 'edit', maka akan dilakukan proses edit data
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Memeriksa apakah request ke halaman ini adalah metode POST
            
            $judul_baru = $_POST['judul']; // Mengambil nilai judul baru dari form
            $deskripsi_baru = $_POST['deskripsi']; // Mengambil nilai deskripsi baru dari form

            // Proses update data kegiatan dengan data baru
            $update_query = "UPDATE kegiatan SET judul='$judul_baru', deskripsi='$deskripsi_baru' WHERE id=$id";
            
            if ($conn->query($update_query) === TRUE) {
                // Jika query update berhasil dieksekusi
                
                // Periksa apakah ada gambar baru yang diunggah
                if ($_FILES['gambar']['name'] != '') {
                    // Jika ada, ambil dan pindahkan gambar
                    $gambar = $_FILES['gambar']['name'];
                    $gambar_tmp = $_FILES['gambar']['tmp_name'];
                    $gambar_path = 'images/' . $gambar;
                    
                    move_uploaded_file($gambar_tmp, $gambar_path); // Pindahkan gambar ke lokasi akhir
                    
                    // Update nama gambar dalam database
                    $update_gambar_query = "UPDATE kegiatan SET gambar='$gambar' WHERE id=$id";
                    $conn->query($update_gambar_query);
                }
                
                // Redirect kembali ke halaman admin.php setelah berhasil update
                header("Location: admin.php");
                exit(); // Keluar dari skrip PHP agar tidak melanjutkan eksekusi
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // Jika tidak ada metode POST, tampilkan form edit data
            
            // Ambil data kegiatan dengan id yang diberikan
            $query = "SELECT * FROM kegiatan WHERE id = $id";
            $result = $conn->query($query);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // Tampilkan form edit data
                ?>
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Edit Data Kegiatan</title>
                    <!-- Tambahkan link Bootstrap CSS -->
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                </head>
                <body>
                    <div class="container mt-5">
                        <h2 class="text-center mb-4">Edit Data Kegiatan</h2>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"><?php echo $row['deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <input type="file" id="gambar" name="gambar" class="form-control-file" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>

                    <!-- Tambahkan link Bootstrap JS dan jQuery -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </body>
                </html>
                <?php
            } else {
                // Jika data tidak ditemukan, alihkan kembali ke admin.php
                header("Location: admin.php");
                exit();
            }
        }
    } elseif ($action === 'delete') {
        // Jika action adalah 'delete', maka akan dilakukan proses hapus data
        
        // Proses tindakan hapus, hapus data dengan id yang ditentukan
        $query = "DELETE FROM kegiatan WHERE id = $id";
        if ($conn->query($query) === TRUE) {
            // Jika penghapusan berhasil dieksekusi
                
            // Alihkan kembali ke admin.php setelah penghapusan berhasil
            header("Location: admin.php");
            exit(); // Keluar dari skrip PHP agar tidak melanjutkan eksekusi
        } else {
            echo "Error saat menghapus data: " . $conn->error;
        }
    }
} else {
    // Jika action atau id tidak diberikan, alihkan kembali ke admin.php
    header("Location: admin.php");
    exit();
}

$conn->close(); // Menutup koneksi ke database
?>
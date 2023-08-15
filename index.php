<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <!-- Navbar Brand -->
        <a class="navbar-brand">
            <img src="images/logo.png" alt="Logo" width="50" height="50">
            BPSDMP Kominfo Surabaya
        </a>
        <!-- Navbar Toggler Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Navigation Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Konten Landing (HOME)-->
    <div class="landing-content" id="home">
        <div class="container">
            <h1 class="text-center mb-4">Kegiatan BPSDMP Kominfo Surabaya</h1>
            <div class="row">
                <?php
                // Include file koneksi.php
                include 'koneksi.php';

                // Konfigurasi paginasi
                $itemsPerPage = 3; //menentukan berapa banyak kegiatan yg ditampilkan 
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; //untuk mendapatkan nomor halaman saat ini
                $offset = ($currentPage - 1) * $itemsPerPage; //berapa banyak item yang harus dilewati sebelum mengambil data dari db

                // Query untuk mengambil data kegiatan dari database dengan pembatasan dan offset
                $sql = "SELECT judul, deskripsi, gambar FROM kegiatan LIMIT $offset, $itemsPerPage"; //mengambil data kegiatan dari tabel kegiatan dan LIMIT untuk membatasi jumlah hasil yang diambil
                $result = $conn->query($sql); //menjalankan query yang telah dibuat dan mengembalikan hasil 

                // Tampilkan data kegiatan
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Menampilkan kegiatan
                        echo '<div class="col-md-4">'; //mengatur tata letak kartu dalam grid Bootstrap
                        echo '<div class="card mb-4">';
                        echo '<img src="images/' . $row["gambar"] . '" class="card-img-top" alt="' . $row["judul"] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row["judul"] . '</h5>';

                        // Tampilkan deskripsi singkat dan tautan "Baca Selengkapnya"
                        $sebagian_deskripsi = substr($row["deskripsi"], 0, 100); // mengambil 100 karakter pertama dari deskripsi

                        echo '<p class="card-text">';
                        echo '<span class="short-desc">' . $sebagian_deskripsi . '...</span>';
                        echo '<span class="full-desc" style="display:none;">' . $row["deskripsi"] . '</span>';
                        echo '<a href="#" class="read-more-link">Baca Selengkapnya</a>';
                        echo '</p>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Tidak ada kegiatan yang ditemukan.";
                }

                // Tutup koneksi
                $conn->close();
                ?>
            </div>
            <!-- Paginasi -->
            <div class="text-center mt-4">
                <?php
                // Hitung total halaman
                $conn = new mysqli("localhost", "root", "", "162_ulfimustatiqabidatulizza");
                $sqlCount = "SELECT COUNT(*) as total FROM kegiatan";
                $resultCount = $conn->query($sqlCount);
                $rowCount = $resultCount->fetch_assoc()['total'];   
                $totalPages = ceil($rowCount / $itemsPerPage);

                // Tampilkan link paginasi
                echo '<div class="pagination">';
                for ($page = 1; $page <= $totalPages; $page++) {
                    $isActive = ($page == $currentPage) ? "active" : "";
                    echo '<a href="?page=' . $page . '" class="page-link ' . $isActive . '">' . $page . '</a>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
    </div>

    <script>
        // Script untuk mengatur tampilan deskripsi lengkap saat tautan "Baca Selengkapnya" diklik
        const readMoreLinks = document.querySelectorAll('.read-more-link'); // Mengambil semua tautan "Baca Selengkapnya"

        // Loop melalui setiap tautan "Baca Selengkapnya"
        readMoreLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah perilaku default saat tautan diklik
                const card = this.closest('.card'); // Mencari elemen .card terdekat yang mengandung tautan ini
                const shortDesc = card.querySelector('.short-desc'); // Mengambil elemen deskripsi singkat
                const fullDesc = card.querySelector('.full-desc'); // Mengambil elemen deskripsi lengkap
                const readMoreLink = card.querySelector('.read-more-link'); // Mengambil tautan "Baca Selengkapnya"
                
                const readLessLink = document.createElement('a'); // Membuat elemen anchor untuk tautan "Sembunyikan"
                readLessLink.textContent = 'Sembunyikan'; // Menambahkan teks "Sembunyikan" pada tautan
                readLessLink.href = '#'; // Memberikan tautan href kosong
                readLessLink.classList.add('read-less-link'); // Menambahkan kelas CSS "read-less-link"
                card.querySelector('.card-body').appendChild(readLessLink); // Menambahkan tautan "Sembunyikan" ke dalam card-body
                
                // Menampilkan deskripsi lengkap dan menyembunyikan deskripsi singkat serta tautan "Baca Selengkapnya"
                shortDesc.style.display = 'none';
                fullDesc.style.display = 'block';
                readMoreLink.style.display = 'none';
                
                // Event listener untuk tautan "Sembunyikan"
                readLessLink.addEventListener('click', function (event) {
                    event.preventDefault(); // Mencegah perilaku default saat tautan diklik
                    // Menampilkan deskripsi singkat, menyembunyikan deskripsi lengkap, dan menampilkan tautan "Baca Selengkapnya"
                    shortDesc.style.display = 'block';
                    fullDesc.style.display = 'none';
                    readMoreLink.style.display = 'inline';
                    this.remove(); // Menghapus tautan "Sembunyikan" setelah diklik
                });
            });
        });
    </script>

    <!-- Konten About -->
    <div class="container" id="about">
        <div class="text-center mb-4">
            <img src="images/logo.png" alt="BPSDMP Logo" width="70">
        </div>
        <div class="about-content p-5 text-center">
            <div class="about-box">
                <h1 class="mb-4">Tentang BPSDMP Kominfo Surabaya</h1>
                <p>
                    Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika Surabaya (BPSDMP Kominfo Surabaya) merupakan bagian dari Badan Penelitian dan Pengembangan Sumber Daya Manusia (Balitbang SDM) di bawah Kementerian Komunikasi dan Informatika Republik Indonesia.
                </p>
                <!-- Informasi kontak -->
                <div class="contact-info my-4">
                    <p>
                        <span class="symbol">&#128204;</span> Alamat: Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254
                    </p>
                    <p>
                        <span class="symbol">&#128222;</span> Telepon: (031) 8011944
                    </p>
                    <p>
                        <span class="symbol">&#127757;</span> Provinsi: Jawa Timur
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center py-3 mt-auto border">
        <div class="container">
            BPSDMP Kominfo Surabaya&copy; <?php echo date("Y"); ?>. All Rights Reserved.
        </div>
    </footer>

    <!-- Skrip JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
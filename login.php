<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    // Sertakan file koneksi.php yang berisi koneksi ke database
    require_once('koneksi.php');
    
    // Periksa apakah form dikirimkan (melalui metode POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Enkripsi password dengan MD5
        
        // Query untuk memeriksa kecocokan username dan password di basis data
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);
        
        if ($result->num_rows == 1) {
            // Jika login berhasil, arahkan ke admin.php
            header("Location: admin.php");
            exit();
        } else {
            // Jika login gagal, tampilkan pesan error
            echo '<div class="alert alert-danger" role="alert">Login gagal. Cek kembali username dan password Anda.</div>';
        }
    }
    ?>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Login Admin</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form login -->
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
session_start();
include 'db.php'; // Include file db.php untuk mendefinisikan koneksi ke database

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
// Query untuk menghitung total berita
$query_total_berita = "SELECT COUNT(*) AS total FROM tb_berita";
$result_total_berita = mysqli_query($conn, $query_total_berita);

if ($result_total_berita) {
    $row_total_berita = mysqli_fetch_assoc($result_total_berita);
    $total_berita = $row_total_berita['total'];
} else {
    $total_berita = 0; // Atur nilai default jika query gagal
}

// Query untuk menghitung berita aktif
$query_berita_aktif = "SELECT COUNT(*) AS aktif FROM tb_berita WHERE berita_status = 1";
$result_berita_aktif = mysqli_query($conn, $query_berita_aktif);

if ($result_berita_aktif) {
    $row_berita_aktif = mysqli_fetch_assoc($result_berita_aktif);
    $berita_aktif = $row_berita_aktif['aktif'];
} else {
    $berita_aktif = 0; // Atur nilai default jika query gagal
}

// Query untuk menghitung jumlah kategori
$query_jumlah_kategori = "SELECT COUNT(*) AS jumlah FROM tb_category";
$result_jumlah_kategori = mysqli_query($conn, $query_jumlah_kategori);

if ($result_jumlah_kategori) {
    $row_jumlah_kategori = mysqli_fetch_assoc($result_jumlah_kategori);
    $jumlah_kategori = $row_jumlah_kategori['jumlah'];
} else {
    $jumlah_kategori = 0; // Atur nilai default jika query gagal
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penamara Media </title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <style>
        /* CSS untuk footer */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .wrapper {
            flex-grow: 1;
        }
    </style>
    <script>
        // Fungsi untuk menampilkan konfirmasi pop-up
        function konfirmasiKeluar() {
            var konfirmasi = confirm("Yakin ingin keluar?");
            if (konfirmasi) {
                window.location = "keluar.php"; // Redirect ke halaman keluar jika "OK" diklik
            }
        }
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Penamara Media</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="berita/data-berita.php">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="footer/data-footer.php">Footer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori/data-kategori.php">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="konfirmasiKeluar();">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Content -->
        <!-- Card informasi -->
        <div class="section dashboard-section">
            <div class="container">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <!-- Tambahkan kata selamat datang admin di sini -->
                        <h2 class="card-title">Selamat Datang Admin Penamara 😊</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 bg-primary text-white text-center">
                            <div class="card-body">
                                <h5 class="card-title">Total Berita</h5>
                                <p class="card-text display-4">
                                    <?php echo $total_berita; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 bg-success text-white text-center">
                            <div class="card-body">
                                <h5 class="card-title">Berita Aktif</h5>
                                <p class="card-text display-4">
                                    <?php echo $berita_aktif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 bg-danger text-white text-center">
                            <div class="card-body">
                                <h5 class="card-title">Berita Tidak Aktif</h5>
                                <p class="card-text display-4">
                                    <?php echo $total_berita - $berita_aktif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 bg-warning text-white text-center">
                            <div class="card-body">
                                <h5 class="card-title">Kategori</h5>
                                <p class="card-text display-4">
                                    <?php echo $jumlah_kategori; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <small>&copy; 2023 - Penamara Media.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


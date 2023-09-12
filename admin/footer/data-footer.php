<?php
session_start();
include '../db.php'; // Ubah path ke direktori database
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../login.php"</script>';
}

// Tentukan berapa data yang akan ditampilkan per halaman
$dataPerHalaman = 10;

// Tentukan halaman aktif
if (isset($_GET['page'])) {
    $halamanAktif = $_GET['page'];
} else {
    $halamanAktif = 1;
}

// Hitung offset (mulai data dari berapa)
$offset = ($halamanAktif - 1) * $dataPerHalaman;

// Query untuk mengambil data footer dengan batasan jumlah dan offset
$queryFooter = "SELECT * FROM tb_footer ORDER BY footer_id DESC LIMIT $dataPerHalaman OFFSET $offset";
$resultFooter = mysqli_query($conn, $queryFooter);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Footer</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../dashboard.php">Penamara Media</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../berita/data-berita.php">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data-footer.php">Footer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kategori/data-kategori.php">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../keluar.php" onclick="return confirm('Yakin ingin keluar?')">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Content -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Data Footer</h3>
                    <a href="tambah-footer.php" class="btn btn-primary">Tambah Footer</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Footer</th>
                            <th>Isi Footer</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1 + ($halamanAktif - 1) * $dataPerHalaman; // Nomor urut dimulai dari 1 untuk setiap halaman
                        if (mysqli_num_rows($resultFooter) > 0) {
                            while ($row = mysqli_fetch_array($resultFooter)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;"><?php echo $row['footer_title'] ?></td>
                                    <td class="footer-content"><?php echo $row['footer_content'] ?></td>
                                    <td>
                                        <a href="edit-footer.php?id=<?php echo $row['footer_id'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="proses-hapus-footer.php?idf=<?php echo $row['footer_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">Tidak ada data</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Navigasi Halaman -->
    <div class="container mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                // Hitung jumlah halaman
                $queryJumlahFooter = "SELECT COUNT(*) AS jumlah FROM tb_footer";
                $resultJumlahFooter = mysqli_query($conn, $queryJumlahFooter);
                $rowJumlahFooter = mysqli_fetch_assoc($resultJumlahFooter);
                $jumlahHalaman = ceil($rowJumlahFooter['jumlah'] / $dataPerHalaman);

                // Tampilkan tombol navigasi halaman
                for ($i = 1; $i <= $jumlahHalaman; $i++) {
                ?>
                    <li class="page-item <?php if ($i == $halamanAktif) echo 'active' ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
            </ul>
        </nav>
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
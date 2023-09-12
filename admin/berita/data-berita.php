<?php
session_start();
include '../db.php'; // Ubah path ke direktori database
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../login.php"</script>';
}
// Ambil data total berita
$queryTotalBerita = "SELECT COUNT(*) AS total FROM tb_berita";
$resultTotalBerita = mysqli_query($conn, $queryTotalBerita);
$rowTotalBerita = mysqli_fetch_assoc($resultTotalBerita);
$total_berita = $rowTotalBerita['total'];

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

// Query untuk mengambil data berita dengan batasan jumlah dan offset
$queryBerita = "SELECT * FROM tb_berita 
                LEFT JOIN tb_category ON tb_berita.category_id = tb_category.category_id 
                ORDER BY berita_id DESC
                LIMIT $dataPerHalaman
                OFFSET $offset";

$resultBerita = mysqli_query($conn, $queryBerita);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adawarung</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css"> <!-- Ubah path ke folder assets -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
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
                        <a class="nav-link" href="../footer/data-footer.php">Footer</a>
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
                    <h3 class="text-left m-0">Data Berita</h3>
                    <div class="col-auto">
                        <p><a href="tambah-berita.php" class="btn btn-primary btn-sm">Tambah Data</a></p>
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Berita</th>
                                <th>Penulis</th>
                                <th>Tanggal Upload</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1 + ($halamanAktif - 1) * $dataPerHalaman; // Nomor urut dimulai dari 1 untuk setiap halaman
                            if (mysqli_num_rows($resultBerita) > 0) {
                                while ($row = mysqli_fetch_array($resultBerita)) {
                            ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['judul_berita'] ?></td>
                                        <td><?php echo $row['penulis_berita'] ?></td> <!-- Menampilkan Penulis -->
                                        <td><?php echo $row['tanggal_upload'] ?></td> <!-- Menampilkan Tanggal Upload -->
                                        <td><?php echo $row['category_name'] ?></td>
                                        <td><img src="berita_img/<?php echo $row['berita_img'] ?>" width="50px" alt="<?php echo $row['judul_berita'] ?>"></td>
                                        <td><?php echo ($row['berita_status'] == 0) ? 'Tidak Aktif' : 'Aktif'; ?></td>
                                        <td>
                                            <a href="edit-berita.php?id=<?php echo $row['berita_id'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="proses-hapus-berita.php?idb=<?php echo $row['berita_id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="8">Tidak ada data</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Tampilkan navigasi halaman -->
                <div class="d-flex justify-content-center">
                    <ul class="pagination">
                        <?php
                        $jumlahHalaman = ceil($total_berita / $dataPerHalaman); // Hitung jumlah halaman
                        for ($i = 1; $i <= $jumlahHalaman; $i++) {
                        ?>
                            <li class="page-item <?php echo ($i == $halamanAktif) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
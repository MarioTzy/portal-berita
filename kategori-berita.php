<?php
include('admin/db.php');

// Cek apakah parameter kategori_id ada dalam URL
if (isset($_GET['kategori_id'])) {
    $kategori_id = $_GET['kategori_id'];

    // Query untuk mengambil nama kategori
    $queryKategori = "SELECT category_name FROM tb_category WHERE category_id = $kategori_id";
    $resultKategori = mysqli_query($conn, $queryKategori);
    $kategori = mysqli_fetch_assoc($resultKategori);

    // Query untuk mengambil berita sesuai dengan kategori
    $queryBerita = "SELECT b.*, c.category_name FROM tb_berita b
                    INNER JOIN tb_category c ON b.category_id = c.category_id
                    WHERE b.category_id = $kategori_id
                    ORDER BY b.tanggal_upload DESC";
} else {
    // Jika parameter kategori_id tidak ada, alihkan pengguna kembali ke halaman utama atau beri pesan kesalahan
    header("Location: index.php"); // Mengalihkan ke halaman utama
    exit(); // Hentikan eksekusi script
}

// Eksekusi kueri berita
$resultBerita = mysqli_query($conn, $queryBerita);

// Jumlah berita yang akan ditampilkan per halaman
$beritaPerHalaman = 5;

// Tentukan halaman saat ini
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

// Hitung indeks awal dan akhir berita yang akan ditampilkan
$indeksAwal = ($halaman - 1) * $beritaPerHalaman;
$indeksAkhir = $indeksAwal + $beritaPerHalaman;

// Hitung jumlah total halaman berdasarkan jumlah berita
$totalHalaman = ceil(mysqli_num_rows($resultBerita) / $beritaPerHalaman);
?>

<!DOCTYPE html>
<html>

<head>
    <?php include('head.php'); ?>
</head>

<body>
    <!-- Include navbar.php -->
    <?php include('navbar.php'); ?>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <!-- Konten utama -->
            <div class="col-lg-8">
                <!-- Judul Kategori -->
                <h2><?php echo $kategori['category_name']; ?></h2>

                <?php
                // Cek apakah ada berita dalam kategori yang dipilih
                if (mysqli_num_rows($resultBerita) > 0) {
                    // Loop melalui berita yang sesuai dengan halaman saat ini
                    for ($i = $indeksAwal; $i < $indeksAkhir && $i < mysqli_num_rows($resultBerita); $i++) {
                        // Tampilkan berita sesuai dengan indeks
                        $berita = mysqli_fetch_assoc($resultBerita);
                ?>
                        <!-- Berita -->
                        <div class="kategori-berita-item">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="detail-berita.php?berita_id=<?php echo $berita['berita_id']; ?>">
                                        <img src="admin/berita/berita_img/<?php echo $berita['berita_img']; ?>" alt="Foto Berita" class="img-fluid">
                                    </a>
                                    <h4><a href="detail-berita.php?berita_id=<?php echo $berita['berita_id']; ?>"><?php echo $berita['judul_berita']; ?></a></h4>
                                    <p class="kategori-info">
                                        <i class="bi bi-calendar2-week"></i>
                                        <?php echo date('d/m/Y', strtotime($berita['tanggal_upload'])); ?>
                                        <span style="margin-right: 10px;"></span>
                                        <i class="bi bi-person"></i>
                                        <?php echo $berita['penulis_berita']; ?>
                                        <span style="margin-right: 10px;"></span>
                                        <i class="bi bi-tag"></i>
                                        <?php echo $berita['category_name']; ?>
                                    </p>
                                    <p><?php echo substr($berita['berita_konten'], 0, 400); ?></p>
                                    <p><a href="detail-berita.php?berita_id=<?php echo $berita['berita_id']; ?>">Baca Selengkapnya</a></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }

                    // Tampilkan tombol "Sebelumnya" jika halaman saat ini bukan halaman pertama
                    if ($halaman > 1) {
                        echo '<a href="?kategori_id=' . $kategori_id . '&halaman=' . ($halaman - 1) . '" class="btn btn-primary">&laquo; Sebelumnya</a>';
                    }

                    // Tampilkan tombol angka halaman
                    for ($i = 1; $i <= $totalHalaman; $i++) {
                        // Tampilkan tombol angka untuk halaman saat ini
                        if ($i == $halaman) {
                            echo '<span class="current">' . $i . '</span>';
                        } else {
                            echo '<a href="?kategori_id=' . $kategori_id . '&halaman=' . $i . '" class="btn btn-primary">' . $i . '</a>';
                        }
                    }

                    // Tampilkan tombol "Selanjutnya" jika halaman saat ini bukan halaman terakhir
                    if ($halaman < $totalHalaman) {
                        echo '<a href="?kategori_id=' . $kategori_id . '&halaman=' . ($halaman + 1) . '" class="btn btn-primary">Selanjutnya &raquo;</a>';
                    } else {
                        // Tampilkan pesan jika tidak ada berita dalam kategori yang dipilih
                        echo '<p>Belum ada berita dalam kategori ini.</p>';
                    }
                } else {
                    // Tampilkan pesan jika tidak ada berita dalam kategori yang dipilih
                    echo '<p>Belum ada berita dalam kategori ini.</p>';
                }
                ?>
            </div>
            <!-- Sidebar Terkini dan Terpopuler -->
            <div class="custom-sidebar">
                <?php include('sidebar.php'); ?>
            </div>
        </div>
        <?php include("sosial.php") ?>
    </div>
    <!-- End Content -->

    <!-- Include footer.php -->
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php
include('admin/db.php');

// Cek apakah parameter search ada dalam URL
if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];

    // Query untuk mengambil berita berdasarkan kata kunci pencarian
    $queryBerita = "SELECT b.*, c.category_name FROM tb_berita b
                    INNER JOIN tb_category c ON b.category_id = c.category_id
                    WHERE b.judul_berita LIKE '%$searchKeyword%' OR b.berita_konten LIKE '%$searchKeyword%'
                    ORDER BY b.tanggal_upload DESC";
} else {
    // Jika parameter search tidak ada, alihkan pengguna kembali ke halaman utama atau beri pesan kesalahan
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

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- Judul Halaman Pencarian -->
                <h2>Hasil Pencarian: <?php echo $searchKeyword; ?></h2>

                <?php
                // Cek apakah ada berita yang cocok dengan kata kunci pencarian
                if (mysqli_num_rows($resultBerita) > 0) {
                    while ($berita = mysqli_fetch_assoc($resultBerita)) {
                ?>
                        <!-- Berita -->
                        <div class="row">
                            <div class="col-lg-8 custom-content"> <!-- Tambahkan class "custom-content" di sini -->
                                <a href="detail-berita.php?berita_id=<?php echo $berita['berita_id']; ?>">
                                    <img src="admin/berita/berita_img/<?php echo $berita['berita_img']; ?>" alt="Foto Berita" class="img-fluid">
                                    <h4><a href="detail-berita.php?berita_id=<?php echo $berita['berita_id']; ?>"><?php echo $berita['judul_berita']; ?></a></h4>
                                    <p class="kategori-info">
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
                                </a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    // Tampilkan pesan jika tidak ada berita yang cocok dengan kata kunci pencarian
                    echo '<p>Tidak ada hasil yang cocok dengan kata kunci pencarian ini.</p>';
                }
                ?>

                <!-- Tampilkan tombol ganti halaman -->
                <div class="pagination">
                    <?php
                    // Tampilkan tombol "Sebelumnya" jika halaman saat ini bukan halaman pertama
                    if ($halaman > 1) {
                        $halamanSebelumnya = $halaman - 1;
                        echo '<a href="?search=' . $searchKeyword . '&halaman=' . $halamanSebelumnya . '" class="btn btn-primary">&laquo; Sebelumnya</a>';
                    }

                    // Tampilkan tombol angka halaman
                    for ($i = 1; $i <= $totalHalaman; $i++) {
                        // Tampilkan tombol angka untuk halaman saat ini
                        if ($i == $halaman) {
                            echo '<span class="current">' . $i . '</span>';
                        } else {
                            echo '<a href="?search=' . $searchKeyword . '&halaman=' . $i . '" class="btn btn-primary">' . $i . '</a>';
                        }
                    }

                    // Tampilkan tombol "Selanjutnya" jika halaman saat ini bukan halaman terakhir
                    if ($halaman < $totalHalaman) {
                        $halamanSelanjutnya = $halaman + 1;
                        echo '<a href="?search=' . $searchKeyword . '&halaman=' . $halamanSelanjutnya . '" class="btn btn-primary">Selanjutnya &raquo;</a>';
                    } else {
                        // Tampilkan pesan jika tidak ada berita yang cocok dengan kata kunci pencarian
                        echo '<p>Belum ada hasil yang cocok dengan kata kunci pencarian ini.</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Include sidebar.php -->
                <?php include('sidebar.php'); ?>
            </div>
        </div>
        <?php include("sosial.php") ?>
    </div>
    <!-- end content -->

    <!-- Include footer.php -->
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
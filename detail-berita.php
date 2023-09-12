<?php
include('admin/db.php');

// Ambil parameter berita_id dari URL
if (isset($_GET['berita_id'])) {
    $berita_id = $_GET['berita_id'];

    // Query untuk mengambil berita berdasarkan berita_id
    $queryBerita = "SELECT b.*, c.category_name FROM tb_berita b
                    INNER JOIN tb_category c ON b.category_id = c.category_id
                    WHERE b.berita_id = $berita_id";
    $resultBerita = mysqli_query($conn, $queryBerita);

    // Cek apakah berita dengan berita_id tersebut ditemukan
    if (mysqli_num_rows($resultBerita) > 0) {
        $berita = mysqli_fetch_assoc($resultBerita);
    } else {
        // Redirect atau tampilkan pesan error jika berita tidak ditemukan
        header("Location: index.php"); // Mengalihkan ke halaman utama
        exit(); // Hentikan eksekusi script
    }
} else {
    // Jika parameter berita_id tidak ada, alihkan pengguna kembali ke halaman utama atau beri pesan kesalahan
    header("Location: index.php"); // Mengalihkan ke halaman utama
    exit(); // Hentikan eksekusi script
}

?>

<!DOCTYPE html>
<html>

<?php include('head.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 detail-berita-content">
                <!-- Konten utama berita -->
                <img src="admin/berita/berita_img/<?php echo $berita['berita_img']; ?>" alt="Foto Berita" class="img-fluid">
                <h2><?php echo $berita['judul_berita']; ?></h2>
                <p class="tanggal">
                    <i class="bi bi-tag"></i>
                    <?php echo $berita['category_name']; ?>
                    <span style="margin-right: 10px;"></span>
                    <i class="bi bi-calendar2-week"></i>
                    <?php echo $berita['tanggal_upload']; ?>
                    <span style="margin-right: 10px;"></span>
                    <i class="bi bi-person"></i>
                    <?php echo $berita['penulis_berita']; ?>
                </p>
                <p><?php echo $berita['berita_konten']; ?></p>
            </div>
            <?php include('sidebar.php') ?>
        </div>
        <?php include("sosial.php") ?>
    </div>

    <!-- Include footer.php -->
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
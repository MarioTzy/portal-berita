<?php
include('admin/db.php');

// Ambil parameter footer_title dari URL
if (isset($_GET['footer_title'])) {
    $footer_title = $_GET['footer_title'];

    // Query untuk mengambil footer berdasarkan footer_title
    $queryFooter = "SELECT * FROM tb_footer WHERE footer_title = '$footer_title'";
    $resultFooter = mysqli_query($conn, $queryFooter);

    // Cek apakah footer dengan footer_title tersebut ditemukan
    if (mysqli_num_rows($resultFooter) > 0) {
        $footer = mysqli_fetch_assoc($resultFooter);
    } else {
        // Redirect atau tampilkan pesan error jika footer tidak ditemukan
        header("Location: index.php"); // Mengalihkan ke halaman utama
        exit(); // Hentikan eksekusi script
    }
} else {
    // Jika parameter footer_title tidak ada, alihkan pengguna kembali ke halaman utama atau beri pesan kesalahan
    header("Location: index.php"); // Mengalihkan ke halaman utama
    exit(); // Hentikan eksekusi script
}

?>

<!DOCTYPE html>
<html>

<?php include('head.php'); ?>

<body>
    <!-- Include navbar.php -->
    <?php include('navbar.php'); ?>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 detail-footer">
                <h2><?php echo $footer['footer_title']; ?></h2>
                <p><?php echo $footer['footer_content']; ?></p>
            </div>
        </div>
        <?php include("sosial.php") ?>
    </div>

    <!-- Include footer.php -->
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

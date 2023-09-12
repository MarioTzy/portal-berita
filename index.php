<?php
include('admin/db.php');
include('head.php');
?>

<!-- Include navbar.php -->
<?php include('navbar.php'); ?>

<!-- Content -->
<div class="container">
    <?php foreach ($categories as $categoryId => $categoryName) { ?>
        <!-- Kategori -->
        <div class="category-title">
            <h4><?php echo $categoryName; ?></h4>
        </div>

        <div class="row">
            <!-- Berita Besar (sebelah kiri) -->
            <div class="col-lg-8 big-news">
                <?php
                $queryBeritaBesar = "SELECT b.*, c.category_name FROM tb_berita b
            INNER JOIN tb_category c ON b.category_id = c.category_id
            WHERE b.category_id = $categoryId
            ORDER BY b.tanggal_upload DESC LIMIT 1"; // Mengambil satu berita besar
                $resultBeritaBesar = mysqli_query($conn, $queryBeritaBesar);
                $beritaBesar = mysqli_fetch_assoc($resultBeritaBesar);
                ?>
                <a href="detail-berita.php?berita_id=<?php echo $beritaBesar['berita_id']; ?>">
                    <img src="admin/berita/berita_img/<?php echo $beritaBesar['berita_img']; ?>" alt="Foto Berita Besar" class="img-fluid">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $beritaBesar['judul_berita']; ?></h4>
                        <p class="card-text bignews-news-title">
                            <i class="bi bi-tag"></i>
                            <?php echo $beritaBesar['category_name']; ?>
                            <span style="margin-right: 10px;"></span>
                            <i class="bi bi-calendar2-week"></i>
                            <?php echo date('d/m/Y', strtotime($beritaBesar['tanggal_upload'])); ?>
                            <span style="margin-right: 10px;"></span>
                            <i class="bi bi-person"></i>
                            <?php echo $beritaBesar['penulis_berita']; ?>
                        </p>
                        <p class="card-text"><?php echo substr($beritaBesar['berita_konten'], 0, 500); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="detail-berita.php?berita_id=<?php echo $beritaBesar['berita_id']; ?>" style="color: blue; text-decoration: none;">Baca Selengkapnya</a>
                    </div>
                </a>
            </div>


            <!-- Berita kecil (sebelah kanan) -->
            <div class="col-lg-4 small-news">
                <div class="row">
                    <?php
                    $queryBeritaKecil = "SELECT b.*, c.category_name FROM tb_berita b
                INNER JOIN tb_category c ON b.category_id = c.category_id
                WHERE b.category_id = $categoryId AND b.berita_id != {$beritaBesar['berita_id']}
                ORDER BY b.tanggal_upload DESC
                LIMIT 5"; // Mengambil lima berita kecil
                    $resultBeritaKecil = mysqli_query($conn, $queryBeritaKecil);

                    while ($beritaKecil = mysqli_fetch_assoc($resultBeritaKecil)) { ?>
                        <div class="col-md-12 small-news-item">
                            <a href="detail-berita.php?berita_id=<?php echo $beritaKecil['berita_id']; ?>">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="admin/berita/berita_img/<?php echo $beritaKecil['berita_img']; ?>" alt="Foto Berita Kecil" class="img-fluid">
                                    </div>
                                    <div class="col-md-8 small-news-content">
                                        <h5 class="card-title small-news-title"><?php echo $beritaKecil['judul_berita']; ?></h5>
                                        <p class="card-text small-news-metadata">
                                            <i class="bi bi-tag"></i>
                                            <?php echo $beritaKecil['category_name']; ?>
                                            <span style="margin-right: 10px;"></span>
                                            <i class="bi bi-calendar2-week"></i>
                                            <?php echo date('d/m/Y', strtotime($beritaKecil['tanggal_upload'])); ?>
                                            <span style="margin-right: 10px;"></span>
                                            <i class="bi bi-person"></i>
                                            <?php echo $beritaKecil['penulis_berita']; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php include("sosial.php") ?>
</div>


<!-- Include footer.php -->
<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
<!-- Sidebar Terkini dan Terpopuler -->
<div class="custom-sidebar">
    <!-- Sidebar Terkini -->
    <div class="sidebar terkini-sidebar">
        <div class="sidebar-item">
            <div class="title-kategori">
                <h3 class="terkini-title">Terkini</h3>
            </div>
            <?php
            $queryTerkini = "SELECT b.*, c.category_name FROM tb_berita b
                            INNER JOIN tb_category c ON b.category_id = c.category_id
                            ORDER BY b.tanggal_upload DESC LIMIT 5";
            $resultTerkini = mysqli_query($conn, $queryTerkini);

            if (mysqli_num_rows($resultTerkini) > 0) {
                while ($terkini = mysqli_fetch_assoc($resultTerkini)) {
            ?>
                    <div class="terkini-item">
                        <a href="detail-berita.php?berita_id=<?php echo $terkini['berita_id']; ?>">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="admin/berita/berita_img/<?php echo $terkini['berita_img']; ?>" alt="Foto Terkini" class="img-fluid terkini-image">
                                </div>
                                <div class="col-md-8 terkini-text">
                                    <h4><?php echo $terkini['judul_berita']; ?></h4>
                                    <p class="terkini-info">
                                        <i class="bi bi-tag"></i>
                                        <?php echo $terkini['category_name']; ?>
                                        <i class="bi bi-calendar2-week"></i>
                                        <?php echo date('d/m/Y', strtotime($terkini['tanggal_upload'])); ?>
                                        <span style="margin-right: 3px;"></span>
                                        <i class="bi bi-person"></i>
                                        <?php echo $terkini['penulis_berita']; ?>
                                    </p>

                                </div>
                            </div>
                        </a>
                    </div>
                    <hr>
            <?php
                }
            } else {
                echo '<p>Tidak ada berita terkini.</p>';
            }
            ?>
        </div>
    </div>

    <!-- Sidebar Terpopuler -->
    <div class="sidebar terpopuler-sidebar">
        <div class="sidebar-item">
            <div class="title-kategori">
                <h3 class="terpopuler-title">Terpopuler</h3>
            </div>
            <?php
            $queryTerpopuler = "SELECT b.*, c.category_name FROM tb_berita b
                            INNER JOIN tb_category c ON b.category_id = c.category_id
                            ORDER BY b.view_count DESC LIMIT 5";
            $resultTerpopuler = mysqli_query($conn, $queryTerpopuler);

            if (mysqli_num_rows($resultTerpopuler) > 0) {
                while ($terpopuler = mysqli_fetch_assoc($resultTerpopuler)) {
            ?>
                    <div class="terpopuler-item">
                        <a href="detail-berita.php?berita_id=<?php echo $terpopuler['berita_id']; ?>">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="admin/berita/berita_img/<?php echo $terpopuler['berita_img']; ?>" alt="Foto Terpopuler" class="img-fluid terpopuler-image">
                                </div>
                                <div class="col-md-8 terpopuler-text">
                                    <h4><?php echo $terpopuler['judul_berita']; ?></h4>
                                    <p class="terpopuler-info">
                                        <i class="bi bi-tag"></i>
                                        <?php echo $terpopuler['category_name']; ?>
                                        <i class="bi bi-calendar2-week"></i>
                                        <?php echo date('d/m/Y', strtotime($terpopuler['tanggal_upload'])); ?>
                                        <span style="margin-right: 3px;"></span>
                                        <i class="bi bi-person"></i>
                                        <?php echo $terpopuler['penulis_berita']; ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <hr>
            <?php
                }
            } else {
                echo '<p>Tidak ada berita terpopuler.</p>';
            }
            ?>
        </div>
    </div>
</div>

<?php
// Inisialisasi variabel $categories di navbar.php
$queryKategori = "SELECT * FROM tb_category";
$resultKategori = mysqli_query($conn, $queryKategori);

$categories = [];

while ($rowKategori = mysqli_fetch_assoc($resultKategori)) {
    $categories[$rowKategori['category_id']] = $rowKategori['category_name'];
}
?>
<!-- logo -->
<div class="container">
    <div class="logo-wrapper d-flex align-items-center">
        <h1>
            <a href="index.php">
                <img src="img/logo.png" alt="Logo">
            </a>
        </h1>
    </div>
</div>
<!-- end logo -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white py-3">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto"> <!-- Menggeser menu ke kanan -->
                <?php
                foreach ($categories as $categoryId => $categoryName) {
                    echo '<li class="nav-item"><a class="nav-link" href="kategori-berita.php?kategori_id=' . $categoryId . '">' . $categoryName . '</a></li>';
                }
                ?>
            </ul>
        </div>
        <!-- Kotak Pencarian -->
        <form class="form-inline d-flex" action="search-berita.php" method="GET"> <!-- Mengarahkan form ke halaman "search-berita.php" -->
            <input class="form-control mr-2" type="search" name="search" placeholder="Cari berita..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <!-- Akhir Kotak Pencarian -->
    </div>
</nav>
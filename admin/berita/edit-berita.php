<?php
session_start();
include '../db.php'; // Ubah path ke direktori database
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../login.php"</script>';
}

$b = null; // Inisialisasi $b dengan null

if (isset($_GET['id'])) {
    $berita = mysqli_query($conn, "SELECT * FROM tb_berita WHERE berita_id = '" . $_GET['id'] . "' ");
    if (mysqli_num_rows($berita) == 1) { // Gunakan angka 1 daripada 0 untuk memastikan satu baris diambil
        $b = mysqli_fetch_object($berita);
    }
}

if (!$b) {
    echo '<script>window.location="data-berita.php"</script>';
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $konten = $_POST['konten'];
    $penulis_berita = $_POST['penulis_berita']; // Nama kolom diubah menjadi penulis_berita
    $tanggal_upload = $_POST['tanggal_upload']; // Nama kolom diubah menjadi tanggal_upload

    // Menyimpan data file yang diunggah (jika ada)
    $foto = $b->berita_img; // Menggunakan foto yang ada sebagai default

    if (isset($_FILES['gambar']['name']) && !empty($_FILES['gambar']['name'])) {
        $filename = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $type1 = explode('.', $filename);
        $type2 = $type1[count($type1) - 1];
        $newname = 'berita_' . time() . '.' . $type2;
        $uploadDir = __DIR__ . '/berita_img/';
        $uploadPath = $uploadDir . $newname;

        if (move_uploaded_file($tmp_name, $uploadPath)) {
            if ($b->berita_img != $newname) {
                unlink($uploadDir . $b->berita_img); // Menghapus gambar lama jika berbeda
            }
            $foto = $newname;
        }
    }

    $update = mysqli_query($conn, "UPDATE tb_berita SET judul_berita = '$judul', category_id = '$kategori', berita_img = '$foto', berita_status = '$status', berita_konten = '$konten', penulis_berita = '$penulis_berita', tanggal_upload = '$tanggal_upload' WHERE berita_id = '" . $b->berita_id . "' ");

    if ($update) {
        echo '<script>alert("Ubah data berhasil")</script>';
        echo '<script>window.location="data-berita.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css"> <!-- Ubah path ke folder assets -->
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
                        <a class="nav-link" href="data-berita.php">Berita</a>
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
                    <h3 class="text-left m-0">Edit Data Berita</h3>
                    <div class="col-auto">
                        <p><a href="data-berita.php" class="btn btn-secondary btn-sm"> &larr; kembali</a></p>
                    </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" class="p-4">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul Berita" value="<?php echo $b->judul_berita ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis_berita" class="form-label">Penulis Berita</label>
                        <input type="text" name="penulis_berita" class="form-control" placeholder="Penulis Berita" value="<?php echo $b->penulis_berita ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" name="kategori" required>
                            <option value="">--Pilih--</option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while ($r = mysqli_fetch_array($kategori)) {
                            ?>
                                <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $b->category_id) ? 'selected' : ''; ?>>
                                    <?php echo $r['category_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <img src="berita_img/<?php echo $b->berita_img ?>" width="100px">
                        <input type="hidden" name="foto" value="<?php echo $b->berita_img ?>">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control-file">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_upload" class="form-label">Tanggal Upload</label>
                        <input type="date" name="tanggal_upload" class="form-control" value="<?php echo date('Y-m-d', strtotime($b->tanggal_upload)); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option value="">--Pilih--</option>
                            <option value="1" <?php echo ($b->berita_status == 1) ? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo ($b->berita_status == 0) ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten</label>
                        <textarea class="form-control" name="konten" id="editor"><?php echo $b->berita_konten ?></textarea>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <small>&copy; 2023 - Penamara Media.</small>
        </div>
    </footer>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
</body>

</html>
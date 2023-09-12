<?php
session_start();
include '../db.php'; // Ubah path ke direktori database
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../login.php"</script>';
}
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

    <!-- Konten -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="text-left m-0">Tambah Data Berita</h3>
                    <div class="col-auto">
                        <p><a href="data-berita.php" class="btn btn-secondary btn-sm"> &larr; kembali</a></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <form action="" method="POST" enctype="multipart/form-data" class="p-4">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul Berita" required>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Nama Penulis</label>
                            <input type="text" name="penulis" class="form-control" placeholder="Nama Penulis" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori" required>
                                <option value="">--Pilih--</option>
                                <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                while ($r = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control-file" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Upload</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">--Pilih--</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea class="form-control" name="konten" id="editor" placeholder="Konten Berita"></textarea>
                        </div>
                        <div class="d-grid">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        // Menyertakan file koneksi ke database
                        include '../db.php'; // Ubah path ke direktori database

                        // Mengambil inputan dari form
                        $kategori  = $_POST['kategori'];
                        $judul     = $_POST['judul'];
                        $penulis   = $_POST['penulis'];
                        $status    = $_POST['status'];
                        $konten    = $_POST['konten'];
                        $tanggal   = $_POST['tanggal'];

                        // Menyimpan data file yang diunggah
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[count($type1) - 1]; // Mengambil ekstensi file

                        // Menyusun nama baru untuk file
                        $newname = 'berita_' . time() . '.' . $type2;

                        // Menggunakan path absolut ke direktori tujuan
                        $uploadDir = __DIR__ . '/berita_img/';
                        $uploadPath = $uploadDir . $newname;

                        // Proses upload file sekaligus insert ke database
                        if (move_uploaded_file($tmp_name, $uploadPath)) {
                            $insert = mysqli_query($conn, "INSERT INTO tb_berita (category_id, judul_berita, penulis_berita, berita_img, berita_status, berita_konten, tanggal_upload, created_at) VALUES (
                '" . $kategori . "',
                '" . $judul . "',
                '" . $penulis . "',
                '" . $newname . "',
                '" . $status . "',
                '" . $konten . "',
                '" . $tanggal . "',
                NOW()
            ) ");

                            if ($insert) {
                                echo '<script>alert("Tambah berita berhasil")</script>';
                                echo '<script>window.location="data-berita.php"</script>';
                            } else {
                                echo 'gagal ' . mysqli_error($conn);
                            }
                        } else {
                            echo '<script>alert("Gagal upload file")</script>';
                        }
                    }
                    ?>
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


    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('konten');
    </script>

</body>

</html>
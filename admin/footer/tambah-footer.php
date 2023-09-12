<?php
session_start();
include '../db.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../login.php"</script>';
}

if (isset($_POST['submit'])) {
    $footerTitle = $_POST['footer_title'];
    $footerContent = $_POST['footer_content'];

    $query = "INSERT INTO tb_footer (footer_title, footer_content) VALUES ('$footerTitle', '$footerContent')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Data footer berhasil ditambahkan");</script>';
        echo '<script>window.location="data-footer.php";</script>';
    } else {
        echo '<script>alert("Gagal menambahkan data footer");</script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Footer</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
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
                        <a class="nav-link" href="../berita/data-berita.php">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data-footer.php">Footer</a>
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
                <h3 class="card-title">Tambah Footer</h3>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="footer_title" class="form-label">Judul Footer</label>
                        <input type="text" class="form-control" id="footer_title" name="footer_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="footer_content" class="form-label">Isi Footer</label>
                        <textarea class="form-control" id="footer_content" name="footer_content" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Tambahkan Footer</button>
                </form>
            </div>
        </div>
        <!-- Button "Kembali" di bawah card -->
        <div class="mt-3 d-flex justify-content-end">
            <a href="data-footer.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <!-- footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <small>&copy; 2023 - Penamara Media.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        CKEDITOR.replace('footer_content');
    </script>
</body>

</html>
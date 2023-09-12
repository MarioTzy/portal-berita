<?php
session_start();
include '../db.php'; // Ubah path ke direktori database
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="../login.php"</script>';
}

// Menyimpan perubahan kategori yang diperbarui
if (isset($_POST['submit_kategori'])) {
	$nama_kategori = ucwords($_POST['nama_kategori']);
	$kategori_id = $_GET['id'];

	$update_kategori = mysqli_query($conn, "UPDATE tb_category SET category_name = '$nama_kategori' WHERE category_id = '$kategori_id'");
	if ($update_kategori) {
		echo '<script>alert("Data kategori berhasil diperbarui")</script>';
		echo '<script>window.location="data-kategori.php"</script>';
	} else {
		echo 'Gagal memperbarui data kategori: ' . mysqli_error($conn);
	}
}

// Mendapatkan informasi kategori
$kategori_id = $_GET['id'];
$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '$kategori_id'");
if (mysqli_num_rows($kategori) == 0) {
	echo '<script>window.location="data-kategori.php"</script>';
}
$k = mysqli_fetch_object($kategori);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Kategori | Adawarung</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/style.css">
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
						<a class="nav-link" href="../berita/data-berita.php">Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../footer/data-footer.php">Footer</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="data-kategori.php">Kategori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../keluar.php" onclick="return confirm('Yakin ingin keluar?')">Keluar</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Content -->
	<div class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Edit Kategori</h4>
							<form action="" method="POST">
								<div class="mb-3">
									<input type="text" name="nama_kategori" class="form-control" value="<?php echo $k->category_name; ?>" required>
								</div>
								<button type="submit" name="submit_kategori" class="btn btn-primary">Simpan Kategori</button>
							</form>
						</div>
					</div>
					<!-- Button "Kembali" di bawah card -->
					<div class="mt-3 d-flex justify-content-end">
						<a href="data-kategori.php" class="btn btn-secondary">Kembali</a>
					</div>
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
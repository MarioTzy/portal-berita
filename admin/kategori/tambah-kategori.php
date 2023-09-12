<?php
session_start();
include '../db.php'; // Ubah path ke direktori database
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="../login.php"</script>';
}

if (isset($_POST['submit_kategori'])) {
	$nama_kategori = ucwords($_POST['nama_kategori']);

	$insert_kategori = mysqli_query($conn, "INSERT INTO tb_category (category_name) VALUES ('$nama_kategori')");
	if ($insert_kategori) {
		echo '<script>alert("Tambah data kategori berhasil")</script>';
		echo '<script>window.location="data-kategori.php"</script>';
	} else {
		echo 'Gagal menambahkan data kategori: ' . mysqli_error($conn);
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adawarung</title>
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

	<!-- content -->
	<div class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Tambah Kategori Baru</h4>
							<form action="" method="POST">
								<div class="mb-3">
									<label for="nama_kategori" class="form-label">Nama Kategori</label>
									<input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
								</div>
								<button type="submit" name="submit_kategori" class="btn btn-primary">Tambah Kategori</button>
							</form>
						</div>
					</div>
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
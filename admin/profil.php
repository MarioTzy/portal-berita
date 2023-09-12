<?php
session_start();
include 'db.php';

if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="login.php"</script>';
	exit;
}

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id'] . "' ");
$d = mysqli_fetch_object($query);

if (isset($_POST['submit'])) {
	$nama   = ucwords($_POST['nama']);
	$user   = $_POST['user'];
	$hp     = $_POST['hp'];
	$email  = $_POST['email'];
	$alamat = ucwords($_POST['alamat']);

	$update = mysqli_query($conn, "UPDATE tb_admin SET 
        admin_name = '" . $nama . "',
        username = '" . $user . "',
        admin_telp = '" . $hp . "',
        admin_email = '" . $email . "',
        admin_address = '" . $alamat . "'
        WHERE admin_id = '" . $d->admin_id . "' ");
	if ($update) {
		// Perbarui nama pengguna di sesi
		$_SESSION['a_global']->username = $user;

		echo '<script>alert("Ubah data berhasil")</script>';
		echo '<script>window.location="profil.php"</script>';
	} else {
		echo 'gagal ' . mysqli_error($conn);
	}
}

if (isset($_POST['ubah_password'])) {
	$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
	$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

	if ($pass1 === $pass2) {
		$newPassword = md5($pass1);
		$updatePass = mysqli_query($conn, "UPDATE tb_admin SET 
            password = '" . $newPassword . "'
            WHERE admin_id = '" . $d->admin_id . "' ");

		if ($updatePass) {
			echo '<script>alert("Ubah password berhasil")</script>';
			echo '<script>window.location="profil.php"</script>';
		} else {
			echo 'gagal ' . mysqli_error($conn);
		}
	} else {
		echo '<script>alert("Password baru dan konfirmasi password tidak cocok")</script>';
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="dashboard.php">Penamara Media</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="dashboard.php">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="profil.php">Profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="berita/data-berita.php">Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="footer/data-footer.php">Footer</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="kategori/data-kategori.php">Kategori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="keluar.php" onclick="return confirm('Yakin ingin keluar?')">Keluar</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<!-- Bagian ubah data user -->
	<div class="row justify-content-center">
		<div class="col-md-5 mb-4">
			<div class="card mx-2 my-4">
				<div class="card-body">
					<h3 class="mb-4">Profil</h3>
					<form action="" method="POST">
						<div class="mb-3">
							<label for="nama" class="form-label">Nama Lengkap</label>
							<input type="text" id="nama" name="nama" class="form-control" value="<?php echo $d->admin_name ?>" required>
						</div>
						<div class="mb-3">
							<label for="user" class="form-label">Username</label>
							<input type="text" id="user" name="user" class="form-control" value="<?php echo $d->username ?>" required>
						</div>
						<div class="mb-3">
							<label for="hp" class="form-label">No Hp</label>
							<input type="text" id="hp" name="hp" class="form-control" value="<?php echo $d->admin_telp ?>" required>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" id="email" name="email" class="form-control" value="<?php echo $d->admin_email ?>" required>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $d->admin_address ?>" required>
						</div>
						<input type="submit" name="submit" value="Ubah Profil" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>

		<!-- Bagian ubah password -->
		<div class="col-md-5 mb-4">
			<div class="card mx-2 my-4">
				<div class="card-body">
					<h3 class="mb-4">Ubah Password</h3>
					<form action="" method="POST">
						<div class="mb-3">
							<label for="pass1" class="form-label">Password Baru</label>
							<div class="input-group">
								<input type="password" id="pass1" name="pass1" class="form-control" required>
								<button type="button" class="btn btn-outline-secondary" id="togglePass1">
									<i id="pass1Icon" class="bi bi-eye"></i>
								</button>
							</div>
						</div>
						<div class="mb-3">
							<label for="pass2" class="form-label">Konfirmasi Password Baru</label>
							<div class="input-group">
								<input type="password" id="pass2" name="pass2" class="form-control" required>
								<button type="button" class="btn btn-outline-secondary" id="togglePass2">
									<i id="pass2Icon" class="bi bi-eye"></i>
								</button>
							</div>
						</div>
						<input type="submit" name="ubah_password" value="Ubah Password" class="btn btn-primary">
					</form>
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

	<!-- ini bagian js  -->
	<!-- ini bagian awal js button show password  -->
	<script>
		const togglePass1Btn = document.getElementById('togglePass1');
		const pass1Input = document.getElementById('pass1');
		const pass1Icon = document.getElementById('pass1Icon');

		const togglePass2Btn = document.getElementById('togglePass2');
		const pass2Input = document.getElementById('pass2');
		const pass2Icon = document.getElementById('pass2Icon');

		togglePass1Btn.addEventListener('click', function() {
			togglePasswordVisibility(pass1Input, pass1Icon);
		});

		togglePass2Btn.addEventListener('click', function() {
			togglePasswordVisibility(pass2Input, pass2Icon);
		});

		function togglePasswordVisibility(inputElement, iconElement) {
			if (inputElement.type === 'password') {
				inputElement.type = 'text';
				iconElement.classList.remove('bi-eye');
				iconElement.classList.add('bi-eye-slash');
			} else {
				inputElement.type = 'password';
				iconElement.classList.remove('bi-eye-slash');
				iconElement.classList.add('bi-eye');
			}
		}
	</script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
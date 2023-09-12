<?php
session_start();

// Database connection code (di db.php)
$conn = mysqli_connect("localhost", "root", "", "portal_berita");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Cek status login
if (isset($_SESSION['status_login']) && $_SESSION['status_login'] === true) {
    // Jika sudah login, arahkan ke halaman dashboard
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Periksa apakah kombinasi username dan password benar
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$user' AND password = MD5('$pass')");

    if (mysqli_num_rows($cek) > 0) {
        // Jika berhasil login
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->admin_id;
        header("Location: dashboard.php");
        exit;
    } else {
        $error_message = 'Username atau password Anda salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <style>

        body{
            background-color: 	#008B8B;
        }
        /* Atur gambar agar tetap di kiri dan di tengah vertikal */
        .login-box img {
            max-width: 100%;
            height: auto;
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
            margin-top: 50px;
            /* Menambahkan margin bawah agar terletak di tengah vertikal */
        }

        /* Menggeser form ke kanan */
        .login-box .form-group {
            text-align: left;
        }

        /* Atur kotak login agar terletak di tengah horizontal */
        .login-box {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 50px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        /* Style untuk tombol mata */
        .btn-toggle-pass {
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <!-- Logo di kiri -->
            <img src="../img/logo.png" alt="Logo" class="img-fluid mb-4" style="max-height: 120px;">
            <!-- Form Login -->
            <h2 class="card-title text-center mb-4">Login</h2>
            <form action="" method="POST" style="width: 100%;">
                <div class="mb-3 row">
                    <label for="user" class="form-label col-md-3 text-start">Username</label>
                    <div class="col-md-9">
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pass" class="form-label col-md-3 text-start">Password</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary btn-toggle-pass" id="togglePass">
                                    <i class="bi bi-eye-fill" style="font-size: 16px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"></div> <!-- Kolom kosong untuk membuat jarak -->
                    <div class="col-md-9">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
            <?php if (isset($error_message)) { ?>
                <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
            <?php } ?>
        </div>
    </div>
    
    <script>
        // JavaScript untuk mengganti tampilan password
        const passInput = document.getElementById('pass');
        const togglePassBtn = document.getElementById('togglePass');
        
        togglePassBtn.addEventListener('click', function () {
            if (passInput.type === 'password') {
                passInput.type = 'text';
                togglePassBtn.innerHTML = '<i class="bi bi-eye-slash-fill" style="font-size: 16px;"></i>';
            } else {
                passInput.type = 'password';
                togglePassBtn.innerHTML = '<i class="bi bi-eye-fill" style="font-size: 16px;"></i>';
            }
        });
    </script>
</body>

</html>

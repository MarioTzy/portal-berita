<?php 
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adawarung</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="index.php">Adawarung</a></h1>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
            </ul>
        </div>
    </header>

    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="produk.php" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                <button class="btn btn-primary" type="submit">Cari Produk</button>
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3 class="text-center">Produk</h3>
            <div class="row justify-content-center">
                <?php 
                    if($_GET['search'] != '' || $_GET['kat'] != ''){
                        $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
                    }

                    $produk = mysqli_query($conn, "SELECT * FROM tb_berita WHERE berita_status = 1 $where ORDER BY berita_id DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <div class="col-md-4">
                    <a href="detail-berita.php?id=<?php echo $p['berita_id'] ?>" class="text-decoration-none">
                        <div class="card mb-4">
                            <img src="berita/<?php echo $p['berita_img'] ?>" class="card-img-top" alt="<?php echo $p['judul_berita'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo substr($p['judul_berita'], 0, 30) ?></h5>
                                <p class="card-text"><?php echo substr($p['berita_konten'], 0, 100) ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }}else{ ?>
                    <p class="text-center">Berita tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer bg-dark text-light py-4">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>No. Hp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small class="d-block">Copyright &copy; 2023 - Adawarung.</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
